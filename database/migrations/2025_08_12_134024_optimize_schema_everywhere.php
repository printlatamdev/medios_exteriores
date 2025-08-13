<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Helpers idempotentes **/
    private function indexExists(string $table, string $index): bool
    {
        $rows = DB::select("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$index]);
        return !empty($rows);
    }

    private function columnExists(string $table, string $column): bool
    {
        return Schema::hasColumn($table, $column);
    }

    public function up(): void
    {
        /** ---------------- externalmedia ---------------- */
        // Unico por code (evita duplicados y acelera búsquedas)
        if ($this->columnExists('externalmedia', 'code') && !$this->indexExists('externalmedia', 'ux_externalmedia_code')) {
            DB::statement("ALTER TABLE `externalmedia` ADD UNIQUE INDEX `ux_externalmedia_code` (`code`)");
        }

        // Índices de filtros comunes
        if (!$this->indexExists('externalmedia', 'ix_ext_status_mediatype') &&
            $this->columnExists('externalmedia', 'status') &&
            $this->columnExists('externalmedia', 'mediatype_id')) {
            DB::statement("ALTER TABLE `externalmedia` ADD INDEX `ix_ext_status_mediatype` (`status`,`mediatype_id`)");
        }

        if ($this->columnExists('externalmedia','department_id') && $this->columnExists('externalmedia','municipality_id') &&
            !$this->indexExists('externalmedia','ix_ext_dept_muni')) {
            DB::statement("ALTER TABLE `externalmedia` ADD INDEX `ix_ext_dept_muni` (`department_id`,`municipality_id`)");
        }

        if ($this->columnExists('externalmedia','district_id') && !$this->indexExists('externalmedia','ix_ext_district')) {
            DB::statement("ALTER TABLE `externalmedia` ADD INDEX `ix_ext_district` (`district_id`)");
        }

        // Ajuste de tipos (requiere doctrine/dbal)
        if ($this->columnExists('externalmedia','width')) {
            Schema::table('externalmedia', fn (Blueprint $t) => $t->decimal('width', 6, 2)->nullable()->change());
        }
        if ($this->columnExists('externalmedia','height')) {
            Schema::table('externalmedia', fn (Blueprint $t) => $t->decimal('height', 6, 2)->nullable()->change());
        }
        if ($this->columnExists('externalmedia','rental')) {
            Schema::table('externalmedia', fn (Blueprint $t) => $t->decimal('rental', 10, 2)->nullable()->change());
        }
        if ($this->columnExists('externalmedia','traffic_flow')) {
            Schema::table('externalmedia', fn (Blueprint $t) => $t->integer('traffic_flow')->nullable()->change());
        }

        // Fulltext en address (si procede)
        if ($this->columnExists('externalmedia','address') && !$this->indexExists('externalmedia','ft_ext_address')) {
            try {
                DB::statement("ALTER TABLE `externalmedia` ADD FULLTEXT INDEX `ft_ext_address` (`address`)");
            } catch (\Throwable $e) {
                // Ignorar si la versión no soporta FT en esa collation/motor
            }
        }

        // coords opcional (si lo vas a usar para búsquedas por distancia)
        if (!$this->columnExists('externalmedia','lat')) {
            Schema::table('externalmedia', function (Blueprint $t) {
                $t->decimal('lat', 9, 6)->nullable();
                $t->decimal('lng', 9, 6)->nullable();
            });
        }
        if (!$this->columnExists('externalmedia','coords')) {
            try {
                DB::statement("ALTER TABLE `externalmedia` ADD COLUMN `coords` POINT GENERATED ALWAYS AS (POINT(lng, lat)) STORED");
                DB::statement("CREATE SPATIAL INDEX `sp_ext_coords` ON `externalmedia` (`coords`)");
            } catch (\Throwable $e) {
                // No pasa nada si tu versión no soporta POINT/índice espacial
            }
        }

        // Limpieza de JSON con "null" como string
        if ($this->columnExists('externalmedia','gallery')) {
            DB::statement("UPDATE `externalmedia` SET `gallery` = NULL WHERE `gallery` = '\"null\"'");
        }
        if ($this->columnExists('externalmedia','location')) {
            DB::statement("UPDATE `externalmedia` SET `location` = NULL WHERE `location` = '\"null\"'");
        }

        /** ---------------- sales ---------------- */
        if ($this->columnExists('sales','status') && !$this->indexExists('sales','sales_status')) {
            DB::statement("ALTER TABLE `sales` ADD INDEX `sales_status` (`status`)");
        }
        if ($this->columnExists('sales','begin_date_rental') && $this->columnExists('sales','expiration_date_rental')) {
            if (!$this->indexExists('sales','ix_sales_dates')) {
                DB::statement("ALTER TABLE `sales` ADD INDEX `ix_sales_dates` (`begin_date_rental`,`expiration_date_rental`)");
            }
            if ($this->columnExists('sales','status') && !$this->indexExists('sales','ix_sales_status_dates')) {
                DB::statement("ALTER TABLE `sales` ADD INDEX `ix_sales_status_dates` (`status`,`begin_date_rental`,`expiration_date_rental`)");
            }
        }
        if ($this->columnExists('sales','company_id') && !$this->indexExists('sales','sales_company')) {
            DB::statement("ALTER TABLE `sales` ADD INDEX `sales_company` (`company_id`)");
        }
        if ($this->columnExists('sales','customer_id') && !$this->indexExists('sales','sales_customer')) {
            DB::statement("ALTER TABLE `sales` ADD INDEX `sales_customer` (`customer_id`)");
        }

        /** ---------------- payments ---------------- */
        if (Schema::hasTable('payments')) {
            if ($this->columnExists('payments','sale_id') && $this->columnExists('payments','status') && !$this->indexExists('payments','ix_pay_sale_status')) {
                DB::statement("ALTER TABLE `payments` ADD INDEX `ix_pay_sale_status` (`sale_id`,`status`)");
            }
            if ($this->columnExists('payments','payment_date') && !$this->indexExists('payments','ix_pay_date')) {
                DB::statement("ALTER TABLE `payments` ADD INDEX `ix_pay_date` (`payment_date`)");
            }
        }

        /** ---------------- externalmedia_sale (pivot) ---------------- */
        if (Schema::hasTable('externalmedia_sale')) {
            if (!$this->indexExists('externalmedia_sale','ux_ext_sale')) {
                DB::statement("ALTER TABLE `externalmedia_sale` ADD UNIQUE INDEX `ux_ext_sale` (`externalmedia_id`,`sale_id`)");
            }
            if (!$this->indexExists('externalmedia_sale','ix_sale_ext')) {
                DB::statement("ALTER TABLE `externalmedia_sale` ADD INDEX `ix_sale_ext` (`sale_id`,`externalmedia_id`)");
            }

            // FKs con cascade (intenta eliminar antiguas y crear nuevas)
            try { DB::statement('ALTER TABLE `externalmedia_sale` DROP FOREIGN KEY `externalmedia_sale_externalmedia_id_foreign`'); } catch (\Throwable $e) {}
            try { DB::statement('ALTER TABLE `externalmedia_sale` DROP FOREIGN KEY `externalmedia_sale_sale_id_foreign`'); } catch (\Throwable $e) {}

            try {
                DB::statement("ALTER TABLE `externalmedia_sale`
                    ADD CONSTRAINT `fk_extsale_ext` FOREIGN KEY (`externalmedia_id`) REFERENCES `externalmedia`(`id`) ON DELETE CASCADE");
            } catch (\Throwable $e) {}
            try {
                DB::statement("ALTER TABLE `externalmedia_sale`
                    ADD CONSTRAINT `fk_extsale_sale` FOREIGN KEY (`sale_id`) REFERENCES `sales`(`id`) ON DELETE CASCADE");
            } catch (\Throwable $e) {}
        }

        /** ---------------- budget_externalmedia (pivot) ---------------- */
        if (Schema::hasTable('budget_externalmedia') && !$this->indexExists('budget_externalmedia','ux_budget_ext')) {
            DB::statement("ALTER TABLE `budget_externalmedia` ADD UNIQUE INDEX `ux_budget_ext` (`budget_id`,`externalmedia_id`)");
        }

        /** ---------------- media_documents ---------------- */
        if (Schema::hasTable('media_documents')) {
            if ($this->columnExists('media_documents','externalmedia_id') && $this->columnExists('media_documents','document_type') &&
                !$this->indexExists('media_documents','ix_md_extype')) {
                DB::statement("ALTER TABLE `media_documents` ADD INDEX `ix_md_extype` (`externalmedia_id`,`document_type`)");
            }
            if ($this->columnExists('media_documents','no_expiry') && $this->columnExists('media_documents','expires_at') &&
                !$this->indexExists('media_documents','ix_md_expiry')) {
                DB::statement("ALTER TABLE `media_documents` ADD INDEX `ix_md_expiry` (`no_expiry`,`expires_at`)");
            }
        }
    }

    public function down(): void
    {
        // Solo quitamos índices/constraints creados (no revertimos cambios de tipo).
        $drop = function (string $table, string $index) {
            try { DB::statement("ALTER TABLE `{$table}` DROP INDEX `{$index}`"); } catch (\Throwable $e) {}
        };

        $drop('externalmedia','ux_externalmedia_code');
        $drop('externalmedia','ix_ext_status_mediatype');
        $drop('externalmedia','ix_ext_dept_muni');
        $drop('externalmedia','ix_ext_district');
        $drop('externalmedia','ft_ext_address');
        $drop('externalmedia','sp_ext_coords');
        try { DB::statement("ALTER TABLE `externalmedia` DROP COLUMN `coords`"); } catch (\Throwable $e) {}
        if ($this->columnExists('externalmedia','lat')) { Schema::table('externalmedia', fn(Blueprint $t)=>$t->dropColumn('lat')); }
        if ($this->columnExists('externalmedia','lng')) { Schema::table('externalmedia', fn(Blueprint $t)=>$t->dropColumn('lng')); }

        $drop('sales','sales_status');
        $drop('sales','ix_sales_dates');
        $drop('sales','ix_sales_status_dates');
        $drop('sales','sales_company');
        $drop('sales','sales_customer');

        $drop('payments','ix_pay_sale_status');
        $drop('payments','ix_pay_date');

        $drop('externalmedia_sale','ux_ext_sale');
        $drop('externalmedia_sale','ix_sale_ext');
        try { DB::statement("ALTER TABLE `externalmedia_sale` DROP FOREIGN KEY `fk_extsale_ext`"); } catch (\Throwable $e) {}
        try { DB::statement("ALTER TABLE `externalmedia_sale` DROP FOREIGN KEY `fk_extsale_sale`"); } catch (\Throwable $e) {}

        $drop('budget_externalmedia','ux_budget_ext');

        $drop('media_documents','ix_md_extype');
        $drop('media_documents','ix_md_expiry');
    }
};

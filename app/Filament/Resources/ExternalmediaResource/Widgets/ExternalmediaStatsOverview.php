<?php

namespace App\Filament\Resources\ExternalmediaResource\Widgets;

use App\Models\Externalmedia;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ExternalmediaStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Cantidad de medios externos', Externalmedia::count())->chart([7, 2, 10, 3, 15, 4, 17])->color('success'),
            Stat::make('Cantidad usuarios', User::count())->chart([17, 4, 15, 3, 10, 2, 7])->color('info'),
        ];
    }
}

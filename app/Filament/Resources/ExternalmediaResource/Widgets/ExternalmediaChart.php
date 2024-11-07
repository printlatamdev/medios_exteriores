<?php

namespace App\Filament\Resources\ExternalmediaResource\Widgets;

use App\Models\Externalmedia;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ExternalmediaChart extends ChartWidget
{
    protected static ?string $heading = 'Medios externos por distrito';

    protected static ?string $maxHeight = '500px';

    protected function getData(): array
    {
        $media = Trend::query(Externalmedia::groupBy('mediatype_id'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Medios externos',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $media->map(fn (TrendValue $value) => $value),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

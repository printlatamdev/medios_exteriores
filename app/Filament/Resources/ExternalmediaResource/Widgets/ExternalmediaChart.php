<?php

namespace App\Filament\Resources\ExternalmediaResource\Widgets;

use Filament\Widgets\ChartWidget;

class ExternalmediaChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected static ?string $maxHeight = '500px';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Medios externos',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

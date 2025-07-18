<div class="w-full space-y-6">

    {{-- Mapa --}}
    @if($iframe)
        <div class="aspect-video w-full border rounded overflow-hidden">
            {!! $iframe !!}
        </div>
    @else
        <div class="bg-gray-100 p-4 rounded text-sm text-gray-600">
            No hay ubicación disponible.
        </div>
    @endif

    {{-- Información del medio --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Ubicación --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded p-4 border border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Ubicación</h2>
            <ul class="text-sm space-y-1 text-gray-700 dark:text-gray-200">
                <li><strong>Departamento:</strong> {{ $record->department->name ?? 'N/D' }}</li>
                <li><strong>Municipio:</strong> {{ $record->municipality->name ?? 'N/D' }}</li>
                <li><strong>Distrito:</strong> {{ $record->district->name ?? 'N/D' }}</li>
                <li><strong>Dirección:</strong> {{ $record->address }}</li>
            </ul>
        </div>

        {{-- Detalles técnicos --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded p-4 border border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Detalles técnicos</h2>
            <ul class="text-sm space-y-1 text-gray-700 dark:text-gray-200">
                <li><strong>Código:</strong> {{ $record->code }}</li>
                <li><strong>Clase:</strong> {{ $record->clase }}</li>
                <li><strong>Tipo de medio:</strong> {{ $record->mediatype->name ?? 'N/D' }}</li>
                <li><strong>Medidas:</strong> {{ $record->width }} x {{ $record->height }}</li>
                <li><strong>Flujo vehicular:</strong> {{ $record->traffic_flow ?? 'N/D' }}</li>
                <li><strong>Iluminación:</strong> {{ $record->lighting ?? 'N/D' }}</li>
                <li><strong>Arrendamiento:</strong> {{ $record->rental ?? 'N/D' }}</li>
                <li><strong>Producción:</strong> {{ $record->production ?? 'N/D' }}</li>
            </ul>
        </div>

    </div>
</div>

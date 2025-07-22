@if ($url)
    <div class="w-full" style="height: 80vh;">
        <iframe
            src="{{ $url }}"
            class="w-full h-full rounded border shadow"
            frameborder="0"
        ></iframe>
    </div>
@else
    <p class="text-sm text-gray-500">No hay archivo disponible.</p>
@endif

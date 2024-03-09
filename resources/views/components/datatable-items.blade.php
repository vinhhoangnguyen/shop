@props(['columnName', 'sortColumn', 'sortDirect'])

<button wire:click="doSort('{{$columnName}}')" class="d-flex px-1 btn btn-light">
    {{$slot}}
    <div>
        @if ($sortColumn === $columnName)
            @if ($sortDirect == 'desc')
                <i class="mdi mdi-arrow-up"></i>
            @else
                <i class="mdi mdi-arrow-down"></i>
            @endif
        @else
            <i class="mdi mdi-swap-vertical"></i>
        @endif
    </div>
</button>

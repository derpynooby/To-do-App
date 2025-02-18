@props(['type', 'formId' => 'Form', 'url' => '#', 'class' => '', 'children' => ''])

@if($type === 'add')
    <a href="{{ $url }}" class="btn btn-outline-primary d-flex align-items-center gap-2" style="width: 20rem; height: 4rem;">
        <i class="bi bi-plus-square"></i>
        <span class="d-none d-lg-inline">{{ $slot }}</span>
    </a>

@elseif($type === 'modal')
    <button {{ $attributes->merge(['class' => "btn btn-outline-primary d-flex align-items-center gap-2"]) }} type="button" data-bs-toggle="modal">
        <i class="bi bi-check2-square"></i>
        {{ $slot }}
    </button>

@elseif($type === 'submit')
    <button type="submit" form="{{ $formId }}" class="btn btn-outline-success d-flex align-items-center gap-2">
        <i class="bi bi-check2-square"></i> {{ $slot }}
    </button>

@elseif($type === 'cancel')
    <a href="{{ $url }}" {{ $attributes->merge(['class' => 'btn btn-outline-danger d-flex align-items-center gap-2']) }} data-bs-dismiss="modal">
        <i class="bi bi-arrow-bar-left"></i> {{ $slot }}
    </a>

@elseif($type === 'edit')
    <a href="{{ $url }}" {{ $attributes }} data-bs-toggle="modal" class="btn text-warning d-flex align-items-center gap-2">
        <i class="bi bi-pencil-square"></i> {{ $slot }}
    </a>

@elseif($type === 'delete')
<form action="{{ $url }}" method="post">
    @method('delete')
    @csrf
    <button class="btn text-danger d-flex align-items-center gap-2">
        <i class="bi bi-trash-fill"></i> {{ $slot }}
    </button>
</form>

@elseif($type === 'search')
    <button type="submit" class="btn btn-outline-success d-flex align-items-center gap-2">
        <i class="bi bi-search"></i> {{ $slot }}
    </button>
    
@endif

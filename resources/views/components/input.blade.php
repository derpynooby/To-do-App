    @props(['type', 'name', 'label', 'addonText', 'helpText', 'value', 'placeholder'])
    
    @if($type === 'text')
        <div class="mb-3">
            <label for="{{ $name }}" class="form-label">{{ $label }}</label>
            <div class="input-group">
                <input type="text" class="form-control" id="{{ $name }}" aria-describedby="basic-addon3 basic-addon4" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}">
            </div>
        </div>
        
        @elseif($type === 'textarea')
        <div class="input-group">
            <label for="{{ $name }}" class="form-label">{{ $label }}</label>
            <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" name="{{ $name }}" placeholder="{{ $placeholder }}" value="">{{ $value ?? '' }}</textarea>
            </div>
            <div class="form-text" id="basic-addon4">{{ $helpText }}</div>
        </div>

    @elseif($type === 'checkbox')
        <div class="input-group mb-3">
            <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="{{ $value ?? '' }}" aria-label="Checkbox for following text input" name="{{ $name }}">
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}">
        </div>

    @elseif($type === 'radio')
        <div class="input-group">
            <div class="input-group-text">
            <input class="form-check-input mt-0" type="radio" value="{{ $value ?? '' }}" aria-label="Radio button for following text input" name="{{ $name }}">
            </div>
            <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}">
        </div>

    @elseif($type === 'select')
        <div class="input-group mb-3">
            <select class="form-select" id="{{ $name }}" name="{{ $name }}">
                {{ $slot }}
            </select>
            <label class="input-group-text" for="{{ $name }}">{{ $label }}</label>
        </div>

    @elseif($type === 'date')
        <div class="mb-3">
            <label for="{{ $name }}" class="form-label">{{ $label }}</label>
            <input type="date" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder }}">
        </div>

    @elseif($type === 'hidden')
        <input type="hidden" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value ?? '' }}">

    @endif
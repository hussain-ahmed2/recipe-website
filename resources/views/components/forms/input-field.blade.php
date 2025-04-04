@props([
    'name',
    'label',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'required' => true,
    'class' => '',
    'min' => null,
    'max' => null,
    'step' => null
])

@php
    $defaults = [
        'name' => $name,
        'id' => $name,
        'type' => $type,
        'placeholder' => $placeholder,
        'value' => $value ? $value : old($name),
        'class' =>
            'border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300 ' .
            $class,
        'required' => $required,
    ];

    if ($min) {
        $defaults['min'] = $min;
    }

    if ($max) {
        $defaults['max'] = $max;
    }

    if ($step) {
        $defaults['step'] = $step;
    }
@endphp

<div class="flex flex-col gap-1">
    @if (isset($label))
        <label class="font-semibold" for="{{ $name }}">{{ $label }}</label>
    @endif

    <input {{ $attributes->merge($defaults) }}>

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

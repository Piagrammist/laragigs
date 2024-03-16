@props([
    'name',
    'label' => null,
    'value' => null,
    'type' => 'text',
    'placeholder' => null,
])

@php($class = 'w-full rounded border border-gray-200 p-2 outline-none ring-laravel focus-visible:ring-2 transition ease-linear duration-200')

@unless(empty($label))
    <label for="{{ $name }}" class="mb-2 inline-block text-lg">{{ $label }}</label>
@endunless

@if($type === 'textarea')
    <textarea id="{{ $name }}" name="{{ $name }}" rows="10" class="{{ $class }}"
              placeholder="{{ $placeholder }}">{{ $value }}</textarea>
@else
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="{{ $class }}"
           value="{{ $value }}" placeholder="{{ $placeholder }}"/>
@endif

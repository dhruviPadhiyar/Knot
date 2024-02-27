@props(['type'=>'text','placeholder','name','class'=>'form-control form-control-sm'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input
        class="{{ $class }}"
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        id="{{ $name }}"
        {{$attributes(['value'=>old($name)])}}
    />

</x-form.field>

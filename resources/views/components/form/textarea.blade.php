@props(['name','placeholder'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea class="form-control form-control-sm" name="{{ $name }}"  placeholder="{{ $placeholder }}"></textarea>
</x-form.field>

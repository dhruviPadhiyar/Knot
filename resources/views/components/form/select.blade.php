@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <select class="form-select form-select-sm" name="{{ $name }}" >
        <option selected> Select {{ ucwords($name) }}</option>
    </select>
</x-form.field>

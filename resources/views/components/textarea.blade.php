<textarea id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-input']) }}>
    {{ $slot }}
</textarea>

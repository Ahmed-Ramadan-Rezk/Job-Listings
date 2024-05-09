@props(['name'])

@error($name)
<p class="text-xs font-semibold mt-1 text-red-500"> {{ $message }}</p>
@enderror
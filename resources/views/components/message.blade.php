@props(['message'])

@if(isset($message))
<div class="flex justify-center">
    <div class="w-2/3 border px-4 py-3 rounded relative bg-green-100 border-green-400 text-green-700 text-center mt-5">
        {{$message}}
    </div>
</div>
@endif

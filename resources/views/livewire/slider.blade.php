<div class="w-full">
    @if($showValue)
        <div class="flex justify-between mb-2 text-sm">
            <span class="text-gray-600">{{ $prefix }}{{ $min }}{{ $suffix }}</span>
            <span class="font-medium text-gray-900">{{ $prefix }}{{ $value }}{{ $suffix }}</span>
            <span class="text-gray-600">{{ $prefix }}{{ $max }}{{ $suffix }}</span>
        </div>
    @endif
    <div class="relative">
        <input
            type="range"
            wire:model.live="value"
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            @class([
                'w-full appearance-none bg-transparent cursor-pointer',
                '[&::-webkit-slider-runnable-track]:rounded-full [&::-webkit-slider-runnable-track]:bg-gray-200',
                '[&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-blue-500 [&::-webkit-slider-thumb]:shadow-md',
                '[&::-webkit-slider-runnable-track]:h-1 [&::-webkit-slider-thumb]:w-3 [&::-webkit-slider-thumb]:h-3 [&::-webkit-slider-thumb]:-mt-1' => $size === 'sm',
                '[&::-webkit-slider-runnable-track]:h-2 [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:-mt-1' => $size === 'md',
                '[&::-webkit-slider-runnable-track]:h-3 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:-mt-1' => $size === 'lg',
            ])
        >
    </div>
</div>

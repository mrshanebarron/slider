<div class="w-full">
    <div class="flex items-center gap-4">
        <input type="range" wire:model.live="value" min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" @if($disabled) disabled @endif class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600 disabled:opacity-50">
        @if($showValue)<span class="text-sm font-medium text-gray-700 min-w-[3rem] text-right">{{ $value }}</span>@endif
    </div>
    <div class="flex justify-between mt-1"><span class="text-xs text-gray-500">{{ $min }}</span><span class="text-xs text-gray-500">{{ $max }}</span></div>
</div>

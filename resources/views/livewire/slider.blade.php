<div style="width: 100%;">
    <div style="display: flex; align-items: center; gap: 16px;">
        <input
            type="range"
            wire:model.live="value"
            min="{{ $this->min }}"
            max="{{ $this->max }}"
            step="{{ $this->step }}"
            @if($this->disabled) disabled @endif
            style="width: 100%; height: 8px; background: #e5e7eb; border-radius: 8px; appearance: none; cursor: pointer; accent-color: #2563eb; {{ $this->disabled ? 'opacity: 0.5;' : '' }}"
        >
        @if($this->showValue)<span style="font-size: 14px; font-weight: 500; color: #374151; min-width: 48px; text-align: right;">{{ $this->value }}</span>@endif
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 4px;"><span style="font-size: 12px; color: #6b7280;">{{ $this->min }}</span><span style="font-size: 12px; color: #6b7280;">{{ $this->max }}</span></div>
</div>

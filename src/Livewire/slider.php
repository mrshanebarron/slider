<?php

namespace MrShaneBarron\Slider\Livewire;

use Livewire\Component;

class Slider extends Component
{
    public int|float $value = 0;
    public int|float $min = 0;
    public int|float $max = 100;
    public int|float $step = 1;
    public bool $showValue = true;
    public bool $disabled = false;

    public function updatedValue(): void
    {
        $this->dispatch('slider-changed', value: $this->value);
    }

    public function render()
    {
        return view('ld-slider::livewire.slider');
    }
}

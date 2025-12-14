<?php

namespace MrShaneBarron\Slider\Livewire;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class Slider extends Component
{
    #[Modelable]
    public int|float $value = 50;
    
    public int|float $min = 0;
    public int|float $max = 100;
    public int|float $step = 1;
    public bool $showValue = true;
    public string $size = 'md';
    public string $color = 'blue';
    public ?string $prefix = null;
    public ?string $suffix = null;

    public function mount(
        int|float $value = 50,
        int|float $min = 0,
        int|float $max = 100,
        int|float $step = 1,
        bool $showValue = true,
        string $size = 'md',
        string $color = 'blue',
        ?string $prefix = null,
        ?string $suffix = null
    ): void {
        $this->value = $value;
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        $this->showValue = $showValue;
        $this->size = $size;
        $this->color = $color;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    public function getPercentage(): float
    {
        return (($this->value - $this->min) / ($this->max - $this->min)) * 100;
    }

    public function render()
    {
        return view('ld-slider::livewire.slider');
    }
}

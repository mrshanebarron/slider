<?php

namespace MrShaneBarron\Slider;

use Illuminate\Support\ServiceProvider;

class SliderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('ld-slider', Livewire\Slider::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-slider');
    }
}

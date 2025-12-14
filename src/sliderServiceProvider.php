<?php

namespace MrShaneBarron\slider;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\slider\Livewire\slider;
use MrShaneBarron\slider\View\Components\slider as Bladeslider;
use Livewire\Livewire;

class sliderServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-slider.php', 'ld-slider');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-slider');

        Livewire::component('ld-slider', slider::class);

        $this->loadViewComponentsAs('ld', [
            Bladeslider::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-slider.php' => config_path('ld-slider.php'),
            ], 'ld-slider-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-slider'),
            ], 'ld-slider-views');
        }
    }
}

# Slider

A range slider component for Laravel applications. Supports single and range values with customizable styling. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/slider
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-slider wire:model="value" />
```

### With Min/Max

```blade
<livewire:sb-slider wire:model="price" :min="0" :max="1000" :step="10" />
```

### Show Value

```blade
<livewire:sb-slider wire:model="volume" :show-value="true" />
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wire:model` | number | `0` | Current value |
| `min` | number | `0` | Minimum value |
| `max` | number | `100` | Maximum value |
| `step` | number | `1` | Step increment |
| `show-value` | boolean | `false` | Display current value |
| `disabled` | boolean | `false` | Disable slider |

## Vue 3 Usage

### Setup

```javascript
import { SbSlider } from './vendor/sb-slider';
app.component('SbSlider', SbSlider);
```

### Basic Usage

```vue
<template>
  <SbSlider v-model="value" />
  <p>Value: {{ value }}</p>
</template>

<script setup>
import { ref } from 'vue';
const value = ref(50);
</script>
```

### With Options

```vue
<template>
  <SbSlider
    v-model="price"
    :min="0"
    :max="1000"
    :step="50"
    show-value
  />
</template>
```

### Price Filter

```vue
<template>
  <div>
    <label class="block text-sm font-medium mb-2">
      Price: ${{ price }}
    </label>
    <SbSlider
      v-model="price"
      :min="0"
      :max="500"
      :step="10"
    />
    <div class="flex justify-between text-xs text-gray-500 mt-1">
      <span>$0</span>
      <span>$500</span>
    </div>
  </div>
</template>
```

### Volume Control

```vue
<template>
  <div class="flex items-center gap-3">
    <VolumeIcon class="w-5 h-5" />
    <SbSlider
      v-model="volume"
      :min="0"
      :max="100"
      class="flex-1"
    />
    <span class="w-8 text-sm">{{ volume }}%</span>
  </div>
</template>
```

### Custom Colors

```vue
<template>
  <SbSlider
    v-model="value"
    track-color="bg-gray-200"
    fill-color="bg-green-500"
    thumb-color="bg-green-600"
  />
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `modelValue` | Number | `0` | Current value |
| `min` | Number | `0` | Minimum value |
| `max` | Number | `100` | Maximum value |
| `step` | Number | `1` | Step increment |
| `showValue` | Boolean | `false` | Show value label |
| `disabled` | Boolean | `false` | Disable interaction |
| `trackColor` | String | `'bg-gray-200'` | Track color class |
| `fillColor` | String | `'bg-blue-600'` | Fill color class |
| `thumbColor` | String | `'bg-blue-600'` | Thumb color class |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `update:modelValue` | `number` | Value changed |
| `change` | `number` | Value change completed |

## Features

- **Range Selection**: Min to max values
- **Step Increments**: Configurable step size
- **Value Display**: Optional current value
- **Custom Colors**: Tailwind color classes
- **Accessible**: Keyboard support

## Styling

Uses Tailwind CSS:
- Gray track background
- Blue fill and thumb
- Rounded track
- Focus ring on thumb

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License

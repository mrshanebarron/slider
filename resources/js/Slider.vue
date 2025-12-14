<template>
  <div class="space-y-2">
    <div v-if="showValue" class="flex justify-between text-sm text-gray-600">
      <span>{{ min }}</span>
      <span class="font-medium">{{ modelValue }}</span>
      <span>{{ max }}</span>
    </div>
    <div class="relative" ref="sliderRef">
      <div class="h-2 bg-gray-200 rounded-full">
        <div
          class="absolute h-2 bg-blue-600 rounded-full"
          :style="{ width: percentage + '%' }"
        ></div>
      </div>
      <div
        class="absolute top-1/2 -translate-y-1/2 w-5 h-5 bg-white border-2 border-blue-600 rounded-full cursor-pointer shadow-md"
        :style="{ left: `calc(${percentage}% - 10px)` }"
        @mousedown="startDrag"
        @touchstart.prevent="startDrag"
      ></div>
    </div>
    <div v-if="showLabels && labels.length" class="flex justify-between text-xs text-gray-500">
      <span v-for="label in labels" :key="label">{{ label }}</span>
    </div>
  </div>
</template>

<script>
import { ref, computed, onMounted, onUnmounted } from 'vue';

export default {
  name: 'LdSlider',
  props: {
    modelValue: { type: Number, default: 0 },
    min: { type: Number, default: 0 },
    max: { type: Number, default: 100 },
    step: { type: Number, default: 1 },
    showValue: { type: Boolean, default: true },
    showLabels: { type: Boolean, default: false },
    labels: { type: Array, default: () => [] }
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const sliderRef = ref(null);
    const isDragging = ref(false);

    const percentage = computed(() => {
      return ((props.modelValue - props.min) / (props.max - props.min)) * 100;
    });

    const updateValue = (clientX) => {
      if (!sliderRef.value) return;
      const rect = sliderRef.value.getBoundingClientRect();
      const x = Math.max(0, Math.min(clientX - rect.left, rect.width));
      const rawValue = (x / rect.width) * (props.max - props.min) + props.min;
      const steppedValue = Math.round(rawValue / props.step) * props.step;
      const clampedValue = Math.max(props.min, Math.min(props.max, steppedValue));
      emit('update:modelValue', clampedValue);
    };

    const startDrag = () => { isDragging.value = true; };

    const onMove = (e) => {
      if (!isDragging.value) return;
      const clientX = e.clientX || e.touches?.[0]?.clientX;
      updateValue(clientX);
    };

    const stopDrag = () => { isDragging.value = false; };

    onMounted(() => {
      window.addEventListener('mousemove', onMove);
      window.addEventListener('mouseup', stopDrag);
      window.addEventListener('touchmove', onMove);
      window.addEventListener('touchend', stopDrag);
    });

    onUnmounted(() => {
      window.removeEventListener('mousemove', onMove);
      window.removeEventListener('mouseup', stopDrag);
      window.removeEventListener('touchmove', onMove);
      window.removeEventListener('touchend', stopDrag);
    });

    return { sliderRef, percentage, startDrag };
  }
};
</script>

<template>
  <div class="tabs__content-item">
    <template v-if="active">
      <slot name="content" />
    </template>
  </div>
</template>

<script>
export default {
  name: 'Tab',
  props: {
    selected: { type: Boolean, default: false },
  },
  data() {
    return {
      active: this.selected,
    };
  },
}
</script>

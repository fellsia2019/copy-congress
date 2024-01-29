<template>
  <component
    :is="tag"
    class="custom-button"
    :class="buttonClassesStr"
    v-bind="$attrs"
    v-on="$listeners"
  >
    <div class="custom-button__icons-status" v-if="Boolean(status)">
      <inline-svg
        class="custom-button__icon-item"
        :class="`custom-button__icon-${status}`"
        :src="status"
      />
    </div>
    <span class="custom-button__content"><slot></slot></span>
  </component>
</template>

<script>
export default {
  props: {
    tag: {
      type: String,
      default: 'button'
    },
    size: {
      type: String,
      default: 'sm' // sm | md | ml | ll
    },
    theme: {
      type: String,
      default: 'outline-light' // outline-light | outline-black | outline-inherit | outline-primary | primary | simple-light | light | light-black
    },
    status: {
      type: String,
      default: '' // loading // success
    },
    noHover: {
      type: Boolean,
      default: false,
    }
  },
  computed: {
    buttonClassesStr(){
      const prefix = 'custom-button';
      const classes = [];

      classes.push(`${prefix}--size-${this.size}`)
      classes.push(`${prefix}--theme-${this.theme}`)

      if (this.status) {
        classes.push(`${prefix}--is-pending`)
      }
      if (this.noHover) {
        classes.push(`${prefix}--no-hover`)
      }

      return classes.join(' ')
    }
  }
}

</script>

<style lang="scss">
@import "../../scss/base/includes";
@import "../../scss/elements/custom-button";

</style>

<template>
  <div class="custom-checkbox" :class="{ 'custom-checkbox--error': error }">
    <input
      :id="id"
      :checked="value"
      type="checkbox"
      class="custom-checkbox__input"
      @change="onChange"
    >
    <label :for="id" class="custom-checkbox__label">
      <slot></slot>
    </label>
  </div>
</template>

<script>
import { randomString } from '/frontend-krd/components/helpers/randomString.js'
export default {
  props: {
    value: {
      type: Boolean,
      default: false
    },
    error: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      id: randomString()
    }
  },
  methods: {
    onChange(e) {
      if (e && e.target && e.target instanceof HTMLInputElement) {
        this.$emit('input', e.target.checked)
      }
    }
  },
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.custom-checkbox';
$checkbox-size: 20px;

#{$b} {
  display: flex;
  align-items: center;
  font-family: $font-family-inter;
  font-size: 16px;
  font-weight: 500;
  line-height: 1.3;
  color: $black-true;
  min-height: $checkbox-size;

  // .custom-checkbox__input
  &__input {
    display: none;

    &:checked {
      & ~ #{$b}__label {
        &::before {
          border-color: $bg-brand;
        }

        &::after {
          opacity: 1;
          transform: translate(0, -50%);
        }
      }
    }
  }

  // .custom-checkbox__label
  &__label {
    position: relative;
    padding-left: 32px;
    display: inline-block;
    transition: all 0.3s ease;
    cursor: pointer;

    &::before {
      content: "";
      position: absolute;
      left: 0;
      top: 50%;
      width: $checkbox-size;
      height: $checkbox-size;
      transform: translateY(-50%);
      border: 2px solid rgba($white-true, 0.2);
      transition: all 0.3s ease;

      #{$b}--error & {
        border-color: $color-error;
      }
    }

    &::after {
      content: "";
      position: absolute;
      top: 50%;
      left: 6px;
      width: 8px;
      height: 8px;
      background-repeat: no-repeat;
      background-color: $bg-brand;
      opacity: 0;
      transition: all 0.3s ease;
      transform: translate(3px, -3px);
      z-index: 1;
    }
  }
}

</style>

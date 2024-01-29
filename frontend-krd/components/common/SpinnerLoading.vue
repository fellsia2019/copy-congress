<template>
  <div class="spinner-loading" :class="{'spinner-loading--is-loading': isLoading}">
    <div class="spinner-loading__spinner" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLoading: false
    }
  },
  methods: {
    setStatusLoading(state) {
      this.isLoading = state

      if (state) {
        const delta = window.innerWidth - document.documentElement.clientWidth
        document.body.style.overflow = 'hidden'
        document.body.style.paddingRight = `${delta}px`
      } else {
        document.body.style.overflow = ''
        document.body.style.paddingRight = ''
      }
    }
  },
  mounted() {
    this.$root.$on('setLoading', this.setStatusLoading)
  },
  beforeDestroy() {
    this.$root.$off('setLoading', this.setStatusLoading)
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/u-includes';

$b: '.spinner-loading';

#{$b} {
  display: none;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background-color: rgba($color-base-origin, 0.2);
  align-items: center;
  justify-content: center;
  z-index: 10000;

  &--is-loading,
  body.u-is-loading & {
    display: flex;
  }

  &__spinner {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 60px;
    height: 60px;
    transform: translate(-50%,-50%);

    &::after {
      content: "";
      display: block;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 6px inset $color-base-origin;
      animation: spin-rotate 2.5s infinite linear;
    }
  }
}

@keyframes spin-rotate {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>

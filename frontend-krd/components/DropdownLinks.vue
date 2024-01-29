<template>
  <div class="dropdown-links" :class="{'dropdown-links--is-opened': isOpened}">
    <div class="dropdown-links__caption" @click="toggle">
      <div class="dropdown-links__caption-text">
        {{ caption }}
      </div>
      <inline-svg class="dropdown-links__caption-icon" src="triangle-down" />
    </div>
    <div class="dropdown-links__inner">
      <div
        v-for="(link, i) in links"
        :key="`dropdown-links__link-${i}`"
        class="dropdown-links__item"
      >
        <a
          :href="link.url"
          :target="link.target"
          class="dropdown-links__link"
          @click="close"
        >
          {{ link.name }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    links: {
      type: Array,
      default: () => []
    },
    caption: {
      type: String,
      default: ''
    },
  },
  data() {
    return {
      isOpened: false
    }
  },
  methods: {
    toggle() {
      this.isOpened = !this.isOpened
    },
    close() {
      this.isOpened = false
    }
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.dropdown-links';

#{$b} {
  * {
    line-height: 1.5;
  }
  transition: all 0.3s ease;

  // .dropdown-links__caption
  &__caption {
    position: relative;
    display: inline-flex;
    align-items: center;
    padding-right: 30px;
    cursor: pointer;
    // transition: all 0.3s ease;

    &:hover {
      color: #222222;
    }

    // .dropdown-links__caption-icon
    &-icon {
      position: absolute;
      right: 0;
      width: 20px;
      height: 20px;
      top: 50%;
      display: flex;
      transform: translateY(-50%);

      svg {
        max-width: 100%;
        max-height: 100%;
        path {
          fill: currentColor;
        }
      }

      #{$b}--is-opened & {
        transform: translateY(-50%) rotate(180deg);
      }
    }
  }

  // .dropdown-links__inner
  &__inner {
    transition: all 0.5s ease;
    max-height: 400px;

    @include removeScrollBar();

    #{$b}:not(#{$b}--is-opened) & {
      opacity: 0;
      max-height: 0 !important;
      padding: 0 !important;
      margin: 0 !important;
      pointer-events: none;
      touch-action: none;
    }
  }

  // .dropdown-links__link
  &__link {
    font-size: 75%;
    color: $white-true;
    text-decoration: none;

    &:hover {
      color: #222222;
    }
  }
}

</style>

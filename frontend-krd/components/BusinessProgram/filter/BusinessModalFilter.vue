<template>
  <div
    v-show="isVisible"
    class="business-modal-filter"
    :class="`business-modal-filter--size-${size}`"
    @mousedown.self="close"
  >
    <div class="business-modal-filter__inner">
      <div class="business-modal-filter__sticky-block">
        <div class="business-modal-filter__header">
          <div class="business-modal-filter__header-left">
            <div class="business-modal-filter__header-caption title-2md">
              {{ caption }}
            </div>
            <div class="business-modal-filter__header-clear" @click="clear">
              {{ btnClearCaptionLang[lang] }}
            </div>
          </div>
          <div class="business-modal-filter__header-right">
            <CustomButton
              class="business-modal-filter__header-accept"
              theme="light"
              size="ml"
              @click="$emit('accept')"
            >
              {{ btnAcceptCaptionLang[lang] }}
            </CustomButton>
            <div class="business-modal-filter__close" @click="close">
              <inline-svg src="close" class="business-modal-filter__close-icon" />
            </div>
          </div>
        </div>
        <div class="business-modal-filter__search">
          <inline-svg src="search" class="business-modal-filter__search-icon" />
          <input type="text" class="business-modal-filter__search-input" v-model="search" @input="onSearch">
        </div>
      </div>
      <div ref="body" class="business-modal-filter__body">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    caption: {
      type: String,
      default: '',
    },
    isVisible: {
      type: Boolean,
      default: false
    },
    lang: {
      type: String,
      default: 'ru'
    },
    size: {
      type: String,
      default: 'xl' // xl | md
    }
  },
  data() {
    return {
      search: '',
      btnClearCaptionLang: {
        ru: 'Очистить все',
        en: 'Clear all'
      },
      btnAcceptCaptionLang: {
        ru: 'Применить',
        en: 'Apply'
      }
    }
  },
  methods: {
    close() {
      this.$emit('close')
    },
    setScrollLock(state = true) {
      const delta = window.innerWidth - document.documentElement.clientWidth

      document.body.style.overflow = state ? 'hidden' : ''
      document.body.style.paddingRight = state ? `${delta}px` : ''
    },
    clear() {
      this.search = ''
      this.$emit('clear')
      this.onSearch()

      this.$nextTick(() => {
        const checkboxesElements = this.$refs.body.querySelectorAll('input[type="checkbox"]')
        checkboxesElements.forEach(item => {
          item.checked = false
        });
      })
    },
    onSearch() {
      this.$emit('search', this.search)
    }
  },
  watch: {
    isVisible(state) {
      this.setScrollLock(state)
    }
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.business-modal-filter';

#{$b} {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  background-color: rgba($color-primary-3, 0.53);

  // .business-modal-filter__sticky-block
  &__sticky-block {
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
    background-color: $color-primary-4;
    padding: 24px 0;
    z-index: 2;
  }

  // .business-modal-filter__inner
  &__inner {
    width: 100%;
    max-width: 100vw;
    height: auto;
    border-radius: 0 0 24px 24px;
    background-color: $color-primary-4;
    color: $white-true;
    padding: 32px 82px;
    overflow-x: hidden;
    overflow-y: auto;
    padding-top: 0 !important;

    #{$b}--size-xl & {
      height: calc(100% - 86px);

      @include mobile {
        height: 100%;
      }
    }
    #{$b}--size-md & {
      height: auto;

      @include mobile {
        height: 100%;
      }
    }

    @include tablet {
      padding: 24px 32px;
    }

    @include mobile {
      max-height: 100%;
      border-radius: 0;
      padding: 24px 16px;
      height: 100%;
    }

    @include customScrollBar(8px, $white-true, rgba($white-true, 0.1))

  }

  // .business-modal-filter__close
  &__close {
    width: 40px;
    min-width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px;
    cursor: pointer;
    transition: all 0.3s ease;
    color: $white-true;
    background-color: $bg-brand;
    border-radius: 50%;

    &:hover {
      color: $bg-brand;
      background-color: $white-true;
    }

    // .business-modal-filter__close-icon
    &-icon {
      width: 100%;
      height: 100%;

      svg {
        width: 100%;
        height: 100%;

        path {
          stroke: currentColor;
        }
      }
    }
  }

  // .business-modal-filter__header
  &__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;

    @include mobile {
      align-items: unset;
    }

    // .business-modal-filter__header-left
    &-left {
      display: inline-flex;
      align-items: center;
      margin-right: 24px;

      @include mobile {
        margin-right: 0;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start
      }
    }

    // .business-modal-filter__header-right
    &-right {
      display: inline-flex;
      align-items: center;

      @include mobile {
        flex-direction: column-reverse;
        align-items: flex-end;
      }
    }

    // .business-modal-filter__header-caption
    &-caption {
      margin: 0 50px 0 0;

      @include tablet {
        margin: 0 32px 0 0;
      }

      @include mobile {
        margin: 0 0 16px 0;
      }
    }

    // .business-modal-filter__header-clear
    &-clear {
      cursor: pointer;
    }

    // .business-modal-filter__header-accept
    &-accept {
      margin-right: 27px;

      @include mobile {
        margin: 16px 0 0 0;
      }
    }
  }

  // .business-modal-filter__search
  &__search {
    position: relative;
    color: $white-true;

    // .business-modal-filter__search-icon
    &-icon {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      width: 17px;
      height: 17px;

      svg {
        width: 100%;
        height: 100%;

        path {
          fill: currentColor;
        }
      }
    }

    // .business-modal-filter__search-input
    &-input {
      width: 100%;
      height: 60px;
      border-radius: 61px;
      padding: 5px 16px 5px 51px;
      background-color: rgba($white-true, 0.1);
      border: 1px solid rgba($white-true, 0.1);
      transition: all 0.3s ease;

      &:hover,
      &:focus {
        border-color: $white-true;
      }
    }
  }

  // .business-modal-filter__body
  &__body {
    margin-top: 11px;
  }
}
</style>

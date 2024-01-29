<template>
  <div class="business-program-item" :class="{'business-program-item--is-header': isHeader}" @click="$emit('click', program)">
    <div class="business-program-item__inner">
      <div class="business-program-item__time business-program-item__inner-item" :class="{'business-program-item__invisible': !program.timeStr}">
        <div class="business-program-item__caption-mob">
          {{ header.timeStr }}
        </div>
        <div class="business-program-item__content">
          {{ program.timeStr }}
        </div>
      </div>
      <div class="business-program-item__address business-program-item__inner-item" :class="{'business-program-item__invisible': !program.address}">
        <div class="business-program-item__caption-mob">
          {{ header.address }}
        </div>
        <div class="business-program-item__content">
          {{ program.address }}
        </div>
      </div>
      <div class="business-program-item__tags business-program-item__inner-item" :class="{'business-program-item__invisible': !(program.tags && program.tags.length)}">
        <div class="business-program-item__caption-mob">
          {{ header.tags }}
        </div>
        <template v-if="!isHeader">
          <BusinessProgramTags :tags="program.tags" />
        </template>
        <template v-else>
          {{ program.tags }}
        </template>
      </div>
      <div class="business-program-item__name business-program-item__inner-item" :class="{'business-program-item__invisible': !program.title}">
        <div class="business-program-item__caption-mob">
          {{ header.title }}
        </div>
        <div class="business-program-item__content">
          {{ program.title }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    program: {
      type: Object,
      default: () => ({})
    },
    isHeader: {
      type: Boolean,
      default: false
    },
    header: {
      type: Object,
      default: () => ({})
    }
  },
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.business-program-item';

#{$b} {
  width: 100%;
  color: $black-true;
  font-weight: 500;
  padding: 20px 0;
  border-bottom: 2px solid rgba($black-true, 0.1);
  transition: all 0.3s ease;

  &:last-child {
    @include mobile-min {
      padding-bottom: 0;
    }
    border-bottom: 0;
  }

  &:not(#{$b}--is-header) {
    cursor: pointer;

    &:hover {
      #{$b}__inner {
        &:before {
          opacity: 1;
        }
      }
    }
  }

  @include tablet {
    min-width: 100%;
    width: fit-content;
  }

  @include mobile {
    border: none;
    font-size: 16px;
    background-color: rgba($bg-brand, 0.1);
    border-radius: 16px;
    padding: 16px;
    margin-bottom: 24px;
  }

  // .business-program-item--is-header
  &--is-header {
    color: rgba($black-true, 0.3);

    @include mobile {
      display: none !important;
    }
  }

  // .business-program-item__inner
  &__inner {
    position: relative;
    display: grid;
    grid-template-columns: 212px 210px 220px auto;
    gap: 24px;
    transition: all 0.3s ease;

    &::before {
      content: '';
      position: absolute;
      left: -10px;
      top: -10px;
      right: -10px;
      bottom: -10px;
      pointer-events: none;
      touch-action: none;
      opacity: 0;
      border-radius: 12px;
      background-color: rgba($bg-brand, 0.1);
      transition: all 0.3s ease;

      @include mobile {
        display: none;
      }
    }

    @include low-desktop {
      grid-template-columns: 140px 190px 190px auto;
    }
    @include tablet {
      grid-template-columns: 140px 190px 190px 210px;
    }
    @include mobile {
      padding: 0;
      display: block;
    }

    // .business-program-item__inner-item
    &-item {
      @include mobile {
        &:not(:last-child) {
          margin-bottom: 12px;
        }
      }

    }
  }

  // .business-program-item__time
  &__time {
    #{$b}:not(#{$b}--is-header) & {
      position: relative;
      padding-left: 20px;

      &::before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        width: 13px;
        height: 13px;
        display: block;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        background-image: url('data:image/svg+xml,<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="7" cy="7" r="6" stroke="%23003DFF" stroke-width="1.5" stroke-miterlimit="10"/><path d="M7 4.6665V7.33317L9 9.33317" stroke="%23003DFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/></svg>');
        pointer-events: none;
        touch-action: none;

        @include mobile {
          display: inline-block;
          position: static;
          margin-right: 10px;
        }
      }

      @include mobile {
        padding-left: 0;

        #{$b}__caption-mob {
          display: inline-block;
        }
      }
    }
  }

  // .business-program-item__address
  &__address {
    #{$b}:not(#{$b}--is-header) & {
      position: relative;
      padding-left: 20px;

      &::before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        width: 9px;
        height: 13px;
        display: block;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        background-image: url('data:image/svg+xml,<svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.03995 6.7C4.2409 6.7 3.5617 6.01429 3.5617 5.15714C3.5617 4.3 4.20095 3.61429 5.03995 3.61429C5.83901 3.61429 6.5182 4.3 6.5182 5.15714C6.5182 6.01429 5.83901 6.7 5.03995 6.7ZM7.83664 2.24286C7.07754 1.42857 6.07872 1 5 1C3.92128 1 2.92246 1.42857 2.16336 2.24286C0.765013 3.7 0.605202 6.48571 1.80378 8.15714L5 13L8.19622 8.15714C9.3948 6.44286 9.23499 3.7 7.83664 2.24286Z" stroke="%23003DFF" stroke-width="1.5" stroke-miterlimit="10"/></svg>');
        pointer-events: none;
        touch-action: none;

        @include mobile {
          display: inline-block;
          position: static;
          margin-right: 10px;
        }
      }

      @include mobile {
        padding-left: 0;

        #{$b}__caption-mob {
          display: inline-block;
        }
      }
    }
  }

  // .business-program-item__caption-mob
  &__caption-mob {
    color: rgba($black-true, 0.3);

    @include mobile-min {
      display: none;
    }
  }

  // .business-program-item__content
  &__content {
    display: block;
  }

  // .business-program-item__invisible
  &__invisible {
    opacity: 0;
    pointer-events: none;
    touch-action: none;

    @include mobile {
      display: none !important;
    }
  }
}
</style>

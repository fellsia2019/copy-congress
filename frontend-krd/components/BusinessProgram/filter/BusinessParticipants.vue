<template>
  <div class="business-participants">
    <div class="business-participants__inner">
      <div
        v-for="(col, index) in items"
        :key="`business-participants__col-${index}`"
        class="business-participants__col"
        :class="{'business-participants__col--is-hidden': col.isHidden === true}"
      >
        <div class="business-participants__title" v-html="col.group" />
        <div class="business-participants__items">
          <div
            v-for="item in col.items"
            :key="`business-participants__item-${item.id}`"
            class="business-participants__item"
            :class="{'business-participants__item--is-hidden': item.isHidden === true}"
          >
            <CustomCheckbox @input="checked => changeCheckbox(checked, item.id)">
              <span class="business-participants__item-name color-light-blue fw-500">{{ item.name }}</span>
            </CustomCheckbox>
          </div>
        </div>
      </div>
      <div v-show="isHiddenBlock" class="not-found">{{ notFoundCaption }}</div>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    items: {
      type: Array,
      default: () => []
    },
    notFoundCaption: {
      type: String,
      default: ''
    }
  },
  computed: {
    isHiddenBlock() {
      return this.items.filter(item => Object.hasOwn(item, 'isHidden') && item.isHidden === true).length === this.items.length
    }
  },
  methods: {
    changeCheckbox(checkbox, id) {
      this.$emit('change', checkbox, id)
    },
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.business-participants';

#{$b} {

  // .business-participants__inner
  &__inner {
    column-count: 5;
    column-gap: 44px;

    @include low-desktop {
      column-count: 4;
      column-gap: 32px;
    }
    @include tablet {
      column-count: 2;
    }
    @include mobile {
      column-count: unset;
      display: block;
    }
  }

  // .business-participants__title
  &__title {
    margin-bottom: 8px;
  }

  // .business-participants__col
  &__col {
    break-inside: avoid-column;

    // .business-participants__col--is-hidden
    &--is-hidden {
      display: none;
    }

    @include mobile {
      &:not(:last-child) {
        margin-bottom: 32px;
      }
    }
  }

  // .business-participants__item
  &__item {
    padding-bottom: 13px;

    // .business-participants__item--is-hidden
    &--is-hidden {
      display: none;
    }
  }
}
</style>

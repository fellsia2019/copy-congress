<template>
  <div class="business-themes">
    <div class="business-themes__inner">
      <div
        v-for="(col, i) in items"
        class="business-themes__col"
        :class="{'business-themes__col--is-hidden': col.isHidden === true}"
        :key="`business-themes-${i}`"
      >
        <!-- <div class="business-themes__col-title text-lg fw-500" v-html="col.title" /> -->
        <div class="business-themes__col-title text-lg fw-500">
          {{ captionLang[lang] }}
        </div>
        <div v-if="col.caption" class="business-themes__col-caption fw-500" v-html="col.caption" />
        <div class="business-themes__themes">
          <div
            v-for="theme in col.themes"
            :key="`business-themes__theme-${i}-${theme.id}`"
            class="business-themes__theme"
            :class="{'business-themes__theme--is-hidden': theme.isHidden === true}"
          >
            <CustomCheckbox @input="checked => changeCheckbox(checked, theme.id)">
              <span class="business-themes__theme-name color-light-blue fw-500">{{ theme.name }}</span>
              <span class="color-light-blue-2 fw-500">{{ theme.count }}</span>
            </CustomCheckbox>
          </div>
        </div>
      </div>
    </div>
    <div v-show="isHiddenBlock" class="not-found">{{ notFoundCaption }}</div>
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
    },
    lang: {
      type: String,
      default: 'ru'
    }
  },
  data() {
    return {
      captionLang: {
        ru: 'III Конгресс молодых ученых',
        en: 'III Young scientists congress'
      }
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

$b: '.business-themes';

#{$b} {

  // .business-themes__inner
  &__inner {
    // @include gridcols(4, 44px);
    // row-gap: 35px;

    // @include low-desktop {
    //   @include gridcols(3, 32px);
    //   row-gap: 32px;
    // }
    // @include tablet {
    //   @include gridcols(2, 24px);
    //   row-gap: 32px;
    // }
    // @include mobile {
    //   display: block;
    // }
  }

  // .business-themes__col
  &__col {

    // .business-themes__col--is-hidden
    &--is-hidden {
      display: none !important;
    }

    @include mobile {
      &:not(:last-child) {
        margin-bottom: 32px;
      }
    }

    // .business-themes__col-title
    &-title {
      line-height: 108%;
      margin-bottom: 25px;
      // min-height: 52px;

      @include tablet {
        min-height: unset;
      }
    }

    // .business-themes__col-caption
    &-caption {
      margin-bottom: 16px;
    }
  }

  // .business-themes__themes
  &__themes {
    @include gridcols(4, 44px);
    row-gap: 24px;

    @include low-desktop {
      @include gridcols(3, 32px);
      row-gap: 24px;
    }
    @include tablet {
      @include gridcols(2, 24px);
    }
    @include mobile {
      display: block;
    }
  }

  // .business-themes__theme
  &__theme {

    @include mobile {
      margin-bottom: 24px;
    }

    // .business-themes__theme--is-hidden
    &--is-hidden {
      display: none !important;
    }

    // &:not(:last-child) {
    //   margin-bottom: 13px;
    // }

    // .business-themes__theme-name
    &-name {
      margin-right: 12px;
    }
  }
}
</style>

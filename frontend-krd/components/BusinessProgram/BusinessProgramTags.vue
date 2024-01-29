<template>
  <div class="business-program-tags">
    <div class="business-program-tags__inner">
      <div
        v-for="(tag, i) in tags"
        :key="`business-program-tags__item-${i}`"
        class="business-program-tags__item"
      >
        <div class="business-program-tags__item-name" v-html="tag" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    tags: {
      type: Array,
      default: () => []
    },
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.business-program-tags';

#{$b} {

  // .business-program-tags__inner
  &__inner {
    display: flex;
    flex-wrap: wrap;
    margin: -3px;
  }

  // .business-program-tags__item
  &__item {
    padding: 3px;

    // .business-program-tags__item-name
    &-name {
      display: inline-flex;
      align-items: center;
      font-size: 12px;
      font-weight: 700;
      line-height: 1.4;
      text-align: center;
      text-transform: uppercase;
      border: 1px solid $black-true;
      border-radius: 12px;
      padding: 2px 7px;
    }
  }
}
</style>

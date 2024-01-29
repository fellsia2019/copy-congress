<template>
  <div class="events-filter">
    <div class="events-filter__bottom">
      <ul class="events-filter__month-list">
        <li v-for="(item, key, i) in monthFilters" :key="key">
          <div
            class="events-filter__month-item"
            :class="{ 'is-active': item.isActive }"
            @click.prevent="toggleMonthFilter(item, key)"
          >
            <span>{{ item.name }}</span>
            <inline-svg v-if="item.isActive && i > 0" src="close"/>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import InlineSvg from './InlineSvg.vue';

export default {
  name: 'EventsFilter',
  components: { InlineSvg },
  props: {
    initialMonthFilters: {
      type: Object,
      default: () => {},
    }
  },
  data() {
    return {
      monthFilters: this.initialMonthFilters,
    };
  },
  methods: {
    toggleMonthFilter({ isActive }, key) {
      const setToAll = isActive && key !== 'all';
      this.monthFilters = Object.values(this.monthFilters).reduce((acc, item) => {
        const { filter } = item;
        acc[filter] = { ...item, isActive: setToAll ? filter === 'all' : filter === key };
        return acc;
      }, {});
      this.$emit('change', setToAll ? 'all' : key);
    },
  },
};
</script>

<style lang="scss">
@import "../scss/base/includes";

$b: '.events-filter';

#{$b} {
  display: block;
  position: relative;
  z-index: 2;

  &__month-list {
    position: relative;
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
    flex-wrap: wrap;

    @include low-desktop {
      max-width: 650px;
    }

    &>li {
      font-weight: 700;
      font-size: 12px;
      line-height: 20px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-bottom: 12px;

      @include mobile {
        font-size: 10px;
        margin-bottom: 5px;
      }

      &:not(:last-child) {
        margin-right: 32px;

        @include mobile {
          margin-right: 16px;
        }
      }
    }
    &:not(._without-first) {
      &>li {
        &:first-child {
          margin-right: 0;
          display: flex;
          align-items: center;

          &::after {
            content: "/";
            color: #c7c7c7;
            margin: 0 32px;

            @include mobile {
              margin: 0 16px;
            }
          }
        }
      }
    }
  }

  &__month-item {
    cursor: pointer;
    user-select: none;
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 30px;
    color: $color-black;
    border-radius: 30px;
    transition: .2s ease;
    transition-property: color, background-color, padding;

    @include mobile {
      height: 24px;
    }

    &.is-active {
      padding: 0 10px;
      background-color: $bg-brand;
      color: $white-true;

      @include mobile {
        padding: 0 8px;
      }
    }

    .inline-svg {
      width: 9px;
      margin: 0 0 0 6px;
    }
  }
}
</style>

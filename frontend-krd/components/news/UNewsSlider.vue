<template>
  <div class="u-news-slider" :class="sliderStyle">
    <div class="u-news-slider__header">
      <h2 class="u-news-slider__title tt-uppercase title-2lg" v-html="initialNewsTitle" />
      <div class="u-news-slider__controls-swiper">
        <div class="u-swiper-controls u-swiper-controls--primary">
          <button class="u-swiper-controls__btn u-swiper-controls__btn--primary u-swiper-controls__btn--prev" :class="`u-news-slider__prev-${this._uid}`"/>
          <div class="u-swiper-controls__count u-swiper-controls__count--primary" :class="`u-news-slider__controls-${this._uid}`"/>
          <button class="u-swiper-controls__btn u-swiper-controls__btn--primary u-swiper-controls__btn--next" :class="`u-news-slider__next-${this._uid}`"/>
        </div>
      </div>
    </div>
    <div class="u-news-slider__body">
      <swiper
        v-if="isUpdatedSwiper"
        ref="newsSwiper"
        class="u-news-slider__swiper"
        :options="swiperOptions"
      >
        <swiper-slide
          v-for="(item, index) in getNewsItems"
          :key="`${keyLabel}${item.id}`"
          class="u-news-slider__swiper-item"
        >
          <slot :cardData="item" :id="index" :callParentClickHandler="callParentClickHandler">
            <UNewsCard
              class="u-news-slider__news-card"
              :cardData="item"
            />
          </slot>
        </swiper-slide>
      </swiper>
      <div class="u-news-slider__mob-pagination">
        <div class="u-swiper-pagination" :class="`u-news-slider__pagination-${this._uid}`"></div>
      </div>
    </div>
    <div
      v-if="showMore"
      class="u-news-slider__footer"
    >
      <!-- eslint-disable -->
      <CustomButton
        v-html="btnText"
        theme="primary"
        size="md"
        tag="a"
        :href="allNewsLink"
        :target="btnTarget"
      />
      <!-- eslint-enable -->
    </div>
  </div>
</template>

<script>

export default {
  props: {
    initialNewsItems: { type: Array, default: () => [] },
    initialNewsTitle: { type: String, default: '' },
    sliderStyle: { type: String, default: '' },
    showMore: { type: Boolean, default: true },
    allNewsLink: { type: String, default: '/news/' },
    btnText: { type: String, default: 'Показать ещё' },
    keyLabel: { type: String, default: 'u-news-slider__swiper-item-' },
    btnTarget: { type: String, default: '' },
  },
  data() {
    return {
      isUpdatedSwiper: true,
      paginationEl: `.u-news-slider__controls-${this._uid}`,
      newsItems: JSON.parse(JSON.stringify(this.initialNewsItems)),
    }
  },
   computed: {
    swiper() {
      return this.$refs.newsSwiper.$swiper;
    },
    swiperOptions() {
      return {
        slidesPerView: 1.17,
        spaceBetween: 16,
        navigation: {
          prevEl: `.u-news-slider__prev-${this._uid}`,
          nextEl: `.u-news-slider__next-${this._uid}`,
          disabledClass: "u-swiper-controls__btn--is-disabled"
        },
        pagination: {
          el: this.paginationEl,
          type: "bullets",
          bulletClass: "u-swiper-pagination__bullet",
          bulletActiveClass: "u-swiper-pagination__bullet--is-active",
          clickable: true
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
            pagination: {
              el: this.paginationEl,
              type: "fraction"
            },
          },
          1280: {
            slidesPerView: 3,
            pagination: {
              el: this.paginationEl,
              type: "fraction"
            },
          }
        },
        windowWidth: null,
      }
    },
    getNewsItems() {
      return this.newsItems.map(news => ({...news, target: this.btnTarget}))
    }
  },
  methods: {
    updateSwiper() {
      if (!this.windowWidth || this.windowWidth !== window.innerWidth) {
        this.windowWidth = window.innerWidth

        this.isUpdatedSwiper = false
        this.setPaginationEl();
        this.$nextTick(() => {
          this.isUpdatedSwiper = true
        });
      }
    },
    setPaginationEl() {
      if (window.innerWidth > 767) {
        this.paginationEl = `.u-news-slider__controls-${this._uid}`
      } else {
        this.paginationEl = `.u-news-slider__pagination-${this._uid}`
      }
    },
    callParentClickHandler(id) {
      this.$emit('button-click', id);
    }
  },
  mounted() {
    this.isUpdatedSwiper = false;
    window.addEventListener('resize', this.updateSwiper);
    this.updateSwiper();
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.updateSwiper);
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/u-includes';

$b: ".u-news-slider";

#{$b} {
  #{$b}__news-card {
    max-width: none;
    height: 100%;
  }

  .swiper-wrapper {
    @include mobile-min {
      padding: 10px 0;
    }
  }
  .swiper-container {
    padding-left: 15px;
    padding-right: 15px;
    margin-left: -15px;
    margin-right: -15px;
  }

  .swiper-slide {
    height: auto !important;
  }

  // .u-news-slider__header
  &__header {
    margin-bottom: 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;

    @include mobile {
      display: block;
      margin-bottom: 16px;
    }
  }

  // .u-news-slider__title
  &__title {
    font-family: $font-family-fugue;
    margin: 0 20px 0 0;

    @include mobile {
      margin: 0;
    }
  }

  // .u-news-slider__controls-swiper
  &__controls-swiper {
    @include mobile {
      display: none;
    }
  }

  // .u-news-slider__swiper-item
  &__swiper-item {
    height: auto;
    position: relative;
    border-radius: 16px;
  }

  // .u-news-slider__body
  &__body {
    margin-bottom: 32px;

    @include mobile {
      margin-bottom: 24px;
      margin-right: -$container-pd-right-mobile;
    }
  }

  // .u-news-slider__mob-pagination
  &__mob-pagination {
    display: flex;
    justify-content: center;
    margin-top: 24px;

    @include mobile-min {
      display: none;
    }
  }

  // .u-news-slider__footer
  &__footer {
    @include mobile {
      text-align: center;
    }
  }

  &._simple {

    @include tablet-min {
      .u-news-card {
        --bg-color: white;
      }
    }

    @include tablet-min {
      .u-news-card__main {
        color: $black-true;
      }
    }

    @include tablet-min {
      .custom-button--theme-outline-light {
        color: $black-true;
        border-color: $black-true;

        &:hover {
          color: $white-true;
          border-color: $white-true;
          background-color: $color-base-origin;
        }
      }
    }
  }
}
</style>

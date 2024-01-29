<template>
  <div class="responsive-slider" :class="[{ 'is-slider': isSlider }]">
    <template v-if="isSlider">
      <swiper ref="slider" :options="swiperOptions">
        <slot />
      </swiper>
    </template>
    <template v-else>
      <slot />
    </template>
    <template v-if="isSlider && isPagination">
      <div :class="`slider-${this.id}__bullets`"></div>
    </template>
  </div>
</template>

<script>
export default {
  name: "ResponsiveSlider",
  inject: ["breakpoint"],
  props: {
    id: {
      type: String,
      default: "0",
    },
    items: {
      type: Object,
      default: () => ({
        desktop: 4,
        low: 3,
        tablet: 2.4,
        mobile: 1.2,
      }),
    },
    theme: {
      type: String,
      default: "dark",
    },
    isLoop: {
      type: Boolean,
      default: false,
    },
    initOn: {
      type: String,
      default: "desktop",
    },
    isPagination: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      swiperOptions: {
        slidesPerView: this.items.mobile,
        loop: this.isLoop,
        // allowTouchMove: false,
        watchOverflow: true,
        watchSlidesVisibility: true,
        spaceBetween: 16,
        navigation: {
          prevEl: `.slider-${this.id}__prev`,
          nextEl: `.slider-${this.id}__next`,
          disabledClass: "is-disabled",
        },
        pagination: {
          el: `.slider-${this.id}__bullets`,
          type: "bullets",
          bulletClass: "slider__bullet",
          bulletActiveClass: "slider__bullet_active",
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: this.items.tablet,
            spaceBetween: 24,
          },
          1024: {
            slidesPerView: this.items.low,
          },
          1280: {
            slidesPerView: this.items.desktop,
          },
        },
      },
    };
  },
  computed: {
    isSlider() {
      return (
        (this.initOn === "desktop" && this.breakpoint.isDesktop) ||
        (this.initOn === "low" && this.breakpoint.isLow) ||
        (this.initOn === "tablet" && this.breakpoint.isTablet) ||
        (this.initOn === "mobile" && this.breakpoint.isMobile)
      );
    },
  },
};
</script>

<style lang="scss">
@use "sass:math";
@import "../scss/base/includes";

$b: ".responsive-slider";

#{$b} {
  &:not(.is-slider) {
    display: flex;
    flex-wrap: wrap;
    margin: 0 0 -32px -24px;

    .swiper-slide,
    swiper-slide {
      width: math.div(100%, 5);
      padding: 0 0 32px 24px;
    }
  }

  .swiper-container {
    overflow: visible;
  }

  .swiper-slide {
    height: auto;
  }

  .swiper-pagination-bullets{
    display: flex;
    justify-content: center;
    margin-top: 24px;
  }

  .slider__bullet {
    min-width: 3px;
    min-height: 3px;
    background-color: $text-brand;
  }
}
</style>

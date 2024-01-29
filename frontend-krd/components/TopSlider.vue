<template>
  <section class="slider top-slider">
    <swiper ref="Swiper" :options="swiperOptions">
      <slot />
    </swiper>
    <div class="slider__controls" :class="{'g-hidden': slidesCount < 2}">
      <div class="button button_transparent button_square slider__prev top-slider__prev">
        <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7 12L1.5 6.5L7 1" stroke="white" stroke-width="1.5"/>
          <path d="M2 6.5L22 6.5" stroke="white" stroke-width="1.5"/>
        </svg>
      </div>
      <div class="button button_transparent button_square slider__next top-slider__next">
        <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 1L20.5 6.5L15 12" stroke="white" stroke-width="1.5"/>
          <path d="M20 6.5H0" stroke="white" stroke-width="1.5"/>
        </svg>
      </div>
      <div class="slider__count top-slider__count"></div>
    </div>
    <div
      :class="['slider__bullets', 'top-slider__bullets', {'slider__bullets_hidden': slidesCount < 2}]"
    ></div>
  </section>
</template>

<script>
export default {
  name: "TopSlider",
  data() {
    return {
      slidesCount: 0,
      swiperOptions: {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 26,
        effect: "fade",
        allowTouchMove: false,
        fadeEffect: {
          crossFade: true
        },
        watchOverflow: true,
        navigation: {
          prevEl: ".top-slider__prev",
          nextEl: ".top-slider__next",
          disabledClass: "is-disabled"
        },
        pagination: {
          el: ".top-slider__bullets",
          type: "bullets",
          bulletClass: "slider__bullet",
          bulletActiveClass: "slider__bullet_active",
          clickable: true
        },
        breakpoints: {
          768: {
            spaceBetween: 0,
            pagination: {
              el: ".top-slider__count",
              type: "fraction"
            }
          }
        }
      }
    };
  },
  computed: {
    swiper() {
      return this.$refs.Swiper.$swiper;
    }
  },
  mounted() {
    this.slidesCount = this.$refs.Swiper.$children.length;
  }
};
</script>


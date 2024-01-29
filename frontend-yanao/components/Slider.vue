<template>
  <section
    class="slider"
    :class="[
      `slider-${id}`,
      { 'slider_is-full': isFull },
      { 'slider_multiple': isMultiple },
      { 'slider_dark': theme == 'dark' },
    ]"
  >
    <swiper ref="Swiper" :options="swiperOptions">
      <slot />
    </swiper>
    <div class="slider__controls" :class="{ 'g-hidden': isFull }">
      <div class="slider__count" :class="`slider-${id}__count`" slot="pagination"></div>
      <div
        class="button button_square slider__prev"
        :class="[
          `slider-${id}__prev`,
          { 'button_transparent-dark': theme == 'dark' },
          { 'button_transparent': theme == 'light' }
        ]"
        slot="button-prev"
      >
        <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7 12L1.5 6.5L7 1" stroke="white" stroke-width="1.5"/>
          <path d="M2 6.5L22 6.5" stroke="white" stroke-width="1.5"/>
        </svg>
      </div>
      <div
        class="button button_square slider__next"
        :class="[
          `slider-${id}__next`,
          { 'button_transparent-dark': theme == 'dark' },
          { 'button_transparent': theme == 'light' }
        ]"
        slot="button-prev"
      >
        <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 1L20.5 6.5L15 12" stroke="white" stroke-width="1.5"/>
          <path d="M20 6.5H0" stroke="white" stroke-width="1.5"/>
        </svg>
      </div>
    </div>
    <div
      class="slider__bullets"
      :class="[`slider-${id}__bullets`, { 'g-hidden': isFull }]"
    />
  </section>
</template>

<script>
export default {
  name: "Slider",
  props: {
    id: {
      type: String,
      default: '0',
    },
    items: {
      type: Number,
      default: 4,
    },
    theme: {
      type: String,
      default: 'light',
    },
    isLoop: {
      type: Boolean,
      default: false
    },
    isMultiple: {
      type: Boolean,
      default: false
    },
    updateNavigation: {
      type: Boolean,
      default: false
    },
  },
  data() {
    return {
      slidesCount: 0,
      openModal: false,
      swiperOptions: {
        slidesPerView: 1.2,
        loop: this.isLoop,
        loopAdditionalSlides: 2,
        // allowTouchMove: false,
        watchOverflow: true,
        watchSlidesVisibility: true,
        spaceBetween: 24,
        navigation: {
          prevEl: `.slider-${this.id}__prev`,
          nextEl: `.slider-${this.id}__next`,
          disabledClass: "is-disabled"
        },
        pagination: {
          el: `.slider-${this.id}__bullets`,
          type: "bullets",
          bulletClass: "slider__bullet",
          bulletActiveClass: "slider__bullet_active",
          clickable: true
        },
        breakpoints: {
          350: {
            slidesPerView: 1.5,
          },
          500: {
            slidesPerView: 2.2,
          },
          768: {
            slidesPerView: 2.4,
            spaceBetween: 32,
            pagination: {
              el: `.slider-${this.id}__count`,
              type: "fraction"
            },
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 32,
            pagination: {
              el: `.slider-${this.id}__count`,
              type: "fraction"
            },
          },
          1280: {
            slidesPerView: this.items,
            spaceBetween: 32,
            pagination: {
              el: `.slider-${this.id}__count`,
              type: "fraction"
            },
          },
        }
      }
    };
  },
  watch: {
    updateNavigation(oldVal, newVal) {
      setTimeout(() => {
        oldVal !== newVal ? this.swiper.navigation.update() : '';
        this.swiper.slides.length > 2 ? this.swiper.pagination.render() : '';
      }, 0);
    }
  },
  computed: {
    swiper() {
      return this.$refs.Swiper.$swiper;
    },
    isFull() {
      const visibleSlides = this.$refs.Swiper && this.swiper.visibleSlides
        ? this.swiper.visibleSlides.length
        : this.items;

      return this.slidesCount === visibleSlides;
    }
  },
  mounted() {
    this.slidesCount = this.$refs.Swiper.$children.length;
    setTimeout(() => {
      this.swiper.navigation.update();
    }, 0);
  },
};
</script>


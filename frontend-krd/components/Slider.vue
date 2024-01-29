<template>
  <section
    v-if="isUpdatedSwiper"
    class="slider"
    :class="[
      `slider-${id}${_uid}`,
      { 'slider_is-full': isFull },
      { 'slider_multiple': isMultiple },
      { 'slider_dark': theme == 'dark' },
    ]"
  >
    <swiper v-if="isDesktopDisabled && !isDesktop" ref="Swiper" :options="swiperOptions">
      <slot />
    </swiper>
    <div v-else class="disabled-slider-content">
      <slot/>
    </div>
    <div v-show="isVisibleControls" class="slider__controls" :class="{ 'g-hidden': isFull}">
      <div
        class="slider__prev"
        :class="[`slider-${id}${_uid}__prev`]"
        slot="button-prev"
      >
        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.5 1L2 7.5L8.5 14" stroke="white" stroke-width="2"/>
        </svg>
      </div>
      <div class="slider__count" :class="`slider-${id}${_uid}__count`" slot="pagination"></div>
      <div
        class="slider__next"
        :class="[`slider-${id}${_uid}__next`]"
        slot="button-prev"
      >
        <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 1L7.5 7.5L1 14" stroke="white"  stroke-width="2"/>
        </svg>
      </div>
    </div>
    <div
      class="slider__bullets"
      :class="[`slider-${id}${_uid}__bullets`, { 'g-hidden': isFull }]"
    />
  </section>
</template>

<script>
export default {
  inject: ['breakpoint'],
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
    isDesktopDisabled: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      isUpdatedSwiper: true,
      paginationEl: `.slider-${this.id}${this._uid}__bullets`,
      slidesCount: 0,
      openModal: false,
      isDesktop: false,
      swiper: null
    };
  },
  watch: {
    updateNavigation(oldVal, newVal) {
      setTimeout(() => {
        oldVal !== newVal ? this.swiper.navigation.update() : '';
        this.swiper.slides.length > 2 ? this.swiper.pagination.render() : '';
      }, 0);
    },
  },
  computed: {
    isFull() {
      return this.swiper ? this.swiper.slidesPerView <= this.slidesCount : false
    },
    swiperOptions() {
      return {
        centeredSlides: true,
        slidesPerView: 1.2,
        loop: this.isLoop,
        loopAdditionalSlides: 2,
        // allowTouchMove: false,
        watchOverflow: true,
        watchSlidesVisibility: true,
        spaceBetween: 24,
        navigation: {
          prevEl: `.slider-${this.id}${this._uid}__prev`,
          nextEl: `.slider-${this.id}${this._uid}__next`,
          disabledClass: "is-disabled"
        },
        pagination: {
          el: this.paginationEl,
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
            centeredSlides: false,
            slidesPerView: 2.4,
            spaceBetween: 32,
            pagination: {
              el: this.paginationEl,
              type: "fraction"
            },
          },
          1024: {
            enabled: false
          }
        }
      }
    },
    isVisibleControls() {
      return this.isDesktopDisabled && !this.isDesktop && (!this.breakpoint.isMobile && this.slidesCount > 2)
    }
  },
  methods: {
    updateSwiper() {
      if (window.innerWidth > 1023 && this.isDesktopDisabled) return;

      this.isUpdatedSwiper = false;
      this.setPaginationEl();
      this.$nextTick(() => {
        this.isUpdatedSwiper= true
      });
    },

    setPaginationEl() {
      if(window.innerWidth > 767)
        this.paginationEl = `.slider-${this.id}${this._uid}__count`
      else this.paginationEl = `.slider-${this.id}${this._uid}__bullets`
    },

    sliderViewController() {
      if (window.innerWidth > 1023) {
        this.isDesktop = true;
      } else {
        this.isDesktop = false;
        this.updateSwiper();
      }
    },

    setSwiper() {
      this.swiper = this.$refs.Swiper ? this.$refs.Swiper.$swiper : null;
    }
  },

  mounted() {
    this.$nextTick(() => {

      if(this.isDesktopDisabled) {
        window.addEventListener('resize', this.sliderViewController);
        this.sliderViewController();
      }

      this.setSwiper()
      this.slidesCount = this.$refs.Swiper ? this.$refs.Swiper.$children.length : 0;

      if (!this.isDesktop && this.swiper && this.swiper.navigation) {
        this.swiper.navigation.update();
      }

      window.addEventListener('resize', this.updateSwiper);
      this.updateSwiper();
    })
  },

  beforeDestroy() {
    window.removeEventListener('resize', this.updateSwiper);
    window.removeEventListener('resize', this.sliderViewController);
  },

};
</script>


<style lang="scss">
@import '../scss/base/includes';

.disabled-slider-content {
  grid-template-columns: repeat(4,1fr);
  display: grid;
  gap: 16px;
}

</style>


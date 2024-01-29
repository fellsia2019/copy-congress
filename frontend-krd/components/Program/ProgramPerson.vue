<template>
  <div class="program-person">
    <div class="program-person__head">
      <div v-if="title" class="program-person__title" v-html="title" />
      <div v-show="isReady && !isLocked" class="program-person__controls">
        <div
          :class="`program-person-${_uid}-prev slider__prev`"
          slot="button-prev"
        >
          <svg
            width="10"
            height="15"
            viewBox="0 0 10 15"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M8.5 1L2 7.5L8.5 14" stroke="white" stroke-width="2" />
          </svg>
        </div>
        <div
          class="slider__count"
          :class="`program-person-${_uid}-count`"
          slot="pagination"
        ></div>
        <div
          :class="`program-person-${_uid}-next slider__next`"
          slot="button-prev"
        >
          <svg
            width="9"
            height="15"
            viewBox="0 0 9 15"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M1 1L7.5 7.5L1 14" stroke="white" stroke-width="2" />
          </svg>
        </div>
      </div>
    </div>
    <div class="program-person__items">
      <swiper ref="slider" :options="options" :scrollbar="{ draggable: false }">
        <swiper-slide
          v-for="(person, i) in persons"
          :key="`program_person_${i}`"
        >
          <div class="program-person__card">
            <div class="program-person__img">
              <img :src="person.img" :alt="person.name" />
            </div>
            <div class="program-person__info">
              <div class="program-person__name" v-html="person.name"></div>
              <div
                class="program-person__position"
                v-html="person.positions"
              ></div>
              <div class="program-person__btn" @click="openModalWindow(person)">Биография</div>
            </div>
          </div>
        </swiper-slide>
      </swiper>
    </div>
    <div
      v-show="isReady && !isLocked"
      :class="`program-person-${_uid}-bullets slider__bullets slider__bullets_dark`"
    />
  </div>
</template>

<script>
export default {
  name: "ProgramPerson",
  props: {
    title: { type: String, default: "" },
    persons: { type: Array, default: () => [] },
  },
  data() {
    return {
      isMounted: false,
      options: {
        slidesPerView: 1.2,
        spaceBetween: 16,
        navigation: {
          prevEl: `.program-person-${this._uid}-prev`,
          nextEl: `.program-person-${this._uid}-next`,
          disabledClass: "is-disabled",
        },
        pagination: {
          el: `.program-person-${this._uid}-bullets`,
          type: "bullets",
          bulletClass: "slider__bullet",
          bulletActiveClass: "slider__bullet_active",
          clickable: true,
        },
        breakpoints: {
          768: {
            pagination: {
              el: `.program-person-${this._uid}-count`,
              type: "fraction",
            },
          },
          1024: {
            slidesPerView: 2,
            spaceBetween: 32,
            pagination: {
              el: `.program-person-${this._uid}-count`,
              type: "fraction",
            },
          },
        },
      },
    };
  },
  computed: {
    swiper() {
      return this.isMounted ? this.$refs.slider.$swiper : null;
    },
    isReady() {
      return Boolean(this.swiper);
    },
    isLocked() {
      return this.isReady && this.swiper.isBeginning && this.swiper.isEnd;
    },
  },
  methods: {
    openModalWindow(person) {
      this.$root.$emit('openPersonModal', person.name, person.img, person.positions, person.text);
      this.$root.$emit('modalOpen', String(Date.parse(new Date())));
    }
  },
  mounted() {
    this.isMounted = true;
  },
};
</script>

<template>
  <div class="business-program-filter" :class="{'business-program-filter--is-fixed': isFixed}" :style="getRootStyle">
    <div class="business-program-filter__inner" ref="filterInner" :style="getInnerStyle">
      <div class="business-program-filter__top">
        <div class="business-program-filter__trigers business-program-filter__top-item">
          <div class="business-program-filter__triger" @click="showParticipantsModal">
            <inline-svg src="filter-icon" class="business-program-filter__triger-icon" />
            <span class="business-program-filter__triger-name">{{ btnParticipantLang[lang] }}</span>
            <span v-if="filter.participants.length" class="business-program-filter__triger-count">{{ filter.participants.length }}</span>
          </div>
          <div class="business-program-filter__triger" @click="showThemesModal">
            <inline-svg src="filter-icon" class="business-program-filter__triger-icon" />
            <span class="business-program-filter__triger-name">{{ btnThemeLang[lang] }}</span>
            <span v-if="filter.themes.length" class="business-program-filter__triger-count">{{ filter.themes.length }}</span>
          </div>
        </div>
        <div class="business-program-filter__search business-program-filter__top-item">
          <inline-svg src="search" class="business-program-filter__search-icon"/>
          <input
            v-model="filter.search"
            type="text"
            class="business-program-filter__search-input"
            :placeholder="inputSearchPlaceholdersLang[lang]"
            @input="changeFilter"
          >
        </div>
      </div>
      <div class="business-program-filter__bottom">
        <div class="business-program-filter__days">
          <div
            v-for="day in filterDays"
            :key="`business-program-filter__day-${day.id}`"
            class="business-program-filter__day"
            :class="{'business-program-filter__day--is-active': day.date === filter.day}"
            @click="selectDay(day)"
          >
            {{ day.name }}
          </div>
        </div>
      </div>
    </div>
    <BusinessThemesModal
      :notFoundCaption="notFoundCaption"
      :lang="lang"
      :isVisible="isVisibleThemesModal"
      :initialFilterThemes="filterThemes"
      @change="changeThemes"
      @close="isVisibleThemesModal = false"
      @accept="onAcceptThemes"
    >
    </BusinessThemesModal>
    <BusinessParticipantsModal
      :notFoundCaption="notFoundCaption"
      :lang="lang"
      :isVisible="isVisibleParticipantsModal"
      :initialFilterParticipants="filterParticipants"
      @change="changeParticipants"
      @close="isVisibleParticipantsModal = false"
      @accept="onAcceptParticipants"
    >
    </BusinessParticipantsModal>
  </div>
</template>

<script>
const DEFAULT_FILTER = {
  participants: [],
  themes: [],
  search: '',
  day: '',
}
export default {
  props: {
    filterDays: {
      type: Array,
      default: () => []
    },
    filterParticipants: {
      type: Array,
      default: () => []
    },
    filterThemes: {
      type: Array,
      default: () => []
    },
    lang: {
      type: String,
      default: 'ru'
    },
    notFoundCaption: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      filter: DEFAULT_FILTER,
      isVisibleThemesModal: false,
      isVisibleParticipantsModal: false,
      inputSearchPlaceholdersLang: {
        ru: 'Введите название или описание мероприятия',
        en: 'Enter the name or description of the event'
      },
      btnParticipantLang: {
        ru: 'Участники',
        en: 'Participants'
      },
      btnThemeLang: {
        ru: 'Темы',
        en: 'Themes'
      },
      isFixed: false,
      filterHeight: 0,
      innerWidth: 0,
    }
  },
  computed: {
    getRootStyle() {
      return {
        height: this.filterHeight ? `${this.filterHeight}px` : '',
      }
    },
    getInnerStyle() {
      return {
        width: this.isFixed && this.innerWidth ? `${this.innerWidth}px` : ''
      }
    }
  },
  methods: {
    selectDay(day) {
      this.filter.day = day.date

      this.changeFilter()
    },
    changeFilter() {
      this.$emit('filter', this.filter)
    },
    showThemesModal() {
      this.isVisibleThemesModal = true
    },
    showParticipantsModal() {
      this.isVisibleParticipantsModal = true
    },
    changeThemes(themes) {
      this.filter.themes = themes
    },
    changeParticipants(participants) {
      this.filter.participants = participants
    },
    onAcceptThemes() {
      this.isVisibleThemesModal = false
      this.changeFilter()
    },
    onAcceptParticipants() {
      this.isVisibleParticipantsModal = false
      this.changeFilter()
    },
    setDefaultFilterDay() {
      this.filter.day = this.filterDays?.length && this.filterDays[0].date
    },
    checkScroll() {
      const rootRect = this.$el.getBoundingClientRect()
      const innerRect = this.$refs.filterInner.getBoundingClientRect()
      this.filterHeight = innerRect.height
      this.innerWidth = rootRect.width
      this.isFixed = rootRect.top <= 0
    }
  },
  created() {
    this.setDefaultFilterDay()
  },
  mounted() {
    this.checkScroll()
    document.addEventListener('scroll', this.checkScroll)
  },
  beforeDestroy() {
    document.removeEventListener('scroll', this.checkScroll)
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.business-program-filter';

#{$b} {
  width: 100%;

  // .business-program-filter__inner
  &__inner {
    padding: 22px 0 28px 0;
    transition: all 0.3s ease;
    z-index: 2;

    &::after {
      content: '';
      position: absolute;
      top: 0;
      left: -50vw;
      width: 200vw;
      height: 100%;
      background-color: $white-true;
      display: none;
      opacity: 0;
      transition: all 0.3s ease;
      pointer-events: none;
      touch-action: none;
      z-index: -1;
    }

    #{$b}--is-fixed & {
      position: fixed;
      top: 0;

      &::after {
        display: block;
        opacity: 1;
      }
    }

    @include mobile {
      padding: 16px 0;
    }
  }

  // .business-program-filter__top
  &__top {
    width: 100%;
    display: flex;
    align-items: center;

    @include tablet {
      display: block;
    }

    &:not(:last-child) {
      margin-bottom: 34px;

      @include tablet {
        margin-bottom: 24px;
      }

      @include mobile {
        margin-bottom: 16px;
      }
    }

    // ..business-program-filter__top-item
    &-item {
      height: 60px;

      &:not(:last-child) {
        @include tablet {
          margin-bottom: 24px;
        }

        @include mobile {
          margin-bottom: 16px;
        }
      }

      @include tablet {
        height: 40px;
      }

      @include mobile {
        height: 32px;
      }
    }
  }

  // .business-program-filter__trigers
  &__trigers {
    display: inline-flex;
    align-items: center;

    &:not(:last-child) {
      margin-right: 17px;
    }

    @include mobile {
      width: 100%;
    }
  }

  // .business-program-filter__triger
  &__triger {
    position: relative;
    height: 100%;
    display: inline-flex;
    align-items: center;
    padding: 5px 74px 5px 20px;
    background-color: $bg-brand-3;
    color: $white-true;
    transition: all 0.3s ease;
    cursor: pointer;

    &:hover {
      background-color: rgba($bg-brand, 0.7);
    }

    &:not(:last-child) {
      margin-right: 1px;
    }

    &:first-child {
      border-top-left-radius: 60px;
      border-bottom-left-radius: 60px;
    }
    &:last-child {
      border-top-right-radius: 60px;
      border-bottom-right-radius: 60px;
    }

    @include mobile {
      justify-content: center;
      text-align: center;
      padding: 5px;
      width: 50%;
    }

    // .business-program-filter__triger-count
    &-count {
      position: absolute;
      right: 0;
      top: 0;
      transform: translateY(-50%);
      width: 36px;
      height: 36px;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      border-radius: 50%;
      background-color: $white-true;
      box-shadow: inset 0px 0px 1px 1px $bg-brand;
      color: $bg-brand;

      @include mobile {
        width: 25px;
        height: 25px;
        font-size: 12px;
      }
    }

    // .business-program-filter__triger-icon
    &-icon {
      margin-right: 4px;
      width: 26px;
      height: 33px;

      svg {
        width: 100%;
        height: 100%;
      }
    }
  }

  // .business-program-filter__search
  &__search {
    width: 100%;
    position: relative;

    // .business-program-filter__search-icon
    &-icon {
      width: 17px;
      height: 17px;
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);

      svg {
        width: 100%;
        height: 100%;
      }

      @include mobile {
        left: 15px;
      }
    }

    // .business-program-filter__search-input
    &-input {
      height: 100%;
      width: 100%;
      padding: 5px 16px 5px 51px;
      background-color: $white-true;
      border-radius: 61px;
      border: 1px solid $white-true;
      transition: all 0.3s ease;

      #{$b}--is-fixed & {
        border-color: rgba($black-true, 0.2);
      }

      &:hover,
      &:focus {
        border-color: $bg-brand;
      }

      @include mobile {
        padding-left: 40px;
      }
    }
  }

  // .business-program-filter__days
  &__days {
    display: inline-flex;
    align-items: center;

    @include mobile {
      width: 100%;
      overflow-x: auto;
      overflow-y: hidden;

      padding: 0 24px;
      width: calc(100% + 48px);
      margin-left: -24px;
    }
  }

  // .business-program-filter__day
  &__day {
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid $bg-brand;
    background-color: transparent;
    transition: all 0.3s ease;
    color: $bg-brand;
    cursor: pointer;
    padding: 5px 20px;
    white-space: nowrap;

    &:not(:last-child) {
      border-right: none;
    }
    &:first-child {
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }
    &:last-child {
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
    }

    @include mobile {
      height: 32px;
      font-size: 12px;
      padding: 5px;
    }

    // .business-program-filter__day--is-active
    &--is-active {
      background-color: $bg-brand-3 !important;
      border-color: $bg-brand-3 !important;
      color: $white-true !important;
      pointer-events: none;
      touch-action: none;
    }

    &:hover {
      background-color: rgba($bg-brand, 0.1);
    }

    @include mobile {
      padding: 5px 10px;
      flex: 1;
    }
  }
}
</style>

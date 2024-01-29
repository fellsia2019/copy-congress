<template>
  <div v-if="isVisible" class="business-program-modal" :class="{'business-program-modal--is-visible': isAnimateVisible}" @mousedown.self="close">
    <div class="business-program-modal__close" @click="close">
      <InlineSvg class="business-program-modal__close-icon" src="close" />
    </div>
    <div class="business-program-modal__inner">
      <div class="business-program-modal__header">
        <BusinessProgramTags v-if="program.tags && program.tags.length" class="business-program-modal__tags" :tags="program.tags" />
        <div class="business-program-modal__title title-2md" v-html="program.title" />
        <div v-if="program.timeStr || program.address" class="business-program-modal__line">
          <div class="business-program-modal__time business-program-modal__line-item">
            {{ program.timeStr }}
          </div>
          <div class="business-program-modal__address business-program-modal__line-item">
            {{ program.address }}
          </div>
        </div>
        <div v-if="program.partner" class="business-program-modal__partners">
          <div class="business-program-modal__partners-caption business-program-modal__partners-item">
            {{ getPartnerCaption }}
          </div>
          <div class="business-program-modal__partners-name business-program-modal__partners-item">
            {{ program.partner }}
          </div>
        </div>
      </div>
      <div v-if="tabContentExists" class="business-program-modal__body">
        <div class="business-program-modal__tabs">
          <Tabs theme="primary">
            <Tab v-if="program.description" selected :title="getTabTitle.announcement">
              <template #content>
                <div v-html="program.description" class="text-lg business-program-modal__tabs-description" />
              </template>
            </Tab>
            <Tab v-if="program.persons.length" :selected="!program.description" :title="getTabTitle.persons">
              <template #content>
                <div class="business-program-modal__persons">
                  <div
                    v-for="(persons, index) in program.persons"
                    :key="`business-program-modal__persons-block-${index}`"
                    class="business-program-modal__persons-block"
                  >
                    <div class="business-program-modal__persons-title title-2md">
                      {{ persons.title }}
                    </div>
                    <div class="business-program-modal__persons-items">
                      <BusinessProgramPerson
                        v-for="(person, i) in persons.items"
                        :key="`business-program-modal__persons-item-${index}-${i}`"
                        class="business-program-modal__persons-item"
                        :person="person"
                        :lang="lang"
                      />
                    </div>
                  </div>
                </div>
              </template>
            </Tab>
            <Tab v-if="program.link" :selected="!program.description && !program.persons.length" :title="getTabTitle.video">
              <template #content>
                <iframe class="business-program-modal__iframe" :src="program.link" frameborder="0" border="0" allowfullscreen webkitallowfullscreen mozallowfullscreen scrolling="no"></iframe>
              </template>
            </Tab>
          </Tabs>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    program: {
      type: Object,
      default: () => ({})
    },
    isVisible: {
      type: Boolean,
      default: false,
    },
    lang: {
      type: String,
      default: 'ru',
    }
  },
  data() {
    return {
      partnerCaptionLang: {
        'ru': 'При поддержке:',
        'en': 'Supported by'
      },
      tabTitleLang: {
        'ru': {
          announcement: 'Анонс',
          persons: 'Участники',
          video: 'Трансляция',
        },
        'en': {
          announcement: 'Announcement',
          persons: 'Participants',
          video: 'Broadcasting',
        },
      },
      isAnimateVisible: false,
    }
  },
  computed: {
    getPartnerCaption() {
      return this.partnerCaptionLang[this.lang]
    },
    getTabTitle() {
      return this.tabTitleLang[this.lang]
    },
    tabContentExists() {
      return this.program.description || this.program.persons.length || this.program.link
    }
  },
  methods: {
    close() {
      this.isAnimateVisible = false
      setTimeout(() => {
        this.$emit('close')
      }, 100);
    },
    setBodyScrollState(isCanScrollBody) {
      const delta = window.innerWidth - document.documentElement.clientWidth

      document.body.style.overflow = isCanScrollBody ? '' : 'hidden'
      document.body.style.paddingRight = isCanScrollBody ? '' : `${delta}px`
    },
  },
  watch: {
    isVisible(state) {
      this.setBodyScrollState(!state)
      setTimeout(() => {
        this.isAnimateVisible = state
      }, 100);
    }
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.business-program-modal';

#{$b} {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: flex;
  background-color: rgba(15, 32, 88, 0.53);
  z-index: 4;
  transition: all 0.3s ease;

  &:not(#{$b}--is-visible) {
    pointer-events: none;
    touch-action: none;
    background-color: transparent;

    #{$b}__inner {
      transform: translate(100%);
    }

    #{$b}__close {
      transform: translateY(-100%);
      opacity: 0;
    }
  }

  @include tablet {
    padding: 10px;
  }

  // .business-program-modal__close
  &__close {
    position: absolute;
    top: 21px;
    right: 18px;
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: $bg-brand;
    padding: 11px;
    transition: all 0.3s ease;
    color: $white-true;
    cursor: pointer;
    z-index: 2;

    &:hover {
      background-color: $black-true;

      #{$b}__close-icon {
        transform: rotate(90deg);
      }
    }

    &-icon {
      width: 100%;
      height: 100%;
      transition: all 0.3s ease;

      svg {
        width: 100%;
        height: 100%;
      }
    }
  }

  // .business-program-modal__inner
  &__inner {
    height: 100%;
    max-width: 832px;
    width: 100%;
    color: $black-true;
    background-color: $white-true;
    padding: calc(55px + 8px) 55px;
    margin-left: auto;
    transition: all 0.3s ease;
    overflow-y: auto;
    overflow-x: hidden;
    border-top-left-radius: 24px;
    border-bottom-left-radius: 24px;

    @include mobile-min {
      @include customScrollBar(6px, $bg-brand, rgba($bg-brand, 0.2));
    }

    @include tablet {
      padding: 64px 32px 32px 32px;
      border-radius: 24px;
      max-width: 100%;
    }

    @include mobile {
      padding: 64px 16px 24px 16px;
    }
  }

  // .business-program-modal__header
  &__header {
    margin-bottom: 40px;

    @include mobile {
      margin-bottom: 24px;
    }
  }

  // .business-program-modal__tags
  &__tags {
    margin-bottom: 23px;
  }

  // .business-program-modal__title
  &__title {
    margin: 0 0 15px 0;
  }

  // .business-program-modal__line
  &__line {
    margin-bottom: 16px;
    display: grid;
    grid-template-columns: 140px auto;
    gap: 60px;

    @include low-desktop {
      gap: 32px;
    }

    @include mobile {
      display: block;
    }

    // .business-program-modal__line-item
    &-item {
      @include mobile {
        &:not(:last-child) {
          margin-bottom: 10px;
        }
      }
    }
  }

  // .business-program-modal__time
  &__time {
    position: relative;
    padding-left: 20px;

    &::after {
      content: '';
      position: absolute;
      left: 0;
      top: 5px;
      width: 13px;
      height: 13px;
      display: block;
      background-position: center;
      background-repeat: no-repeat;
      background-size: contain;
      background-image: url('data:image/svg+xml,<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="7" cy="7" r="6" stroke="%23003DFF" stroke-width="1.5" stroke-miterlimit="10"/><path d="M7 4.6665V7.33317L9 9.33317" stroke="%23003DFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/></svg>');
      pointer-events: none;
      touch-action: none;
    }
  }

   // .business-program-modal__address
  &__address {
    position: relative;
    padding-left: 20px;

    &::after {
      content: '';
      position: absolute;
      left: 0;
      top: 5px;
      width: 9px;
      height: 13px;
      display: block;
      background-position: center;
      background-repeat: no-repeat;
      background-size: contain;
      background-image: url('data:image/svg+xml,<svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.03995 6.7C4.2409 6.7 3.5617 6.01429 3.5617 5.15714C3.5617 4.3 4.20095 3.61429 5.03995 3.61429C5.83901 3.61429 6.5182 4.3 6.5182 5.15714C6.5182 6.01429 5.83901 6.7 5.03995 6.7ZM7.83664 2.24286C7.07754 1.42857 6.07872 1 5 1C3.92128 1 2.92246 1.42857 2.16336 2.24286C0.765013 3.7 0.605202 6.48571 1.80378 8.15714L5 13L8.19622 8.15714C9.3948 6.44286 9.23499 3.7 7.83664 2.24286Z" stroke="%23003DFF" stroke-width="1.5" stroke-miterlimit="10"/></svg>');
      pointer-events: none;
      touch-action: none;
    }
  }

  // .business-program-modal__partners
  &__partners {
    display: flex;
    align-items: flex-start;

    @include mobile {
      display: block;
    }

    // .business-program-modal__partners-caption
    &-caption {
      white-space: nowrap;
      margin-right: 8px;

      @include mobile {
        white-space: normal;
        margin-right: 0;
      }
    }

    // .business-program-modal__partners-name
    &-name {
      display: inline-block;
      color: $bg-brand;
    }

    // .business-program-modal__partners-item
    &-item {
      @include mobile {
        &:not(:last-child) {
          margin-bottom: 5px;
        }
      }
    }
  }

  // .business-program-modal__iframe
  &__iframe {
    width: 100%;
    height: auto;
    aspect-ratio: 1920/1080;
  }

  // .business-program-modal__persons
  &__persons {

    // .business-program-modal__persons-block
    &-block {
      &:not(:last-child) {
        margin-bottom: 44px;
      }
    }

    // .business-program-modal__persons-title
    &-title {
      margin: 0 0 8px 0;
    }

    // .business-program-modal__persons-item
    &-item {
      &:not(:last-child) {
        margin-bottom: 10px;
      }
    }
  }

  // .business-program-modal__tabs
  &__tabs {

    // .business-program-modal__tabs-description
    &-description {
      @include mobile {
        font-size: 18px;
      }
    }
  }
}
</style>

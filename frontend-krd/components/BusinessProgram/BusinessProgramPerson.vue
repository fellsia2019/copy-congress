<template>
  <div class="business-program-person">
    <div class="business-program-person__inner">
      <img v-if="person.img" :src="person.img" :alt="person.name" class="business-program-person__img">
      <div class="business-program-person__content">
        <div class="business-program-person__header">
          <div class="business-program-person__title text-lg fw-700">
            {{ person.name }}
          </div>
          <div v-if="person.online" class="business-program-person__status text-md tt-uppercase">
            ONLINE
          </div>
        </div>
        <div class="business-program-person__text text-md fw-400" v-html="person.positions" />
        <div v-if="person.text" class="business-program-person__detail text-md fw-400" @click="openPersonModal">
          {{ personCaptionLang[lang] }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    person: {
      type: Object,
      default: () => ({})
    },
    lang: {
      type: String,
      default: 'ru'
    }
  },
  data() {
    return {
      personCaptionLang: {
        ru: 'Биография',
        en: 'Biography'
      }
    }
  },
  methods: {
    openPersonModal() {
      this.$root.$emit('openPersonModal', this.person.name, this.person.img, this.person.positions, this.person.text);
      this.$root.$emit('modalOpen', String(Date.parse(new Date())));
    }
  },
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.business-program-person';
$img-size: 151px;

#{$b} {
  width: 100%;
  padding: 8px 17px 8px 8px;
  border-radius: 24px;
  background-color: $light-blue;

  // .business-program-person__inner
  &__inner {
    display: flex;

    @include mobile {
      padding: 8px;
      display: block;
    }
  }

  // .business-program-person__img
  &__img {
    min-width: $img-size;
    width: $img-size;
    max-width: $img-size;
    margin-right: 26px;
    height: auto;
    border-radius: 24px;

    @include mobile {
      margin: 0 auto 20px auto;
    }
  }

  // .business-program-person__content
  &__content {
    display: flex;
    flex-direction: column;
    padding-bottom: 14px;
  }

  // .business-program-person__header
  &__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
  }

  // .business-program-person__status
  &__status {
    position: relative;
    color: $bg-brand;
    margin-left: 20px;
    padding-left: 15px;

    &::after {
      content: '';
      display: block;
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background-color: $bg-brand;
    }
  }

  // .business-program-person__text
  &__text {
    &:not(:last-child) {
      margin-bottom: 8px;
    }
  }

  // .business-program-person__detail
  &__detail {
    margin-top: auto;
    text-decoration-line: underline;
    cursor: pointer;
    transition: all 0.3s ease;

    &:hover {
      color: $bg-brand;
    }
  }
}
</style>

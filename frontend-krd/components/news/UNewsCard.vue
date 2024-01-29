<template>
  <a
    class="u-news-card"
    :class="newsCardClassStr"
    :href="cardData.url"
    :target="cardData.target"
  >
    <div class="u-news-card__inner">
      <div
        v-if="Boolean(cardData.image)"
        class="u-news-card__preview"
      >
        <img
          :src="cardData.image"
          :alt="cardData.title"
          class="u-news-card__image"
        >
      </div>
      <div class="u-news-card__main">
        <time v-if="!cardData.hideDate"
          class="u-news-card__date"
          :class="{'u-news-card__date--over-image':Boolean(cardData.image)}"
        >
          {{cardData.date}}
        </time>
        <div class="u-news-card__info">
          <h3
            class="u-news-card__title title-md tt-uppercase"
            v-html="cardData.title"
          >
          </h3>
          <p
            v-if="cardData.text"
            class="u-news-card__description"
            v-html="cardData.text"
          >
          </p>
          <CustomButton class="u-news-card__learn-more">
            Узнать больше
          </CustomButton>
        </div>
      </div>
    </div>
  </a>
</template>

<script>

export default {
  props: {
    size: {
      type: String,
      default: 'default' // default | large
    },
    cardData: {
      type: Object,
      require: true
    }
  },

  computed: {
    newsCardClassStr() {
      const prefix = 'u-news-card--'
      const classes = []

      classes.push(this.size)

      if (this.cardData && this.cardData.isSmall) {
        classes.push('small-mob')
      }

      return classes.map(item => prefix + item).join(' ')
    }
  },
}
</script>


<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.u-news-card';

#{$b} {
  width: 100%;
  max-width: calc(100% / 3);
  display: block;
  color: $white-true;
  text-decoration: none;
  transition: all 0.3s ease;
  cursor: pointer;
  --bg-color: #003DFF;

  &:hover {
    @include mobile-min {
      transform: scale(1.01);
    }
  }

  @include low-desktop {
    max-width: calc(100% / 2);
  }
  @include mobile {
    max-width: 100%;
  }

  &__preview {
    position: relative;
    height: 100%;
    width: 100%;

    &::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      background: linear-gradient(180deg, $black-true 0%, rgba($black-true, 0) 100%);
      opacity: 0.5;
      user-select: none;
      pointer-events: none;
      touch-action: none;
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;

      #{$b}--small-mob & {
        @include mobile {
          border-radius: 16px;
        }
      }
    }

    @include tablet {
      height: auto;
    }

    #{$b}--small-mob & {
      @include mobile {
        height: 100%;
        position: absolute;
        right: 0;
        top: 0;
        width: calc(37% + 40px);
        margin-bottom: 0;
        transform: unset;
        border-radius: 16px;
        overflow: hidden;
      }

      & ~ #{$b}__main {
        #{$b}__info {
          @include mobile {
            min-width: 63%;
            max-width: 63%;
            padding-top: 20px;
            padding-right: 8px;
            position: relative;
            z-index: 2;
          }
        }
      }
    }
  }

  // .u-news-card__inner
  &__inner {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    height: 100%;
    min-height: 400px;
    border-radius: 16px;
    overflow: hidden;

    #{$b}--small-mob & {
      @include mobile {
        flex-direction: row;
        min-height: 114px;
        background-color: transparent;
      }
    }

  }

  // .u-news-card__info
  &__info {
    margin-top: auto;

    #{$b}--small-mob & {
      @include mobile {
        margin: 0;
        width: 100%;
        height: 100%;
        padding: 34px 16px 20px 20px;
        background-color: $bg-brand-2;
        border-radius: 16px;
      }
    }
  }

  // .u-news-card--large
  &--large {
    @include low-desktop-min {
      max-width: calc((100% / 3) * 2);

      #{$b}__inner {
        flex-direction: row;
      }
      #{$b}__main {
        padding-left: 32px;
        padding-right: 32px;
        margin-top: 0;
      }

      #{$b}__preview + #{$b}__main {
        padding-left: 64px;
        margin-left: -32px;
      }

      #{$b}__image {
        height: 100%;
        overflow: hidden;
        border-radius: 16px;
      }
      #{$b}__preview {
        // скрываем подложку под текс для large карточек
        &::after {
          display: none;
        }
        min-width: 296px;
        max-width: 296px;
        margin-bottom: 0;
      }
      #{$b}__description {
        display: block;
      }
      #{$b}__date--over-image {
        position: static;
      }
    }

    @include low-desktop {
      max-width: 50%;
    }
    @include mobile {
      max-width: 100%;
    }
  }

  // .u-news-card__image
  &__image {
    width: 100%;
    object-fit: cover;
    object-position: center;
    aspect-ratio: 400/200;
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;

    #{$b}--small-mob & {
      @include mobile {
        height: 100%;
        width: 100%;
      }
    }
  }

  // .u-news-card__main
  &__main {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 24px;
    background-color: var(--bg-color);

    #{$b}:not(#{$b}--large) #{$b}__preview + & {
      padding-top: 34px;
      margin-top: -10px;
    }

     #{$b}--small-mob & {
      @include mobile {
        order: -1;
        width: 100%;
        margin: 0 !important;
        padding: 0 !important;
        background-color: transparent;
      }
    }
  }

  // .u-news-card__date
  &__date {
    display: block;
    margin-bottom: 24px;
    font-size: 16px;
    font-weight: 500;
    line-height: 1.3;
    letter-spacing: 0.1em;
    text-transform: uppercase;

    // .u-news-card__date--over-image
    &--over-image {
      position: absolute;
      left: 24px;
      top: 24px;

      #{$b}--small-mob & {
        @include mobile-sm {
          text-align: right;
          max-width: 90px;
          right: 8px;
        }
      }
    }

    #{$b}--small-mob & {
      @include mobile {
        z-index: 2;
        position: absolute;
        left: unset;
        right: 10px;
        top: 8px;
        font-size: 10px;
      }
    }
  }

  // .u-news-card__title
  &__title {
    font-family: $font-family-fugue;
    margin: 0;

    #{$b}--small-mob & {
      @include mobile {
        width: 100%;
        font-size: 18px;
        line-height: 100%;
        // IOS fix
        max-height: 72px;
        @include lineClamp(4);
      }
    }

  }

  // .u-news-card__description
  &__description {
    display: none;
    margin: 24px 0 0 0;

    #{$b}--small-mob & {
      @include mobile {
        display: none;
      }
    }
  }

  // .u-news-card__learn-more
  &__learn-more {
    margin: 24px 0 0 0;

    #{$b}--small-mob & {
      @include mobile {
        display: none;
      }
    }
  }
}
</style>

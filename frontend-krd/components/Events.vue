<template>
  <div class="events">
    <div class="g-wrapper-offset-left">
      <events-filter
        :initial-month-filters="monthFilters"
        @change="onFilterChange"
      />
      <div class="events__body">
        <modal></modal>
        <div class="typography typography__border">

          <div v-for="(item, i) in items" :key="`item-${i}`" class="grid grid__filter">
            <div v-show="isVisibleItem(item)">
              <h2>{{ item.NAME }}</h2>

              <div v-if="item.SESSION_SUBJECT || item.SESSION_TYPE" class="tags">
                <div v-if="item.SESSION_SUBJECT" class="tags__item">
                  {{ item.SESSION_SUBJECT }}
                </div>
                <div v-if="item.SESSION_TYPE" class="tags__item">
                  {{ item.SESSION_TYPE }}
                </div>
              </div>

              <div class="location__row">
                <div class="location__row-item">
                  <div class="location__row-time" v-html="getRowTime(item)" />
                  <div v-if="item.SESSION_ZONE" class="location__row-position">
                    {{ item.SESSION_ZONE }}
                  </div>
                </div>
              </div>

              <dropdown
                v-if="item.DETAIL_TEXT || item.VIDEO_LINK"
                button-name="подробнее"
                :link-video="item.VIDEO_LINK"
              >
                <template #main>
                  {{ item.DETAIL_TEXT }}
                </template>
              </dropdown>

              <div v-for="(group, gid) in item.SPEAKERS" :key="`group-${gid}`" class="events__slider">
                <div class="events__slider-title">{{ group.NAME_PLURAL }}</div>
                <slider
                  :id="gid.toString() + i"
                  :items="2"
                  class="slider_shadows"
                  theme="dark"
                  :update-navigation="sliderUpdate"
                  is-multiple
                >
                  <swiper-slide v-for="(speaker, si) in group.ITEMS" :key="`speaker-${si}`" decor-line>
                    <person-card
                      :id-elem="gid.toString()"
                      :person-img="speaker.IMAGE || '/frontend-krd/assets/img/persons-img-default.png'"
                    >
                      <template slot="personName">
                        <div v-html="speaker.NAME" />
                      </template>
                      <template slot="personPosition">
                        <div v-html="speaker.POSITION" />
                      </template>
                      <template slot="modalText">
                        <div v-html="speaker.DETAIL_TEXT" />
                      </template>
                    </person-card>
                  </swiper-slide>
                </slider>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  name: 'Events',
  props: {
    initItems: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      filterState: 'all',
      items: this.makeData(this.initItems),
      sliderUpdate: false,
    };
  },
  computed: {
    monthFilters() {
      return this.items.reduce((acc, item) => {
        const key = item.ACTIVE_FROM;
        if (!acc[key]) {
          const date = this.formatDate({
            date: item.ACTIVE_FROM,
            to: 'DD MMMM',
          });
          acc[key] = { name: date, filter: key, isActive: false };
        }
        return acc;
      }, {
        all: { name: 'Все', filter: 'all', isActive: true },
      });
    },
  },
  methods: {
    onFilterChange(filterState) {
      this.filterState = filterState;
      this.sliderUpdate = !this.sliderUpdate;
    },
    formatDate({ date, from = 'DD.MM.YYYY', to = 'DD MMMM YYYY' } = {}) {
      return date ? moment(date, from).locale('ru').format(to) : `Missing date`;
    },
    getRowTime(item) {
      const date = `${this.formatDate({ date: item.ACTIVE_FROM })} <span>/</span> `;
      const startTime = item.START_TIME;
      const stopTime = item.STOP_TIME ? ` - ${item.STOP_TIME}` : '';
      return `${date}${startTime}${stopTime}`;
    },
    isVisibleItem(item) {
      return this.filterState === 'all' || this.filterState === item.ACTIVE_FROM;
    },
    makeData(data) {
      return data.map(({
        NAME: EVENT_NAME = '',
        ACTIVE_FROM = '',
        DETAIL_TEXT = '',
        PROPERTIES: { LINK: { VALUE: VIDEO_LINK = '' } = {} } = {},
        DISPLAY_PROPERTIES: {
          START_TIME: { VALUE: START_TIME = '' } = {},
          STOP_TIME: { VALUE: STOP_TIME = '' } = {},
          SESSION_SUBJECT: { VALUE: SESSION_SUBJECT = '' } = {},
          SESSION_TYPE: { VALUE: SESSION_TYPE = '' } = {},
          SESSION_ZONE: { VALUE: SESSION_ZONE = '' } = {},
          SPEAKERS = {},
        } = {},
      }) => {
        return {
          NAME: EVENT_NAME,
          ACTIVE_FROM,
          START_TIME,
          STOP_TIME,
          DETAIL_TEXT,
          VIDEO_LINK,
          SESSION_SUBJECT,
          SESSION_TYPE,
          SESSION_ZONE,
          SPEAKERS: Object.values(SPEAKERS).map(({ NAME_PLURAL = '', ITEMS = [] }) => {
            return {
              NAME_PLURAL,
              ITEMS: ITEMS.map(({
                IMAGE = '/frontend-krd/assets/img/persons-img-default.png',
                NAME = '',
                POSITION = '',
                DETAIL_TEXT = '',
              }) => {
                return {
                  IMAGE,
                  NAME,
                  POSITION,
                  DETAIL_TEXT,
                };
              }),
            };
          }),
        };
      });
    },
  },
};
</script>

<style lang="scss">
@import "../scss/base/includes";

$b: '.events';
$offsetTop: 64px;

#{$b} {
  display: block;

  &-section {
    position: relative;
    z-index: 2;
    padding-top: 0;
    padding-bottom: 70px;
    margin-top: #{-$offsetTop};

    @include desktop {
      padding-bottom: 50px;
    }

    .figures {
      position: absolute;
      top: $offsetTop;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: -1;
    }
  }

  &__body {
    &:not(:first-child) {
      margin-top: 58px;

      @include desktop {
        margin-top: 38px;
      }

      @include tablet {
        margin-top: 30px;
      }
    }

    &:not(:last-child) {
      margin-bottom: 36px;

      @include desktop {
        margin-bottom: 24px;
      }

      @include tablet {
        margin-bottom: 14px;
      }
    }
  }

  &__slider {
    margin-top: 56px;

    &-title {
      cursor: auto;
      color: #000000 !important;
      font-size: 28px;
      line-height: 150%;
      font-weight: bold;
      margin-bottom: 24px;
      text-transform: none;
    }
  }
}
</style>

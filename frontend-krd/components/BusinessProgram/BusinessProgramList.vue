<template>
  <div class="business-program-list">
    <BusinessProgramModal :isVisible="isExistsCurrentProgram" @close="setCurrentProgram(null)" :lang="lang" :program="currentProgram"/>
    <BusinessProgramItem :isHeader="true" :program="headerList" :header="headerList"/>
    <BusinessProgramItem
      v-for="(item, i) in getItems"
      :key="`business-program-list__item-${i}`"
      class="business-program-list__item"
      :program="item"
      :header="headerList"
      @click="setCurrentProgram"
    />
  </div>
</template>

<script>
export default {
  props: {
    headerList: {
      type: Object,
      default: () => ({})
    },
    items: {
      type: Array,
      default: () => []
    },
    lang: {
      type: String,
      default: ''
    },
  },
  data() {
    return {
      currentProgram: null
    }
  },
  computed: {
    isExistsCurrentProgram() {
      return !!(this.currentProgram && Object.keys(this.currentProgram).length)
    },
    getItems() {
      return this.items.map(item => {
        const time = item.data && item.data.time
        const from = time ? time.from : ''
        const to = time ? time.to : ''
        const separator = from && to ? ' — ' : ''

        return {
          ...item,
          timeStr: time ? `${from}${separator}${to}` : '',
        }
      })
    }
  },
  methods: {
    setCurrentProgram(program) {
      this.currentProgram = program
    }
  }
}
</script>

<style lang="scss">
@import '/frontend-krd/scss/base/includes.scss';

$b: '.businessprogram-list';

#{$b} {
  @include tablet {
    overflow-x: auto;
    overflow-y: hidden;
    padding: 0 40px;
    width: calc(100% + 80px);
    margin-left: -40px;

    @include removeScrollBar();
  }
  @include mobile {
    padding: 0 24px;
    width: calc(100% + 48px);
    margin-left: -24px;
  }
  @include mobile-small {
    padding: 0 16px;
    width: calc(100% + 32px);
    margin-left: -16px;
  }

  // .business-program-list__item
  &__item {
    @include mobile {
      &:not(:last-child) {
        margin-bottom: 16px;
      }
    }
  }
}
</style>

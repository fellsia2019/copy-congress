<template>
  <div class="dropdown">
    <div class="dropdown__container">
      <div class="dropdown__main" :class="[{'_small' : small}, {'_drop' : dropContent}]" ref="infoBox">
        <slot name="main" />
      </div>
      <div class="dropdown__control">
        <div class="dropdown__control-translation" v-if="linkVideo">
          <a class="button button_brand" @click="openModalWindow">Смотреть трансляцию</a>
        </div>
        <div @click="drop" class="dropdown__button" v-if="small">
          <div v-html="buttonName" class="dropdown__button-text" />
          <div class="dropdown__button-icon" :class="{'_active' : dropContent}">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="6" viewBox="0 0 7 6" fill="none">
              <path d="M3.5 6L0.468912 0.749999L6.53109 0.75L3.5 6Z" fill="#3B37FF"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Dropdown",
  props: {
    buttonName: { type: String, default: '' },
    linkVideo: { type: String, default: '' },
  },
  data() {
    return {
      dropContent: false,
      leftColStyles: { },
      lines: ['one', 'two','three'],
      small: false,
      heightC: 0,
      openModal: false,
    }
  },
  methods: {
    drop() {
      this.dropContent = !this.dropContent;
    },
    matchHeight () {
      let height = this.$refs.infoBox.clientHeight;
      return height;
    },
    openModalWindow() {
      this.$root.$emit('openVideo', this.linkVideo);
      this.$root.$emit('modalOpen', this.idElem);
      document.querySelector('body').classList.add('no-scroll');
      document.querySelector('.figures').classList.add('_z-index-up');
    },
  },
  mounted () {
    this.matchHeight() > 125 ? this.small = true : this.small = false;
  },
}
</script>

<template>
  <div class="modal" v-if="openModal">
    <div class="modal__container" :class="[{'_bottom-shadow' : bottomContainerShadow}, {'_top-shadow' : topContainerShadow}]">
      <div class="modal__img" v-if="textModal">
        <img v-if="personImg" :src="personImg" alt="">
        <img v-else src="../assets/img/persons-img-default.png">
      </div>
      <div class="modal__wrapper" v-bar ref="bar" :class="{'_no-bar': noBar}" v-if="textModal">
        <div class="modal__content" @scroll="scrollBar()">
          <div class="modal__description">
            <div class="modal__description-name" v-html="personName"></div>
            <div class="modal__description-position" v-html="personPosition" />
          </div>
          <div class="modal__text" v-html="text" v-if="text" ref="textModal" />
        </div>
      </div>
      <div class="modal__wrapper" v-if="videoModal">
        <div class="modal__content modal__content-video _16x9">
          <iframe :src="linkVideo" frameborder="0" border="0" allowfullscreen webkitallowfullscreen mozallowfullscreen scrolling="no" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';"></iframe>
        </div>
      </div>
      <div class="modal__close" @click="closeModalWindow">
        <div class="modal__close-button">
          <div class="modal__close-icon">
            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.49023 0.989624L13.511 13.0104" stroke="white" stroke-width="1.5"/>
              <path d="M1.49023 13.0101L13.511 0.989316" stroke="white" stroke-width="1.5"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  data() {
    return {
      personName: '',
      personImg: '',
      personPosition: '',
      linkVideo: '',
      text: '',
      openModal: false,
      topContainerShadow: false,
      bottomContainerShadow: false,
      noBar: false,
      textModal: false,
      videoModal: false,
    }
  },
  methods: {
    openModalWindow() {
      this.noBar = false;
      this.openModal = true;
      setTimeout(() => {
        this.$vuebar.getState(this.$refs.bar).barHeight === 0 ? this.noBar = true : this.noBar = false;
        this.$vuebar.getState(this.$refs.bar).barHeight > 0 ? this.bottomContainerShadow = true : '';
      }, 0);
    },
    closeModalWindow() {
      this.noBar = false;
      this.openModal = false;
      this.$root.$emit('modalClose', this.idElem);
      document.querySelector('body').classList.remove('no-scroll');
      document.querySelector('.figures').classList.remove('_z-index-up');
      this.topContainerShadow = false;
      this.bottomContainerShadow = false;
      this.textModal = false;
      this.videoModal = false;
    },
    scrollBar() {
      setTimeout(() => {
        this.$vuebar.getState(this.$refs.bar).barHeight + this.$vuebar.getState(this.$refs.bar).barTop + 5 >= this.$refs.bar.offsetHeight ? this.bottomContainerShadow = false : this.bottomContainerShadow = true;
      }, 10);
    },
  },
  mounted() {
    this.$root.$on('open', (name, img, position, text) => {
      this.topContainerShadow = true;
      this.textModal = true;
      this.personName = name;
      this.personImg = img;
      this.personPosition = position;
      this.text = text;
      this.openModalWindow();
    });
    this.$root.$on('openVideo', (linkVideo) => {
      this.videoModal = true;
      this.linkVideo = linkVideo;
      this.personImg = false;
      this.openModalWindow();
    });
    document.addEventListener('keydown',(e) => {
      e.keyCode === 27 ? this.closeModalWindow() : '';
    });
    document.addEventListener('click',(e) => {
      e.target.classList.contains('modal') ? this.closeModalWindow() : '';
    });
  },
  beforeDestroy() {
    document.removeEventListener('keydown');
    document.removeEventListener('click');
  }
}
</script>

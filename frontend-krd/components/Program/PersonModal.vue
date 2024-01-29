<template>
  <div class="modal modal_person" v-if="openModal">
    <div class="modal__container" >
      <div class="modal__img">
        <img v-if="personImg" :src="personImg">
      </div>
      <div class="modal__wrapper">
        <div class="modal__content" >
          <div class="modal__description">
            <div class="modal__description-name" v-html="personName"></div>
            <div class="modal__description-position" v-html="personPosition" />
          </div>
          <div class="modal__text" v-html="text" v-if="text"/>
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
  name: "PersonModal",
  data() {
    return {
      personName: '',
      personImg: '',
      personPosition: '',
      text: '',
      openModal: false,
    }
  },
  methods: {
    openModalWindow() {
      this.openModal = true;
      document.querySelector('body').classList.add('no-scroll');
    },
    closeModalWindow() {
      this.openModal = false;
      this.$root.$emit('modalClose', this.idElem);
      document.querySelector('body').classList.remove('no-scroll');
    },
  },
  mounted() {
    this.$root.$on('openPersonModal', (name, img, position, text) => {
      this.personName = name;
      this.personImg = img;
      this.personPosition = position;
      this.text = text;
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

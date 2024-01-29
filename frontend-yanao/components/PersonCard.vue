<template>
  <div class="person-card">
    <div class="person-card__img">
      <img v-if="personImg" :src="personImg" alt="">
      <img v-else src="../assets/img/persons-img-default.png">
    </div>
    <div class="person-card__content">
      <div class="person-card__description">
        <div class="person-card__description-name" ref="namePerson">
          <slot name="personName" />
        </div>
        <div class="person-card__description-position" ref="positionPerson">
          <slot name="personPosition" />
        </div>
        <div class="person-card__description-text" v-show="modalHide" ref="textModal">
          <slot name="modalText" />
        </div>
      </div>
      <div class="person-card__button" @click="openModalWindow">биография</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PersonCard",
  props: {
    idElem: { type: String, default: '' },
    personImg: { type: String, default: '' },
  },
  data() {
    return {
      openModal: false,
      topContainerShadow: false,
      bottomContainerShadow: false,
      noBar: false,
      modalHide: false,
    }
  },
  methods: {
    openModalWindow() {
      this.$root.$emit('open', this.$refs.namePerson.innerHTML, this.personImg, this.$refs.positionPerson.innerHTML, this.$refs.textModal.innerHTML);
      this.$root.$emit('modalOpen', this.idElem);
      document.querySelector('body').classList.add('no-scroll');
      document.querySelector('.figures').classList.add('_z-index-up');
    },
  }
}
</script>

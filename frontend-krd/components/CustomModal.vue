<template>
  <div class="custom-modal">

  </div>
</template>

<script>
export default {
  props: {
    isShowed: {
      type: Boolean,
      default: false
    },
  },
  data() {
    return {
      contentComponent: {
        name: null,
        props: null,
        title: null,
      },
      isShow: this.isShowed,
      dialogVisible: true,
    }
  },
  methods: {
    passContent(componentData) {
      this.contentComponent = {...this.contentComponent, componentData}
      this.dialogVisible = true;
    },
    clearContentComponent() {
      this.contentComponent = {
        name: null,
        props: null,
        title: null,
      }
    },
    openModal(content, awaitContent) {
      if (content) {
        this.passContent(content);
      }
      if (awaitContent) {
        this.dialogVisible = false;
      }
      this.isShow = true;
    },
    closeModal() {
      this.isShow = false;

      this.clearContentComponent()
    },
  },
  created() {
    document.addEventListener("keyup", e => {
      const key = e.code || e.key;
      if (key == "Escape") {
        this.closeModal();
      }
    });
  }
}
</script>

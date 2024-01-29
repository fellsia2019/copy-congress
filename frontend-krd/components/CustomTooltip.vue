<template>
  <div
    :class="['custom-tooltip', `custom-tooltip_${getDirection}`]"
    @mouseover="onOver"
    @mouseleave="onLeave"
    @click="onClick"
    v-click-outside="close"
  >
    <div class="custom-tooltip__target">
      <slot name="target" />
      <div v-show="isShow && content" class="custom-tooltip__arrow">
        <svg
          width="15"
          height="15"
          viewBox="0 0 15 15"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M15 15V0H0L15 15Z" fill="white"></path>
        </svg>
      </div>
    </div>
    <div
      v-show="isShow && content"
      ref="popup"
      class="custom-tooltip__popup"
      :style="`width: ${width}px;`"
    >
      <div class="custom-tooltip__content">
        <slot name="content" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CustomTooltip",
  inject: ["breakpoint"],
  props: {
    width: {
      type: Number,
      default: 360,
    },
    direction: {
      type: String,
      default: "left-top",
    },
    content: {
      type: Boolean,
      default: true
    },
  },
  data() {
    return {
      isShow: false,
      position: null,
    };
  },
  computed: {
    isRightFit() {
      return this.position?.right > 0;
    },
    isLeftFit() {
      return this.position?.left > 0;
    },
    getDirection() {
      if (!this.isShow || !this.position) {
        return this.direction;
      }

      let result = "";

      if (
        (this.direction === "left-top" && this.isLeftFit) ||
        (this.direction === "right-top" && this.isRightFit) ||
        this.direction === "center-top"
      ) {
        result = this.direction;
      } else {
        if (this.isRightFit && !this.isLeftFit) {
          result = "right-top";
        } else if (!this.isRightFit && this.isLeftFit) {
          result = "left-top";
        } else {
          result = "center-top";
        }
      }

      return result;
    },
  },
  watch: {
    isShow(val) {
      if (val) {
        this.$nextTick(() => {
          this.position = this.$refs.popup?.getBoundingClientRect();
        });
      } else {
        this.position = null;
      }
    },
  },
  methods: {
    toggle() {
      this.isShow = !this.isShow;
    },
    open() {
      this.isShow = true;
    },
    close() {
      this.isShow = false;
    },
    onClick() {
      if (this.breakpoint.isDesktop) {
        return;
      }

      this.toggle();
    },
    onOver() {
      if (!this.breakpoint.isDesktop) {
        return;
      }

      this.open();
    },
    onLeave() {
      if (!this.breakpoint.isDesktop) {
        return;
      }

      setTimeout(() => {
        this.close();
      }, 200);
    },
  },
};
</script>

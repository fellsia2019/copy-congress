<template>
  <div
    ref="section"
    class="figures"
    :class="{ 'figures--overflow': isOverflow }"
  >
    <div :class="{ 'figures-list': !fullWidth }">
      <div
        v-for="(item, i) in items"
        :key="i"
        ref="figure"
        class="figures-item"
        :class="item.name"
      >
        <div :class="{ 'figures__reverse-x': item.reverseX, 'figures__reverse-y': item.reverseY }">
          <img
          :class="{ animated: animateParallax }"
          v-rellax="rellax"
          :src="item.image"
          alt="item.name"
        />
        </div>
      </div>
    </div>
    <div class="figures-content">
      <slot />
    </div>
  </div>
</template>

<script>
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

// IE fix ScrollTrigger
window.requestAnimationFrame = window.requestAnimationFrame.bind(window);

gsap.registerPlugin(ScrollTrigger);

export default {
  name: "Figures",
  props: {
    items: {
      type: Array,
      default: () => []
    },
    isFirst: {
      type: Boolean,
      default: false
    },
    isOverflow: {
      type: Boolean,
      default: false
    },
    fullWidth: {
      type: Boolean,
      default: false
    },
    alwaysShow: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      animateParallax: false,
      rellax: false,
      animateIn: undefined,
      fadeOutLeft: {
        x: -80,
        opacity: 0,
        ease: "power2",
        duration: 1,
        onComplete: this.startParallax
      },
      fadeOutRight: {
        x: 80,
        opacity: 0,
        ease: "power2",
        duration: 1,
        onComplete: this.startParallax
      },
      fadeOutTop: {
        y: -80,
        opacity: 0,
        ease: "power2",
        duration: 1,
        onComplete: this.startParallax
      }
    };
  },
  mounted() {
    this.animateIn = gsap.timeline({
      scrollTrigger: {
        trigger: this.$refs.section,
        start: this.isFirst ? "top top" : "top center",
        // markers: "true",
        toggleActions: this.alwaysShow ? "play" : "play none none reverse"
      }
    });

    this.items.forEach((item, i) => {
      const element = this.$refs.figure[i];

      switch (item.animation) {
        case "fade-in-left":
          this.animateIn.from(element, this.fadeOutLeft);
          break;
        case "fade-in-right":
          this.animateIn.from(element, this.fadeOutRight);
          break;
        case "fade-in-top":
          this.animateIn.from(element, this.fadeOutTop);
          break;
        default:
          this.startParallax();
          break;
      }
    });
  },
  methods: {
    startParallax() {
      if (this.rellax > 0) return;
      this.animateParallax = true;
      this.rellax = { speed: -Number(Math.random().toFixed(1)) - 0.1 };
    }
  }
};
</script>

<style lang="scss">
@import "../scss/base/includes";

$b: ".figures";

#{$b} {
  position: relative;

  &--overflow {
    overflow: hidden;
    body.no-scroll & {
      overflow: visible;

      @include low-desktop {
        overflow: hidden;
      }
    }
  }
  &-list {
    @include full-abs;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
  }
  &_absolute {
    #{$b}-list {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      height: 100%;
      min-height: 1760px;
    }
  }
  &-content {
    position: relative;
    z-index: 1;
  }
  &__reverse-x {
    transform: scaleX(-1);
  }
  &__reverse-y {
    transform: scaleY(-1);
  }
  &-item {
    position: absolute;
    z-index: 0;

    img {
      &.animated {
        transition: transform 0.5s ease;
      }
    }
    svg {
      path {
        fill: currentColor;
      }
    }
    &.partner-figure-1 {
      width: 550px;
      top: 75px;
      left: -200px;

      @include low-desktop {
        width: 450px;
        top: 50px;
        left: -250px;
      }
      @include tablet {
        width: 400px;
        top: -60px;
        left: -280px;
      }
      @include mobile {
        width: 300px;
        top: 175px;
        left: -170px;
      }
    }
    &.partner-figure-2 {
      width: 510px;
      top: 350px;
      right: -150px;

      @include low-desktop {
        width: 410px;
        top: 300px;
        right: -250px;
      }
      @include tablet {
        width: 400px;
        top: 240px;
        right: -280px;
      }
      @include mobile {
        width: 310px;
        top: 600px;
        right: -200px;
      }
    }
    &.partner-figure-3 {
      width: 320px;
      top: 1160px;
      left: -100px;

      @include low-desktop {
        width: 280px;
        top: 1000px;
        left: -100px;
      }
      @include tablet {
        width: 270px;
        top: 960px;
        left: -200px;
      }
      @include mobile {
        width: 250px;
        top: 900px;
        left: -160px;
      }
    }
    &.partner-figure-4 {
      width: 700px;
      top: 1000px;
      right: -200px;

      @include low-desktop {
        width: 600px;
        top: 1100px;
        right: -300px;
      }
      @include tablet {
        width: 700px;
        top: 900px;
        right: -300px;
      }
      @include mobile {
        width: 500px;
        top: 1200px;
        right: -300px;
      }
    }
    &.congress-figure-1 {
      width: 316px;
      top: 60px;
      left: -88px;

      @include low-desktop {
        width: 260px;
        top: 90px;
        left: -96px;
      }
      @include tablet {
        width: 228px;
        top: 106px;
        left: -112px;
      }
      @include mobile {
        width: 120px;
        top: 94px;
        left: -65px;
      }
    }
    &.congress-figure-2 {
      width: 420px;
      top: 160px;
      right: -80px;

      @include low-desktop {
        width: 370px;
        top: 180px;
        right: -140px;
      }
      @include tablet {
        width: 310px;
        top: 180px;
        right: -200px;
      }
      @include mobile {
        width: 200px;
        top: 430px;
        right: -110px;
      }
    }
    &.congress-figure-3 {
      width: 950px;
      top: 700px;
      left: -340px;

      @include low-desktop {
        width: 700px;
        top: 650px;
        left: -300px;
      }
      @include tablet {
        width: 640px;
        top: 700px;
        left: -340px;
      }
      @include mobile {
        width: 340px;
        top: 1000px;
        left: -180px;
      }
    }
    &.congress-figure-4 {
      width: 370px;
      top: 280px;
      left: 80px;

      @include low-desktop {
        width: 340px;
        top: 377px;
        left: -20px;
      }
      @include tablet {
        display: none;
      }
    }
    &.contacts-figure-1 {
      width: 900px;
      top: 100px;
      left: -100px;

      @include low-desktop {
        width: 700px;
        left: -30px;
      }
      @include tablet {
        left: -100px;
      }
      @include mobile {
        width: 550px;
        top: 60px;
        left: -220px;
      }
    }
    &.contacts-figure-2 {
      width: 470px;
      top: 1200px;
      left: -82px;

      @include low-desktop {
        top: 1000px;
        left: -124px;
      }
      @include tablet {
        top: 1040px;
      }
      @include mobile {
        width: 380px;
        top: 1100px;
        left: -140px;
      }
    }
    &.press-figure-1 {
      width: 316px;
      top: -90px;
      left: -160px;

      @include low-desktop {
        width: 260px;
        top: -70px;
        left: -130px;
      }
      @include tablet {
        width: 228px;
        top: -60px;
        left: -120px;
      }
      @include mobile {
        width: 120px;
        top: -20px;
        left: -60px;
      }
    }
    &.press-figure-2 {
      width: 400px;
      top: 300px;
      right: -170px;

      @include low-desktop {
        width: 370px;
        top: 380px;
        right: -140px;
      }
      @include tablet {
        width: 310px;
        top: 320px;
        right: -200px;
      }
      @include mobile {
        width: 200px;
        top: 560px;
        right: -110px;
      }
    }
    &.press-figure-3 {
      width: 370px;
      top: 180px;
      left: 20px;

      @include low-desktop {
        width: 340px;
        top: 148px;
        left: 80px;
      }
      @include tablet {
        display: none;
      }
    }
    &.press-figure-4 {
      width: 460px;
      top: 1520px;
      right: -300px;

      @include low-desktop {
        width: 384px;
        top: 1426px;
        right: -200px;
      }
      @include tablet {
        width: 350px;
        top: 1523px;
        right: -216px;
      }
      @include mobile {
        width: 229px;
        top: 1660px;
        right: -152px;
      }
    }
    &.press-figure-5 {
      width: 316px;
      bottom: 460px;
      left: -110px;

      @include low-desktop {
        width: 260px;
        bottom: 540px;
        left: -130px;
      }
      @include tablet {
        width: 260px;
        bottom: 490px;
        left: -139px;
      }
      @include mobile {
        width: 120px;
        bottom: 618px;
        left: -44px;
      }
    }
    &.press-figure-6 {
      width: 760px;
      bottom: 250px;
      right: -141px;

      @include low-desktop {
        width: 600px;
        bottom: 290px;
        right: -142px;
      }
      @include tablet {
        width: 505px;
        bottom: 320px;
        right: -109px;
      }
      @include mobile {
        width: 373px;
        right: -147px;
        bottom: 411px;
      }
    }
    &.press-figure-repeat-1 {
      width: 460px;
      right: -200px;

      @include low-desktop {
        width: 380px;
      }
      @include tablet {
        width: 350px;
      }
      @include mobile {
        width: 230px;
        right: -120px;
      }
    }
    &.press-figure-repeat-2 {
      width: 316px;
      left: -110px;

      @include low-desktop {
        width: 260px;
      }
      @include tablet {
        width: 260px;
      }
      @include mobile {
        width: 120px;
        left: -50px;
      }
    }
    &.press-figure-repeat-3 {
      width: 760px;
      right: -140px;

      @include low-desktop {
        width: 600px;
      }
      @include tablet {
        width: 505px;
      }
      @include mobile {
        width: 373px;
        right: -200px;
      }
    }
    &.press-acc-figure-1 {
      top: 100px;
    }
    &.press-acc-figure-2 {
      top: 1200px;
    }
    &.press-acc-figure-3 {
      top: 2000px;
    }
    &.press-acc-figure-4 {
      top: 3250px;
    }
    &.press-acc-figure-5 {
      top: 4400px;
    }
    &.press-acc-figure-6 {
      top: 5000px;
    }
    &.press-acc-figure-7 {
      top: 6200px;
    }
    &.press-acc-figure-8 {
      top: 7400px;
    }
    &.press-acc-figure-9 {
      top: 8000px;
    }
  }
}
</style>

import "./scss/app.scss";
import "swiper/css/swiper.css";

import Vue from "vue";
import registerVueDirectives from "./directives";
import VueAwesomeSwiper from "vue-awesome-swiper";
import VueRellax from "vue-rellax";
import Vuebar from "vuebar";
import Vue2TouchEvents from "vue2-touch-events";
// eslint-disable-next-line
import yaMetrics from "./utils/yaMetrics";

registerVueDirectives();

Vue.use(VueAwesomeSwiper);
Vue.use(VueRellax);
Vue.use(Vuebar);
Vue.use(Vue2TouchEvents);


const files = require.context("./components", true, /\.vue$/i);
files
  .keys()
  .map((key) =>
    Vue.component(key.split("/").pop().split(".")[0], files(key).default)
  );

const appEl = document.querySelector('#app')

function createAppVue() {
  new Vue({
    data() {
      return {
        menuOpened: false,
        breakpoint: this.getBreakpoint(),
      };
    },
    provide() {
      return {
        breakpoint: this.breakpoint,
        ymHandler: this.ymHandler,
      };
    },
    created() {
      console.log('created')
      this.checkUserAgent();

      window.addEventListener("resize", this.updateBreakpoint, { passive: true });
      window.addEventListener("resize", this.setRootSizes);
      this.$nextTick(() => {
        this.setRootSizes()
      })
    },
    beforeDestroy() {
      this.removeMenuLinkEvent();

      if (typeof window !== "undefined") {
        window.removeEventListener("resize", this.updateBreakpoint);
        window.removeEventListener("resize", this.setRootSizes);
      }
    },
    methods: {
      getBreakpoint() {
        const { innerWidth } = window;
        return {
          isDesktop: innerWidth >= 1280,
          isLow: innerWidth < 1280,
          isTablet: innerWidth < 1024,
          isMobile: innerWidth < 768,
        };
      },
      updateBreakpoint() {
        const { isDesktop, isLow, isTablet, isMobile } = this.getBreakpoint();
        this.breakpoint.isDesktop = isDesktop;
        this.breakpoint.isLow = isLow;
        this.breakpoint.isTablet = isTablet;
        this.breakpoint.isMobile = isMobile;
      },
      toggleMenu() {
        this.menuOpened = !this.menuOpened;

        if (this.menuOpened) {
          this.fixScrollBarWidth()
          this.$nextTick(() => {
            this.setMenuLinkEvent();
          });
        } else {
          this.fixScrollBarWidth()
          this.removeMenuLinkEvent();
        }
      },
      fixScrollBarWidth() {
        const header = document.querySelector(".header");
        const delta = window.innerWidth - document.documentElement.clientWidth;

        header.style.paddingRight = `${delta}px`
      },
      closeMenu() {
        this.menuOpened = false;
      },
      setMenuLinkEvent() {
        const nav = document.querySelector(".header__nav");

        if (nav) {
          const links = nav.querySelectorAll("a");

          links.forEach((link) => {
            link.addEventListener("click", this.closeMenu);
          });
        }
      },
      removeMenuLinkEvent() {
        const nav = document.querySelector(".header__nav");

        if (nav) {
          const links = nav.querySelectorAll("a");

          links.forEach((link) => {
            link.removeEventListener("click");
          });
        }
      },
      checkUserAgent() {
        const body = document.body;
        const agent = navigator.userAgent;

        if (/^((?!chrome|android).)*safari/i.test(agent)) {
          body.classList.add("is-safari");
        }
      },
      ymHandler(data) {
        const code = data.code || 90561506
        const type = data.type || 'reachGoal'
        const operation = data.operation || ''
        const options = data.options || {}

        const ymData = [code, type, operation]

        if (data.participateUrl) {
          options[data.participateUrl] = window.location.origin
        }

        if (options && Object.values(options).length) {
          ymData.push(options)
        }

        window.ym(...ymData)
      },
      setRootSizes() {
        this.$nextTick(() => {
          const header = document.querySelector('.header__inner')
          const headerRect = header ? header.getBoundingClientRect().height : 0

          document.documentElement.style.setProperty('--header-height', `${Math.ceil(headerRect)}px`);
        })
      }
    },
  }).$mount("#app");
}

if (appEl) {
  createAppVue()
} else {
  document.addEventListener('DOMContentLoaded', createAppVue)
}



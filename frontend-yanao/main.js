import "./scss/app.scss";
import "swiper/css/swiper.css";

import Vue from "vue";
import registerVueDirectives from "./directives";
import VueAwesomeSwiper from "vue-awesome-swiper";
import VueRellax from "vue-rellax";
import Vuebar from 'vuebar';
import Vue2TouchEvents from 'vue2-touch-events';
// eslint-disable-next-line
import yaMetrics from './utils/yaMetrics'

registerVueDirectives();

Vue.use(VueAwesomeSwiper);
Vue.use(VueRellax);
Vue.use(Vuebar);
Vue.use(Vue2TouchEvents);

const files = require.context("./components", true, /\.vue$/i);
files.keys().map(key =>
  Vue.component(
    key
      .split("/")
      .pop()
      .split(".")[0],
    files(key).default
  )
);

new Vue({
  data() {
    return {
      menuOpened: false,
    };
  },
  mounted() {
    window.addEventListener("scroll", this.ymScroll);
  },
  beforeDestroy() {
    this.removeMenuLinkEvent();
    window.removeEventListener("scroll", this.ymScroll);
  },
  methods: {
    toggleMenu() {
      this.menuOpened = !this.menuOpened;

      if (this.menuOpened) {
        this.$nextTick(() => {
          this.setMenuLinkEvent();
        });
      } else {
        this.removeMenuLinkEvent();
      }
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
    ymHandler(data) {
      const code = data.code || window.ymDefaultCode || 0
      const type = data.type || 'reachGoal'
      const operation = data.operation || 'scrollDepth_25'

      const options = data.options || {}

      const ymParams = [code, type, operation]
      if (options && Object.keys(options).length) {
        ymParams.push(options)
      }

      window.ym(...ymParams)
    },
    ymScroll() {
      const maxScrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      const percentagesArr = [25,50,75,100];
      const scrollY = document.documentElement.scrollTop;
      const scrollPercentage = Math.round(scrollY / maxScrollHeight * 100);
      let currentPercentage = 0;
      let i = 0;
      while (percentagesArr[i] <= scrollPercentage) {
        currentPercentage = percentagesArr[i++];
      }
      if (this.previousPercentage !== currentPercentage && currentPercentage > 0) {
        this.ymHandler({ operation: `scrollDepth_${currentPercentage}`, options: { URL: document.location.href } })
        this.previousPercentage = currentPercentage;
      }
    },
  },
}).$mount('#app');

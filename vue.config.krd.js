const path = require('path');

module.exports = {
  configureWebpack: {
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'frontend-krd/'),
      }
    }
  },
  runtimeCompiler: true,
  transpileDependencies: ["swiper", "vue2-smooth-scroll", "dom7", "gsap", "ScrollTrigger", "v-body-scroll-lock"],
  pages: {
    main: {
      entry: "frontend-krd/main.js",
      template: "frontend-krd/main.html",
      inject: false
    }
  },
  outputDir: "frontend-krd/build",
  publicPath: "/frontend-krd/build",
  // filenameHashing: true,
  filenameHashing: false,
  css: {
    extract: true
  },
  chainWebpack: config => {
    config.module
      .rule("i18n")
      .resourceQuery(/blockType=i18n/)
      .type("javascript/auto")
      .use("i18n")
      .loader("@kazupon/vue-i18n-loader")
      .end();
  }
};

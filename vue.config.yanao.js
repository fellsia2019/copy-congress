const path = require('path');

module.exports = {
  configureWebpack: {
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'frontend-yanao/'),
      }
    }
  },
  runtimeCompiler: true,
  transpileDependencies: ["swiper", "vue2-smooth-scroll", "dom7", "gsap", "ScrollTrigger", "v-body-scroll-lock"],
  pages: {
    main: {
      entry: "frontend-yanao/main.js",
      template: "frontend-yanao/main.html",
      inject: false
    },
    footer: {
      entry: "frontend-yanao/footer.js",
      template: "frontend-yanao/footer.html",
      inject: false,
      chunks: ["footer"],
    },
  },
  outputDir: "frontend-yanao/build",
  publicPath: "/frontend-yanao/build",
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

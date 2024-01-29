import Vue from "vue";

export default function registerVueDirectives() {
  Vue.directive("class-toggler", {
    inserted(el, { modifiers: { parent, closest, prevent }, arg, value }) {
      el.clickCallback = e => {
        // v-class-toggler.prevent="'some-class'"
        if (prevent) {
          e.preventDefault();
        }
        let target;
        switch (true) {
          // v-class-toggler.parent="'some-class'"
          case parent:
            target = el.parentNode;
            break;
          // v-class-toggler:closest-el-class.closest="'some-class'"
          case closest:
            target = arg ? el.closest(`.${arg}`) : el;
            break;
          // v-class-toggler="'some-class'"
          default:
            target = el;
        }
        if (!target) {
          return;
        }

        target.classList.toggle(value);
      };
      el.addEventListener("click", el.clickCallback);
    },
    unbind(el) {
      el.removeEventListener("click", el.clickCallback);
    }
  });
  Vue.directive("video-controls", {
    inserted(el) {
      const video = el.nextElementSibling;
      el.clickCallback = () => {
        el.classList.add("_played");
        video.play();
        video.setAttribute("controls", "controls");
      };
      el.pauseCallback = () => {
        el.classList.remove("_played");
        video.removeAttribute("controls");
      };
      video.addEventListener("pause", el.pauseCallback);
      el.addEventListener("click", el.clickCallback);
    },
    unbind(el) {
      const video = el.nextElementSibling;
      el.removeEventListener("click", el.clickCallback);
      video.removeEventListener("pause", el.pauseCallback);
    }
  });
  Vue.directive("tab-change", {
    inserted(el, { arg }, vnode) {
      el.clickCallback = () => {
        const triggers = document.querySelectorAll(".js-tab-trigger");
        triggers.forEach(item => item.classList.remove("_active"));
        el.classList.add("_active");
        vnode.context.$root.$emit("tab-change", arg);
      };
      el.addEventListener("click", el.clickCallback);
    },
    unbind(el) {
      el.removeEventListener("click", el.clickCallback);
    }
  });
  Vue.directive("video-slide", {
    inserted(el) {
      const video = el.querySelector(".js-video-slide-video");
      const playBtn = el.querySelector(".js-video-slide-play");

      el.clickCallback = () => {
        if (video.paused) {
          el.classList.add("is-played");
          video.play();
        } else {
          el.classList.remove("is-played");
          video.pause();
          video.currentTime = 0;
        }
      };
      playBtn.addEventListener("click", el.clickCallback);
    },
    unbind(el) {
      el.removeEventListener("click", el.clickCallback);
    }
  });
  Vue.directive("check-external-link", {
    inserted(el) {
      const absoluteRe = /^https?:\/\//i;
      const url = el.getAttribute("href");

      function toggleLinkStyle(external) {
        if (external) {
          el.classList.add("is-external-link");
          el.setAttribute("target", "_blank");
        } else {
          el.classList.add("is-internal-link");
        }
      }

      if (absoluteRe.test(url)) {
        const isExternalRegex = (() => {
          const domainRe = /https?:\/\/((?:[\w\d-]+\.)+[\w\d]{2,})/i;

          return function(url) {
            function domain(url) {
              return domainRe.exec(url) ? domainRe.exec(url)[1] : false;
            }

            return domain(location.href) !== domain(url);
          };
        })();

        toggleLinkStyle(isExternalRegex(url));
      } else {
        toggleLinkStyle(false);
      }
    }
  });
  Vue.directive("check-child-external-link", {
    inserted(el) {
      const items = el.querySelectorAll("a");

      function toggleLinkStyle(el, external) {
        if (external) {
          el.setAttribute("target", "_blank");
        }
      }

      items.forEach(link => {
        const absoluteRe = /^https?:\/\//i;
        const url = link.getAttribute("href");

        if (absoluteRe.test(url)) {
          const isExternalRegex = (() => {
            const domainRe = /https?:\/\/((?:[\w\d-]+\.)+[\w\d]{2,})/i;

            return function(url) {
              function domain(url) {
                return domainRe.exec(url) ? domainRe.exec(url)[1] : false;
              }

              return domain(location.href) !== domain(url);
            };
          })();

          toggleLinkStyle(link, isExternalRegex(url));
        } else {
          toggleLinkStyle(link, false);
        }
      });
    }
  });

  Vue.directive("click-outside", {
    bind(el, binding) {
      el.clickOutsideEvent = (event) => {
        if (!(el === event.target || el.contains(event.target))) {
          binding.value(event, el);
        }
      };
      document.body.addEventListener("click", el.clickOutsideEvent);
    },
    unbind(el) {
      document.body.removeEventListener("click", el.clickOutsideEvent);
    },
  });
}

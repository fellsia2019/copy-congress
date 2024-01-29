<template>
  <div>
    <div class="tabs__tabs" :class="[{'_decor-alt' : decorLine}, getTheme]">
      <div
        v-for="(tab, index) in tabs"
        :key="index"
        :class="['tabs__tab', {'tabs__tab_active': tab.active}, {'_openModal' : openModal}]"
        @click="select(index)"
        v-html="getTabLabel(tab)"
      >
      </div>
    </div>
    <div class="tabs__content" ref="content" :class="{'_current' : openModal}">
      <slot/>
    </div>
  </div>
</template>

<script>
import getVNodeHTML from '../utils/vnode2html';

export default {
  name: 'Tabs',
  props: {
    decorLine: { type: Boolean, default: false },
    theme: { type: String, default: '' },
  },
  data() {
    return {
      tabs: this.$children,
      openModal: false,
    };
  },
  mounted() {
    this.$root.$on('modalOpen', (idElem) => {
      let currentTab  = this.$refs.content;
      if (!currentTab) {
        return
      }
      currentTab.querySelector(`.slider-${idElem}`) ? currentTab.classList.add('_current') : '';
    });
    this.$root.$on('modalClose', (idElem) => {
      let currentTab  = this.$refs.content;
      if (!currentTab) {
        return
      }
      currentTab.querySelector(`.slider-${idElem}`) ? currentTab.classList.remove('_current') : '';
    });
  },
  methods: {
    getTabLabel(tab) {
      const { $slots: { label: [vnode] = [] } = {}, label } = tab;
      return (vnode ? getVNodeHTML(vnode) : label) || tab.title;
    },
    select(id) {
      if (this.tabs[id].noChanged) return;
      this.tabs.forEach((el, i) => {
        el.active = i === id;
      });
    },
    modalOpened() {
      this.openModal = !this.openModal;
    }
  },
  computed: {
    getTheme() {
      return this.theme ? `tabs__tabs--theme-${this.theme}` : ''
    }
  }
}
</script>

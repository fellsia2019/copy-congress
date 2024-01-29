import Vue from 'vue';

const nodeRenderer = {
  props: {
    vnode: { type: Object, defaul: null },
  },
  render() {
    return this.vnode || '';
  },
};

export default (vnode) => {
  const NodeConstructor = Vue.extend(nodeRenderer);
  const node = new NodeConstructor({
    propsData: { vnode },
  });

  node.$mount();
  const html = node.$el.outerHTML;
  node.$destroy();

  return html;
};

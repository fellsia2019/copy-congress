<script>
export default {
  name: 'InlineSvg',
  functional: true,
  props: {
    src: { type: String, required: true },
    tag: { type: String, default: 'i' },
  },
  render(h, ctx) {
    return h(ctx.props.tag, {
      ...ctx.data,
      class: [ctx.data.class, 'inline-svg'],
      domProps: {
        // eslint-disable-next-line
        innerHTML: require(`!svg-inline-loader?removeSVGTagAttrs=false!/frontend-yanao/assets/img/icons/${ctx.props.src}.svg`),
      },
    });
  },
};
</script>

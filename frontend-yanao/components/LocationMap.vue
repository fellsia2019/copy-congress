<template>
  <div class="map">
    <yandex-map
      ref="map"
      :coords="coords"
      :zoom="zoom"
      :scroll-zoom="false"
      :controls="['zoomControl']"
      @map-was-initialized="init"
    >
      <ymap-marker
        v-for="(marker, index) in markers"
        :key="index"
        :marker-id="marker.id"
        :marker-type="marker.type"
        :coords="marker.coords"
        :icon="marker.icon"
      />
    </yandex-map>
  </div>
</template>

<script>
import { yandexMap, ymapMarker } from "vue-yandex-maps";
// @link https://vue-yandex-maps.github.io/guide/

export default {
  name: "LocationMap",
  components: { yandexMap, ymapMarker },
  props: {
    markers: {
      type: Array,
      default: () => [
        {
          id: "1",
          type: "placemark",
          coords: [66.541553, 66.609872],
          icon: {
            color: "blue",
            glyph: "CircleDot"
          }
        }
      ],
    },
    zoom: {
      type: Number,
      default: 16,
    },
    coords: {
      type: Array,
      default: () => [66.541553, 66.609872],
    },
  },
  data() {
    return {
      map: null,
      settings: {
        apiKey: "",
        lang: "ru_RU",
        coordorder: "latlong",
        enterprise: false,
        version: "2.1"
      },
    };
  },
  methods: {
    init(instance) {
      this.map = instance;
    }
  }
};
</script>

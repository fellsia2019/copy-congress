<template>
  <div class="map">
    <yandex-map
      ref="map"
      :coords="coords"
      :zoom="16"
      :scroll-zoom="false"
      :controls="[]"
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
  data() {
    return {
      map: null,
      markers: [
        {
          id: "1",
          type: "placemark",
          coords: [43.414713, 39.950758],
          icon: {
            color: "blue",
            glyph: "CircleDot"
          }
        }
      ],
      settings: {
        apiKey: "",
        lang: "ru_RU",
        coordorder: "latlong",
        enterprise: false,
        version: "2.1"
      },
      coords: [43.414713, 39.950758]
    };
  },
  methods: {
    init(instance) {
      this.map = instance;
    }
  }
};
</script>

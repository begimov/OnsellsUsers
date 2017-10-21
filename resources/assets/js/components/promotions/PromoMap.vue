<template>
  <div>
    <div class="row">
      <gmap-map
      :center="center"
      :zoom="12"
      style="width: 100%; height: 500px">
        <gmap-marker
        :key="index"
        v-for="(m, index) in locations"
        :position="{lat:parseFloat(m.location[0]), lng:parseFloat(m.location[1])}"
        :clickable="true"
        :icon="(icons[m.promotion.category.parent_id])
                ? (icons[m.promotion.category.parent_id].icon)
                : (icons['default'].icon)"
        @click="updateCenter({lat:parseFloat(m.location[0]), lng:parseFloat(m.location[1])})">
        <gmap-info-window
        :opened="false">
        <a :href="`/promotions/${m.promotion.id}`">{{ m.promotion.promotionname }}</a>
        </gmap-info-window>
        </gmap-marker>
      </gmap-map>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data() {
    return {
      icons: {
        1: {
          type: "avto",
          icon: "/img/map/" + "ic_01_avto.png"
        },
        2: {
          type: "vse-dlya-doma",
          icon: "/img/map/" + "ic_02_vse-dlya-doma.png"
        },
        3: {
          type: "deti",
          icon: "/img/map/" + "ic_03_deti.png"
        },
        4: {
          type: "eda",
          icon: "/img/map/" + "ic_04_eda.png"
        },
        5: {
          type: "zoo",
          icon: "/img/map/" + "ic_05_zoo.png"
        },
        6: {
          type: "krasota-i-zdorovye",
          icon: "/img/map/" + "ic_06_krasota-i-zdorovye.png"
        },
        7: {
          type: "magaziny",
          icon: "/img/map/" + "ic_07_magaziny.png"
        },
        8: {
          type: "obuchenie",
          icon: "/img/map/" + "ic_08_obuchenie.png"
        },
        9: {
          type: "razvlecheniya",
          icon: "/img/map/" + "ic_09_razvlecheniya.png"
        },
        10: {
          type: "uslugi",
          icon: "/img/map/" + "ic_10_uslugi.png"
        },
        default: {
          icon: "/img/map/" + "ic_default.png"
        }
      }
    };
  },
  computed: {
    ...mapGetters("promotions/promomap", ["center", "locations"])
  },
  methods: {
    ...mapActions("promotions/promomap", ["updateCenter", "getLocations"])
  },
  mounted() {
    this.getLocations();
  }
};
</script>

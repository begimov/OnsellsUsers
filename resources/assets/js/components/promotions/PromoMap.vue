<template>
  <div>
    <!-- HEADER -->
    <div class="container-fluid block-map-header">
      <div class="row">
        <div class="col-sm-3 text-right align-self-center d-none d-sm-block"><button class="btn btn-success" @click.prevent="setCatalogAsActive">в каталоге</button></div>
        <div class="col-sm-6">
          <search v-model="searchQuery" v-on:input="textSearch" v-on:enterPressed="instaTextSearch"></search>
        </div>
        <div class="col-sm-3 align-self-center d-none d-sm-block"><button class="btn btn-light" disabled>на карте</button></div>
      </div>
    </div>

    <div class="container-fluid p-0">
      <div class="row">
        <div class="col p-0">

          <gmap-map
          :center="center"
          :zoom="12"
          style="width: 100%; height: 500px;">

            <gmap-marker
            :key="index"
            v-for="(m, index) in locations"
            :position="{lat:parseFloat(m.location[0]), lng:parseFloat(m.location[1])}"
            :clickable="true"
            :icon="(icons[m.promotion.category.parent_id])
                    ? (icons[m.promotion.category.parent_id].icon)
                    : (icons['default'].icon)"
            @click="clicked(index, {lat:parseFloat(m.location[0]), lng:parseFloat(m.location[1])})">

            <gmap-info-window
            @closeclick = "showInfo = []"
            :opened="showInfo[index] ? showInfo[index] : false">
              <div class="media" style="max-width:300px;">
                <div class="media-left">
                  <a href="#">
                    <a :href="`/promotions/${m.promotion.id}`" target="_blank"><img class="media-object" :src="m.promotion.small_image.path"></a>
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading" style="font-size:1.1em;"><a :href="`/promotions/${m.promotion.id}`" target="_blank">{{ m.promotion.promotionname | strLimit(25) }}</a></h4>
                  {{ m.promotion.promotiondesc | strLimit(110) }}
                </div>
              </div>     
            </gmap-info-window>
            
            </gmap-marker>

            <gmap-circle
            :center="center"
            :draggable="true"
            :editable="true"
            :radius="radius"
            :options="{
            strokeColor: '#2ea1a6',
            strokeOpacity: 0.8,
            strokeWeight: 3,
            fillColor: '#2ea1a6',
            fillOpacity: 0.1
            }"
            @radius_changed="radiusChanged"
            @dragend="centerChanged">
            </gmap-circle>

            <div slot="visible">
              <div style="bottom: 50%; left: 50%; background-color: #2ea1a6; color: white; position: absolute; z-index: 100; padding:2px 5px; font-size:0.7em; border-radius: 3px;">
                {{ radius/1000 >= 1 ? Math.round(radius/1000*100)/100 + " км" : Math.round(radius) + " м" }}
              </div>
            </div>
          </gmap-map>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script src="./promomap.js"></script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Busqueda de Restaurantes</div>

                    <div class="card-body">

                            <gmap-map
                            :center="{lat:-17.964434, lng:-67.103808}"
                            :zoom="16"
                            map-type-id="terrain"
                            style="width: 700px; height: 300px"
                            ref="googleMap"
                            >

                            </gmap-map>
                    </div>
                    <div class="card-footer">
                       <a href="" class="btn btn-primary"
                            @click="getLocation()"
                       >
                       Sacar Localización</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBCDlud_eL49CBc7jYoowFOdlnf-dpi_tw'

  },


})
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            getLocation(){
                console.log(this.$refs.googleMap.$mapObject.getCenter());
            }
        }
    }
</script>

<style lang="less">

</style>



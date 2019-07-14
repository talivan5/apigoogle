<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <label for="">Busqueda de Restaurantes</label>
                        <place-search></place-search>
                    </div>

                    <div class="card-body">

                            <gmap-map
                                :center="center"
                                :zoom="18"
                                style="width: 870px; height: 400px">

                            <gmap-marker
                                :key="index"
                                v-for="(m,index) in markers"
                                :position="m.position"
                                :clickable="true"
                                :draggable="true"
                                @click="toggleInfoWindow(m,index)">
                            </gmap-marker>


                            </gmap-map>

                    </div>
                    <div class="card-footer">
                       <a href="" id="map" class="btn btn-primary"
                            @click="initMap()"
                       >
                       Sacar Localización</a>



                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    export default {

        data(){
               return {

                center:{
                    lat:-17.964434,
                    lng:-67.103808

                    },

                markers:[
                    {
                        position: {lat:-17.964434, lng:-67.103808 }
                    },
                    {
                        position: {lat:-17.964434, lng:-67.103808 }
                    }
                ]

            }
        }


    }
</script>

<style lang="less">

</style>



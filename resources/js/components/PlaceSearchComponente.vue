<template>
<div class="input-group">
    <div class="input-group-prepend">

        <div class="input-group__input">
            <i aria-hidden="true" class="icon material-icons input-group__prepend-icon"></i>
            <gmap-autocomplete
                    class='autocomplete'
                    @place_changed="getPlace"
            >
            </gmap-autocomplete>
        </div>

    </div>

  <div class="input-group-append">


      <select class="input-group__input" v-model="radius" @change="fetchNearestLocations" >
          <option value="">Select Radius</option>
          <option value="100">100</option>
          <option value="200">200</option>
          <option value="300">300</option>
          <option value="400">400</option>
      </select>
      </div>

</div>

</template>

<script>
    export default {
        data () {
            return {
                center: {lat: 42.363211, lng: -105.071875},
                radiusOptions: [100, 200, 300],
                radius: 200
            }
        },
        methods: {
            fetchNearestLocations() {
                axios.post('/api/nearest-shops', {center: this.center,radius:this.radius})
                    .then(response => {
                        let data = response.data;
                        Bus.$emit('markers_fetched', data);
                        console.log(response);
                    });
                ;
            },
            getPlace(place){
                let center = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                };
                this.center=center;
                this.fetchNearestLocations();
            },
            onRadiusChange(){
                console.log(this.radius);
            }
        }
    }
</script>
<style scoped>
.autocomplete {
  width: 500px;
}
</style>

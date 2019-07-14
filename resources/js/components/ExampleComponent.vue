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
                       <a href="" id="map" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Restauran</a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div>
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Direccion</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Longitud</th>
                <th scope="col">Latitud</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                   <a href=""  class="btn btn-success">Editar</a>
                </td>
                <td>
                    <a href=""  class="btn btn-danger">Eliminar</a>
                </td>
                </tr>
            </tbody>
            </table>

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



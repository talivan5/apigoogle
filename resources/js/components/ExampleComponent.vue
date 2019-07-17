<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <label for="">Busqueda de Restaurantes</label>
                        <placeSearch-component></placeSearch-component>
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
                       <a href="" class="btn btn-primary" data-toggle="modal" data-target="#create" >Registrar Restaurante</a>
                    </div>
                </div>
            
                    <!-- Modal crear -->
                <form method="POST"  v-on:submit.prevent="crear">
                 <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="create">Registrar Restaurante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" v-model="name">
                            </div> 
                            <div class="form-group">                           
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" v-model="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" name="address" class="form-control" v-model="address">
                            </div>
                            <div class="form-group">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" class="form-control" v-model="city">
                            </div>
                            <div class="form-group">
                                <label for="lat">Latitud</label>
                                <input type="number" name="lat" class="form-control" v-model="lat">
                            </div>
                            <div class="form-group">
                                <label for="lng">Longitud</label>
                                <input type="number" name="lng" class="form-control" v-model="lng">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>Guardar</button>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                <!-- cierrre de crear Modal -->
                    
             <br>
            <div>
                <table class="table table-hover table-sprite">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Latitud</th>
                            <th scope="col">Longitud</th>                        
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="shop in shops" :key="shop.id">
                            <td scope="row">{{shop.id}}</td>
                            <td>{{shop.name}}</td>
                            <td> {{ shop.descripcion }}</td>
                            <td>{{shop.address}}</td>
                            <td>{{shop.city}} </td>
                            <td>{{shop.lat}} </td>
                            <td>{{shop.lng}}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" @click.prevent="modificar(shop)" data-toggle="modal" data-target="#edit">Editar</a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"  @click="elimina(shop)">Eliminar</button>
                            </td>
                            </tr>
                        </tbody>
                </table>
            </div>
            <form>
                    <div class="modal fade" id="edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="create">Actualizar Registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" v-model="shop.name">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea type="text" name="descripcion" maxlength="30" class="form-control" v-model="shop.descripcion"></textarea>
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" class="form-control" v-model="shop.address">
                                    <label for="city">Ciudad</label>
                                    <input type="text" name="city" class="form-control" v-model="shop.city">
                                    <label for="lat">Latitud</label>
                                    <input type="number" name="lat" class="form-control" v-model="shop.lat">
                                    <label for="lng">Longitud</label>
                                    <input type="number" name="lng" class="form-control" v-model="shop.lng">
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-success" @click.prevent="editar()" >Actualizar</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
            shops:[],
            name:'',
            descripcion:'',
            address:'',
            city:'',
            lat:'',
            lng:'',
            errors: [],
                shop:{
                    id:'',
                    name: '',
                    descripcion: '',
                    address: '',
                    city: '',
                    lat: '',
                    lng: '',    
                },
            center:{
                    lat:-17.964434,
                    lng:-67.103808,
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
        },
        mounted(){
            this.listar() 
        },
        methods:{
           listar(){
                let me = this;
                axios.get('http://127.0.0.1:8000/api/shops')
                .then(function(response){
                    me.shops = response.data;
                })
                .catch(function (error){
                    console.log(error);
                });
            
            },
            elimina(shop){
                let me = this;
                axios.delete('http://127.0.0.1:8000/api/shops/'+ shop.id)
                .then(function(response){
                    me.listar();
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            crear(){
                let me = this;           
                axios.post('http://127.0.0.1:8000/api/shops',
                {
                    'name':me.name,
                    'descripcion':me.descripcion,
                    'address':me.address,
                    'city':me.city,
                    'lat':me.lat,
                    'lng': me.lng
                }).then(response=> {
                    $('#create').modal('hide');
                    me.listar();
                    me.name='';
                    me.descripcion='';
                    me.address='';
                    me.city='';
                    me.lat='';
                    me.lng='';
                })
                .catch(error => {
                    me.errors = error.response.data
                });
            },
            modificar(shop){
                this.shop.id = shop.id;
                this.shop.name = shop.name;
                this.shop.descripcion = shop.descripcion;
                this.shop.address = shop.address;
                this.shop.city = shop.city;
                this.shop.lat = shop.lat;
                this.shop.lng = shop.lng;
            },
            editar(){
                let me = this;

                axios.put('http://127.0.0.1:8000/api/shops/'+ me.shop.id,
                {
                    'name':me.shop.name,
                    'descripcion':me.shop.descripcion,
                    'address':me.shop.address,
                    'city':me.shop.city,
                    'lat':me.shop.lat,
                    'lng': me.shop.lng,
                })
                .then(response =>{
                    $('#edit').modal('hide');
                    me.listar();
                    me.name='';
                    me.descripcion='';
                    me.address='';
                    me.city='';
                    me.lat='';
                    me.lng='';
                })
                .catch(error => {
                    me.errors = error.response.data
                })
            }
        }
    }   
</script>

<style lang="less">

</style>



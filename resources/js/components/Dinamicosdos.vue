<template>
    <div>
         <div class="container">


                    <div class="row">
                                <div class="col-sm-3">
                                            <i class="btn btn-success" @click="Add">Nuevo empleado</i>

                                </div>

                                <div class="col-sm-8" v-for="(em, index) in empleados">

                                    <span class="float-right btn btn-sm btn-danger" style="cursor: pointer;" @click="remove(index)">
                                        X
                                    </span>

                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                    <h4>Agregar empleado {{ index+1 }}</h4>
                                    <div class="group-form">
                                        <input type="text" class="form-control mb-2" placeholder="Nombre" v-model="em.nom">
                                        <input type="text" class="form-control mb-2" placeholder="Apellido Paterno" v-model="em.ap">
                                        <input type="text" class="form-control mb-2" placeholder="Apellido Materno" v-model="em.am">
                                        <input type="text" class="form-control mb-2" placeholder="Télefono" v-model="em.tel">
                                    </div>
                                    <hr>
                                    </form>

                                </div>
                            </div>
                     </div>

                      <div class="col-sm-3">
                                    <i class="btn btn-primary float-right" @click="Registrar">Guardar</i>
                     </div>

    </div>

</template>


<script>
    export default {
        props : ['ruta'],
        data (){
            return {

                empleados: [
                    {
                        nom: '',
                        ap:'',
                        am:'',
                        tel:''
                    }
                ],
            }
        },

        methods : {

            Add() {
                    this.empleados.push({
                         nom: '',
                         ap:'',
                         am:'',
                         tel:'',

                     });
                },
                remove(index) {
                    this.empleados.splice(index, 1);
                },

                Registrar(){

                    let me = this;

                    axios.post('http://localhost/laravel_vuejs/public/dinamicosdos/store',{
                         'data': this.empleados
                    }).then(function (response) {
                      me.Limpiar();
                    }).catch(function (error) {
                        console.log(error);
                    });
                },

                Limpiar(){
                     let me = this;
                     me.empleados.nom='';
                     me.empleados.ap='';
                     me.empleados.am='';
                     me.empleados.tel='';
                     location.reload();
                }

     }
}

</script>

<style>

</style>



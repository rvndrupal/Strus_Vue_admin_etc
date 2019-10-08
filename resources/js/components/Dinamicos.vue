<template>
    <div>
         <div class="container">


                    <div class="row">

                        <div class="col-sm-5">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="form-group" v-for="(input,k) in inputs" :key="k">
                                <input type="text" class="form-control" v-model="input.nom" placeholder="Nombre">
                                <input type="text" class="form-control" v-model="input.ap" placeholder="Apellido paterno">
                                <hr>
                                <span>
                                    <i class="btn btn-sm btn-danger" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">Delete</i>
                                    <i class="btn btn-sm btn-primary" @click="add(k)" v-show="k == inputs.length-1">Agregar</i>
                                </span>
                            </div>
                        </form>
                        </div>

                          <div class="col-sm-3">
                                    <i class="btn btn-success" @click="Registrar">Guardar</i>
                        </div>


                    </div>
            </div>

    </div>

</template>


<script>
    export default {
        props : ['ruta'],
        data (){
            return {

                inputs: [
                    {
                        nom: '',
                        ap:''
                    }
                ],
                arrayDatos:[],

            }
        },

        methods : {

            add(index) {
                    this.inputs.push({
                         nom: '',
                         ap:''
                     });
                },
                remove(index) {
                    this.inputs.splice(index, 1);
                },

                Registrar(){

                    let me = this;

                    axios.post('http://localhost/laravel_vuejs/public/dinamicos/store',{
                         'data': this.inputs
                    }).then(function (response) {
                      me.Limpiar();
                    }).catch(function (error) {
                        console.log(error);
                    });
                },

                Limpiar(){
                     let me = this;
                     me.inputs.nom='';
                     me.inputs.ap='';
                     location.reload();
                }

     }
}

</script>

<style>

</style>



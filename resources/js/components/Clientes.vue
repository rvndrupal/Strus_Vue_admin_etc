<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">

            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Clientes
                        <button type="button" @click="abrirModal('clientes','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                        <button type="button" @click="cargarPdf()" class="btn btn-info">
                            <i class="icon-doc"></i>&nbsp;Reporte
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nom">Nombre</option>
                                      <option value="ap">Ap</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarClientes(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarClientes(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Ap</th>
                                    <th>Am</th>
                                    <th>Condición</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in arrayClientes" :key="cliente.id">
                                    <td>
                                        <button type="button" @click="abrirModal('clientes','actualizar',cliente)" class="btn btn-warning btn-sm">
                                          <i class="fa fa-pencil">Editar</i>
                                        </button> &nbsp;
                                        <template v-if="cliente.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarClientes(cliente.id)">
                                                <i class="icon-trash">Desactivar</i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarClientes(cliente.id)">
                                                <i class="icon-check">Activar</i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="cliente.nom"></td>
                                    <td v-text="cliente.ap"></td>
                                    <td v-text="cliente.am"></td>
                                    <td>
                                        <div v-if="cliente.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre(*)</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nom" class="form-control" placeholder="Nombre de categoría">

                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Ap(*)</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="ap" class="form-control" placeholder="Apelllido paterno">

                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Am(*)</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="am" class="form-control" placeholder="Apellido Materno">

                                    </div>
                                </div>

                                <div v-show="errorCliente" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCliente" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarCliente()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarCliente()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->




        </main>

</template>

<script>
    export default {
        props : ['ruta'],
        data (){
            return {
                cliente_id: 0,
                nom : '',
                ap : '',
                am : '',
                arrayClientes : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCliente : 0,
                errorMostrarMsjCliente : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nom',
                buscar : ''
            }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }

                var from = this.pagination.current_page - this.offset;
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;

            }
        },
        methods : {
            listarClientes (page,buscar,criterio){
                let me=this;
                var url='http://localhost/laravel_vuejs/public/clientes/index?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayClientes = respuesta.clientes.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cargarPdf(){
                window.open(this.ruta + '/categoria/listarPdf','_blank');
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarCategoria(page,buscar,criterio);
            },
            registrarCliente(){
                if (this.validarCliente()){
                    return;
                }

                let me = this;

                axios.post('http://localhost/laravel_vuejs/public/clientes/registrar',{
                    'nom': this.nom,
                    'ap': this.ap,
                    'am': this.am,
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarClientes(1,'','nom');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarCliente(){
               if (this.validarCliente()){
                    return;
                }

                let me = this;

                axios.post('http://localhost/laravel_vuejs/public/clientes/actualizar',{
                    'nom': this.nom,
                    'ap': this.ap,
                    'am': this.am,
                    'id': this.cliente_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarClientes(1,'','nom');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            desactivarClientes(id){
               swal({
                title: 'Esta seguro de desactivar a este Cliente ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.post('http://localhost/laravel_vuejs/public/clientes/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarClientes(1,'','nom');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });


                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {

                }
                })
            },
            activarClientes(id){
               swal({
                title: 'Esta seguro de activar esta categoría?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.post('http://localhost/laravel_vuejs/public/clientes/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarClientes(1,'','nom');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });


                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {

                }
                })
            },
            validarCliente(){
                this.errorCliente=0;
                this.errorMostrarMsjCliente =[];

                if (!this.nom) this.errorMostrarMsjCliente.push("El nombre no puede estar vacío.");
                if (!this.ap) this.errorMostrarMsjCliente.push("El ap no puede estar vacío.");
                if (!this.am) this.errorMostrarMsjCliente.push("El am no puede estar vacío.");

                if (this.errorMostrarMsjCliente.length) this.errorCliente = 1;

                return this.errorCategoria;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.descripcion='';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "clientes":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Categoría';
                                this.nom= '';
                                this.ap = '';
                                this.am= '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar categoría';
                                this.tipoAccion=2;
                                this.cliente_id=data['id'];
                                this.nom = data['nom'];
                                this.ap= data['ap'];
                                this.am= data['am'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarClientes(1,this.buscar,this.criterio);
        }
    }


</script>

<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>



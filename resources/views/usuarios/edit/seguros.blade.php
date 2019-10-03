
<div class="container">
        <div class="row">
        @foreach ($use[0]->Seguros as $item=>$v)

            <div class="col-md-9">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Numero de Seguridad Social</span>
                            </div>
                        <input type="text" class="form-control" name="num_seg" id="num_seg" placeholder="Numero"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->num_seg }}">
                    </div>
            </div>

            <div class="col-md-9">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Tipo de Sangre ?</span>
                            </div>
                        <input type="text" class="form-control" name="tipo_seg" id="tipo_seg" placeholder="Sangre"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->tipo_seg }}">
                    </div>
            </div>

            <div class="col-md-12">
                <h4 class="tit_enf">Sufre de alguna Enfermedad</h4>
                @if($enfermo === "si")
                <div class="form-check">
                        <input class="form-check-inputce" style="" type="radio" name="enf_seg" id="enf_seg" value="si" checked>
                        <label class="form-check-label" for="nivel_ingles">
                        Si
                        </label>
                </div>
                <div class="form-check">
                        <input class="form-check-inputcr" style="" type="radio" name="enf_seg" id="enf_seg" value="no" >
                        <label class="form-check-label" for="nivel_ingles">
                        No
                        </label>
                </div>
                @else
                <div class="form-check">
                        <input class="form-check-inputce" style="" type="radio" name="enf_seg" id="enf_seg" value="si" >
                        <label class="form-check-label" for="nivel_ingles">
                        Si
                        </label>
                </div>
                <div class="form-check">
                        <input class="form-check-inputcr" style="" type="radio" name="enf_seg" id="enf_seg" value="no" checked>
                        <label class="form-check-label" for="nivel_ingles">
                        No
                        </label>
                </div>
                @endif
            </div>

            <div class="col-md-12">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Cual ?</span>
                            </div>
                        <input type="text" class="form-control" name="cual_enf_seg" id="cual_enf_seg" placeholder="Cual"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->cual_enf_seg }}">
                    </div>
            </div>




            <div class="col-md-12">
                    <h4 class="tit_enff">Sufre de alguna Discapacidad</h4>
                    @if($disca === "si")
                    <div class="form-check">
                            <input class="form-check-inputce" style="" type="radio" name="dis_seg" id="dis_seg" value="si" checked>
                            <label class="form-check-label" for="nivel_ingles">
                            Si
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-inputcr" style="" type="radio" name="dis_seg" id="dis_seg" value="no" >
                            <label class="form-check-label" for="nivel_ingles">
                            No
                            </label>
                    </div>
                    @else
                    <div class="form-check">
                            <input class="form-check-inputce" style="" type="radio" name="dis_seg" id="dis_seg" value="si">
                            <label class="form-check-label" for="nivel_ingles">
                            Si
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-inputcr" style="" type="radio" name="dis_seg" id="dis_seg" value="no" checked>
                            <label class="form-check-label" for="nivel_ingles">
                            No
                            </label>
                    </div>
                    @endif
                </div>

                <div class="col-md-12">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Cual ?</span>
                                </div>
                            <input type="text" class="form-control" name="cual_dis_seg" id="cual_dis_seg"
                            placeholder="Cual" aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->cual_dis_seg }}">
                        </div>
                </div>
                <div class="col-md-12">
                    <h4 class="tit_eme">Contacto de Emergencia</h4><p></p>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Nombre</span>
                                </div>
                            <input type="text" class="form-control" name="nom_seg" id="nom_seg" placeholder="Nombre"
                            aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->nom_seg }}">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Apelllido</span>
                                </div>
                            <input type="text" class="form-control" name="pri_seg" id="pri_seg" placeholder="Paterno"
                            aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->pri_seg }}">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Apellido</span>
                                </div>
                            <input type="text" class="form-control" name="seg_seg" id="seg_seg" placeholder="Materno"
                            aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->seg_seg }}">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Parentesco</span>
                                </div>
                            <input type="text" class="form-control" name="par_seg" id="par_seg" placeholder="Empleado"
                            aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->par_seg }}">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Email</span>
                                </div>
                            <input type="text" class="form-control" name="email_seg" id="email_seg" placeholder="Email"
                            aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->email_seg }}">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Telefono</span>
                                </div>
                            <input type="text" class="form-control" name="tel_seg" id="tel_seg" placeholder="Casa"
                            aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->tel_seg }}">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Telefono</span>
                                </div>
                            <input type="text" class="form-control" name="mov_seg" id="mov_seg" placeholder="Movil"
                            aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->mov_seg }}">
                        </div>
                </div>

                @endforeach

    </div>{{-- row --}}
</div>{{-- -container --}}



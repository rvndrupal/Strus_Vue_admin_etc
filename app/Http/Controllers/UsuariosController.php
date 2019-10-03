<?php

namespace App\Http\Controllers;

use App\Usuarios;
use App\Paises;
use App\Estados;
use App\Municipios;
use App\Colonias;
use App\EstadoCivil;
use App\Solteros;
use App\Escuelas;
use App\Titulos;
use App\Carreras;
use App\Grados;
use App\Idiomas;
use App\DireccionesGenerales;
use App\DireccionesAreas;
use App\DetalleLaborales;
use App\ExpLaborales;
use App\Codigos;
use App\Niveles;

use App\Http\Requests\UsuariosRequest;

use Mail;

use App\Exports\UsuariosExport;


use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;
use DB;

use Illuminate\Support\Facades\Redirect;

class UsuariosController extends Controller
{



    // public function before($user,$ability){
    //     $user = auth()->user();
    //     if($user->hasRoles(['superadministrator,alta'])){
    //         return false;
    //     }
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        //dd($user);
         $usuarios=Usuarios::with('user')
         ->where('user_id', auth()->user()->id)
         ->get();

         //dd($usuarios);

         $con=count($usuarios);

         if($user->roles[0]->name == "alta"){
            if($con >= 1){
             $user->detachRole('alta');
             $user->attachRole('Editar_alta');
            }
         }



        $title = __('Usuarios');
        return view('usuarios.index', compact('title'));


    }

    public function json () {
        if (request()->ajax()) {

        $user = auth()->user();
            if($user->roles[0]->name == "alta" || $user->roles[0]->name == "Editar_Alta"){
                $actions = 'usuarios.datatables.index';
                // return datatables()->of(Usuarios::query()->where('condicion','=','1'))->addColumn('actions', $actions) funciona
                return datatables()->of(Usuarios::query()
                     ->where('condicion','=','1')
                    ->where('user_id', auth()->user()->id))
                    ->addColumn('actions', $actions)
                    ->rawColumns(['actions'])
                    // ->orderBy('nom','ASC')
                    ->toJson();
            }else{
                $actions = 'usuarios.datatables.index';
                // return datatables()->of(Usuarios::query()->where('condicion','=','1'))->addColumn('actions', $actions) funciona
                return datatables()->of(Usuarios::query())->addColumn('actions', $actions)
                    ->rawColumns(['actions'])
                    // ->orderBy('nom','ASC')
                    ->toJson();
            }
        }
    }

    public function indexExportar(Request $request)
    {
        $title = __('Usuarios Reportes');
        $nom=$request->get('nombre');
        $ap=$request->get('ap');
        $am=$request->get('am');
        $fu=$request->get('fechauno');
        $fd=$request->get('fechados');


        $usuarios=Usuarios::orderBy('nom', 'DESC')
        ->nombre($nom)
        ->ap($ap)
        ->am($am)
        //->whereBetween('fecha_nacimiento', [$fn,$fd])
        ->fn($fu,$fd)
        ->paginate(5);




        return view('usuarios.index_exp2', compact('title','usuarios'));
    }

    public function expPdf(Request $request, $id){
        //$usuarios=Usuarios::all();  //para todos
        $usuario = Usuarios::find($id);

        $usuarios= Usuarios::findOrFail($id);
        $user = auth()->user();
        if($user->roles[0]->name == "alta"){
        $this->authorize('pass', $usuarios);
        }
        $ruta=public_path();

        $nc=[];
        $ng=[];
        $ne=[];
        $nt=[];
        foreach($usuario->DetalleEscolaridades as $item=>$v)
        {
            $id_car=$usuario->DetalleEscolaridades[$item]->carreras_id;
            $nom_car=Carreras::select('nom_car')->where('id','=',$id_car)->get();
            $ncv=$nom_car[0]->nom_car;
            array_push($nc, $ncv);

            $id_gra=$usuario->DetalleEscolaridades[$item]->grados_id;
            $nom_gra=Grados::select('nom_gra')->where('id','=',$id_gra)->get();
            $ngv=$nom_gra[0]->nom_gra;
            array_push($ng, $ngv);

            $id_esc=$usuario->DetalleEscolaridades[$item]->escuelas_id;
            $nom_esc=Escuelas::select('nombre_escuela')->where('id','=',$id_esc)->get();
            $nev=$nom_esc[0]->nombre_escuela;
            array_push($ne, $nev);

            $id_titulo=$usuario->DetalleEscolaridades[$item]->titulos_id;
            $nom_titulo=Titulos::select('nombre_titulo')->where('id','=',$id_titulo)->get();
            $ntv=$nom_titulo[0]->nombre_titulo;
            array_push($nt, $ntv);
        }

        $idi=[];
        foreach($usuario->DetalleIdiomas as $item=>$v)
        {
            $id_idiomas=$usuario->DetalleIdiomas[$item]->idiomas_id;
            $nom_idi=Idiomas::select('nombre_idioma')->where('id','=',$id_idiomas)->get();
            $nid=$nom_idi[0]->nombre_idioma;
            array_push($idi, $nid);
        }
        //dd($ruta);

         // DATOS LABORALES
         $dge=[];
         $dga=[];
         $estl=[];
         $munl=[];
         $coll=[];
         $copl=[];


             $id_dge=$usuario->DetalleLaborales[0]->direcciones_generales_id;
             $nom_dge=DireccionesGenerales::select('nombre_dir_gen')->where('id','=',$id_dge)->get();
             $ndge=$nom_dge[0]->nombre_dir_gen;
             array_push($dge, $ndge);

             $id_dga=$usuario->DetalleLaborales[0]->direcciones_areas_id;
             $nom_dga=DireccionesAreas::select('nombre_dir_are')->where('id','=',$id_dga)->get();
             $ndga=$nom_dga[0]->nombre_dir_are;
             array_push($dga, $ndga);

             $id_estl=$usuario->DetalleLaborales[0]->est_lab;
             $nom_estl=Estados::select('nombre')->where('id','=',$id_estl)->get();
             $nestl=$nom_estl[0]->nombre;
             array_push($estl, $nestl);

             $id_munl=$usuario->DetalleLaborales[0]->mun_lab;
             $nom_munl=Municipios::select('nombre_mun')->where('id','=',$id_munl)->get();
             $nmunl=$nom_munl[0]->nombre_mun;
             array_push($munl, $nmunl);

             $id_coll=$usuario->DetalleLaborales[0]->col_lab;
             $nom_coll=Colonias::select('nombre_col')->where('id','=',$id_coll)->get();
             $ncoll=$nom_coll[0]->nombre_col;
             array_push($coll, $ncoll);

             $id_coll=$usuario->DetalleLaborales[0]->col_lab;
             $nom_cop=Colonias::select('codigo_postal')->where('id','=',$id_coll)->get();
             $ncopl=$nom_cop[0]->codigo_postal;


             $codi=$usuario->DetalleLaborales[0]->codigo_puesto;
             $nom_codigo=Codigos::select('nom_codigos')->where('id','=',$codi)->get();
             $ncodi=$nom_codigo[0]->nom_codigos;

             $nive=$usuario->DetalleLaborales[0]->grado_nivel;
             $nom_nivel=Niveles::select('nom_niveles')->where('id','=',$nive)->get();
             $nnive=$nom_nivel[0]->nom_niveles;

        $pdf=PDF::loadView('pdf.usuarios',compact('usuario','ruta','nc','ng','ne','nt','idi','ncodi','nnive','dge','dga',
        'estl','munl','coll','ncopl'));
        return $pdf->download('usuario.pdf');

    }


    public function listaAdmin(){
        $title = __('Usuarios');
        return view('usuarios.indexAdmin', compact('title'));
    }

    public function jsonAdmin () {
        if (request()->ajax()) {
            $actions = 'usuarios.datatables.indexAdminAction';

            return datatables()->of(Usuarios::query()->where('condicion','=','1'))->addColumn('actions', $actions)
            // return datatables()->of(Usuarios::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }



     //mostrar los municipios
     public function municipios(Request $request, $id){

        if (request()->ajax()) {

        $municipios=Municipios::orderBy('nombre_mun','ASC')->select('id','nombre_mun')->where('estados_id','=',$id)->get();

         return response()->json($municipios);

        }
    }

      //mostrar colonias
      public function colonias(Request $request, $id){

        if (request()->ajax()) {

        $colonias=Colonias::orderBy('nombre_col','ASC')->select('id','nombre_col','codigo_postal')->where('municipios_id','=',$id)->get();

         return response()->json($colonias);

        }
    }


    //mostrar cp
    public function cp(Request $request, $id){

        if (request()->ajax()) {

        $cp=Colonias::orderBy('codigo_postal','ASC')->select('codigo_postal')->where('id','=',$id)->get();

         return response()->json($cp);

        }
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('Crear Carnet');
        $usuarios = new Usuarios;

       $pais=Paises::orderBy('id','ASC')->select('id','nombre_pais')->get();
       $estados=Estados::orderBy('nombre','ASC')->select('id','nombre')->where('condicion','=','1')->get();
       $escuelas=Escuelas::orderBy('id','ASC')->select('id','nombre_escuela')->get();
       $titulos=Titulos::orderBy('id','ASC')->select('id','nombre_titulo')->get();
       $grados=Grados::orderBy('id','ASC')->select('id','nom_gra')->get();
       $escuelas=Escuelas::orderBy('id','ASC')->select('id','nombre_escuela')->get();
       $carreras=Carreras::orderBy('id','ASC')->select('id','nom_car')->get();
       $idiomas=Idiomas::orderBy('id','ASC')->select('id','nombre_idioma')->get();
       $estadoCivil=EstadoCivil::orderBy('id','ASC')->select('id','nombre')->get();

       $dg=DireccionesGenerales::orderBy('id','ASC')->select('id','nombre_dir_gen')->get();
       $da=DireccionesAreas::orderBy('id','ASC')->select('id','nombre_dir_are')->get();
       $co=Codigos::orderBy('id','ASC')->select('id','nom_codigos')->get();
       $ni=Niveles::orderBy('id','ASC')->select('id','nom_niveles')->get();

        //dd($usuarios);

        return view('usuarios.form', compact('usuarios', 'title','estados','estadoCivil','pais','escuelas','titulos','carreras','grados','escuelas','idiomas','dg','da','co'
        ,'ni','opCivil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request)
    {
        // $rules = array(
        //     'nom'       =>  'required',
        //     'ap'      =>  'required',
        //     'am'   =>  'required',
        //     'curp'   =>  'required',
        //     'rfc'   =>  'required',
        //     'foto'  => 'required',
        //     'fecha_nacimiento' => 'required',
        //     'calle'  => 'required',
        //     'numero'  => 'required',
        //     'pais' => 'requerid'

        // );

        // $error = Validator::make($request->all(), $rules);

        // if($error->fails())
        // {
        //     return response()->json(['errors' => $error->errors()->all()]);
        // }




        // $form_data = array(
        //     'nom'        =>  $request->nom,
        //     'ap'         =>  $request->ap,
        //     'am'             =>  $request->am,
        //     'curp'             =>  $request->curp,
        //     'rfc'             =>  $request->rfc,
        //     'fecha_nacimiento'  => $request->fecha_nacimiento,
        //     'calle'  => $request->calle,
        //     'numero'  => $request->numero,
        //     'condicion'  => '1',
        // );
        //dd($request->opcionciviles_id);

        $usuario = Usuarios::create($request->all());
        //  $usuario->pais()->attach($request->get('pais'));
         //Handle File Upload

         if($request->hasFile('foto')){

            $filenamewithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('foto')->guessClientExtension();
            $fileNameToStore = time().'.'.$extension;
            $path = $request->file('foto')->storeAs('Fotos/Usuarios',$fileNameToStore);
            $usuario->foto=$fileNameToStore;
         }

         if ($request->hasfile('carga_rfc')) {
            $filenamewithExt = $request->file('carga_rfc')->getClientOriginalName();
            $usuario->carga_rfc=$request->carga_rfc->storeAs('RFC',$filenamewithExt);
         }

         if ($request->hasfile('carga_curp')) {
            $filenamewithExt = $request->file('carga_curp')->getClientOriginalName();
            $usuario->carga_curp=$request->carga_curp->storeAs('CURP',$filenamewithExt);
         }


         if ($request->hasfile('carga_ife')) {
            $filenamewithExt = $request->file('carga_ife')->getClientOriginalName();
            $usuario->carga_ife=$request->carga_ife->storeAs('IFE',$filenamewithExt);
         }

         if ($request->hasfile('carga_domicilio')) {
            $filenamewithExt = $request->file('carga_domicilio')->getClientOriginalName();
            $usuario->carga_domicilio=$request->carga_domicilio->storeAs('DOMICILIO',$filenamewithExt);
         }

        //  //opcion civil
        //  $opci=$request->opcionciviles_id;
        //  if($opci==null){
        //     $opci=0;
        //  }
        //  else{
        //      $opci=$request->opcionciviles_id;
        //  }

        // $usuario->Opcionciviles->create([
        //     'opcionciviles_id'=>$opci
        // ]);



         //carga hijos
         if(isset($request->nombre_hijo))
         {
                foreach($request->nombre_hijo as $item=>$v)
                {
                    $nom_hijo=$request->nombre_hijo[$item];
                    $curp_hijo=$request->curp_hijo[$item];
                    $cch=$request->carga_curp_hijo[$item];


                    if($nom_hijo=="0" || $nom_hijo==""){
                    $nom_hijo=0;
                    }else{
                    $nom_hijo=$request->nombre_hijo[$item];
                    }

                    if($curp_hijo=="0" || $curp_hijo=="")
                    {
                    $curp_hijo=0;
                    }else{
                    $curp_hijo=$request->curp_hijo[$item];
                    }

                    if($cch==""){$cch=0;}else{
                        $file_curp_hijo =$cch->getClientOriginalName();
                        $cch=$request->carga_curp_hijo[$item]->storeAs('CURPHIJOS',$file_curp_hijo);
                    }

                    $usuario->solteros()->create([
                    'nombre_hijo'=>$nom_hijo,
                    'curp_hijo'=>$curp_hijo,
                    'carga_curp_hijo'=>$cch
                    ]);
                }
        }



        if(isset($request->nombres_coy))
        {
                $nom=$request->nombres_coy;
                $primero=$request->primero_coy;
                $segundo=$request->segundo_coy;
                $curp=$request->curp_coy;
                $curp_carga=$request->carga_curp_coy;

                //dd($curp_carga);

                if($nom==""){$nom=0;}else{$nom=$request->nombres_coy;}
                if($primero==""){$primero=0;}else{$primero=$request->primero_coy;}
                if($segundo==""){$segundo=0;}else{$segundo=$request->segundo_coy;}
                if($curp==""){$curp=0;}else{$curp=$request->curp_coy;}
                if($curp_carga==""){$curp_carga=0;}else{
                $filenamewithExt =$curp_carga->getClientOriginalName();
                $curp_carga=$request->carga_curp_coy->storeAs('CURPCONYUGES',$filenamewithExt);
                }



                $usuario->conyuges()->create([
                    'nombres_coy'=>$nom,
                    'primero_coy'=>$primero,
                    'segundo_coy'=>$segundo,
                    'curp_coy'=>$curp,
                    'carga_curp_coy'=>$curp_carga

                ]);
         }

        //  if(isset($request->nombre_hijo_coy))
        //  {
        //         foreach($request->nombre_hijo_coy as $item=>$v)
        //         {

        //             $nom=$request->nombre_hijo_coy[$item];
        //             $edad=$request->edad_hijo_coy[$item];

        //             //dd($edad);

        //             if($nom=="0" || $nom==""){
        //             $nom=0;
        //             }else{
        //             $nom=$request->nombre_hijo_coy[$item];
        //             }

        //             if($edad=="0" || $edad=="")
        //             {
        //             $edad=0;
        //             }else{
        //             $edad=$request->edad_hijo_coy[$item];
        //             }

        //             $usuario->HijosConyuges()->create([
        //             'nombre_hijo_coy'=>$nom,
        //             'edad_hijo_coy'=>$edad
        //             ]);

        //         }
        // }

        if(isset($request->nombre_des))
         {
                foreach($request->nombre_des as $item=>$v)
                {
                    $nom=$request->nombre_des[$item];
                    $ap=$request->ap_des[$item];
                    $am=$request->am_des[$item];                    //dd($edad);

                    if($nom==""){$nom=0;}else{$nom=$request->nombre_des[$item];}
                    if($ap==""){$ap=0;}else{$ap=$request->ap_des[$item];}
                    if($am==""){$am=0;}else{$am=$request->am_des[$item];}

                    $usuario->Descensientes()->create([
                    'nombre_des'=>$nom,
                    'ap_des'=>$ap,
                    'am_des'=>$am
                    ]);
                }
        }

        //Dependientes Casados
         if(isset($request->nombre_dep))
         {
                foreach($request->nombre_dep as $item=>$v)
                {
                    $nom_dep=$request->nombre_dep[$item];
                    $ap_dep=$request->ap_dep[$item];
                    $am_dep=$request->am_dep[$item];                    //dd($edad);

                    if($nom_dep==""){$nom_dep=0;}else{$nom_dep=$request->nombre_dep[$item];}
                    if($ap_dep==""){$ap_dep=0;}else{$ap_dep=$request->ap_dep[$item];}
                    if($am_dep==""){$am_dep=0;}else{$am_dep=$request->am_dep[$item];}

                    $usuario->DependientesCasados()->create([
                    'nombre_dep'=>$nom_dep,
                    'ap_dep'=>$ap_dep,
                    'am_dep'=>$am_dep
                    ]);
                }
        }




        if(isset($request->grados_id))
        {
            foreach($request->grados_id as $item=>$v)
            {
                  //dd($request->carga_titulo);
                $carga_titulo=$request->carga_titulo[$item];
                $carga_cedula=$request->carga_cedula[$item];
                    if($carga_titulo != 0)
                    {
                        $filenamewithExt = $request->carga_titulo[$item]->getClientOriginalName();
                        $carga_titulo=$request->carga_titulo[$item]->storeAs('TITULOPROFESIONAL',$filenamewithExt);
                    }
                    else{
                        $carga_titulo=0;
                    }

                    if($carga_cedula !=0)
                    {
                        $filenameCed = $request->carga_cedula[$item]->getClientOriginalName();
                        $carga_cedula=$request->carga_cedula[$item]->storeAs('CEDULA',$filenameCed);
                    }
                    else
                    {
                        $carga_cedula=0;
                    }


                $usuario->DetalleEscolaridades()->create([
                    'titulos_id'=>$request->titulos_id[$item],
                    'carreras_id'=>$request->carreras_id[$item],
                    'escuelas_id'=>$request->escuelas_id[$item],
                    'grados_id'=>$request->grados_id[$item],
                    'cedula'=>$request->cedula[$item],
                    'carga_titulo'=>$carga_titulo,
                    'carga_cedula'=>$carga_cedula,
                    ]);
            }
        }

        if(isset($request->idiomas_id))
        {
            foreach($request->idiomas_id as $item=>$v)
            {
                $filenameCce = $request->carga_certificado[$item]->getClientOriginalName();
                $usuario->DetalleIdiomas()->create([
                    'idiomas_id'=>$request->idiomas_id[$item],
                    'carga_certificado'=>$request->carga_certificado[$item]->storeAs('CERT_IDIOMAS',$filenameCce),
                    'nivel_ingles'=>$request->nivel_ingles[$item],
                    ]);
            }
        }


        //laborales
        $usuario->DetalleLaborales()->create([
            'puesto_actual'=>$request->puesto_actual,
            'codigo_puesto'=>$request->codigo_puesto,
            'grado_nivel'=>$request->grado_nivel,
            'direcciones_generales_id'=>$request->direcciones_generales_id,
            'direcciones_areas_id'=>$request->direcciones_areas_id,
            'fecha_ultimo'=>$request->fecha_ultimo,
            'fecha_senasica'=>$request->fecha_senasica,
            'calle_lab'=>$request->calle_lab,
            'num_lab'=>$request->num_lab,
            'col_lab'=>$request->col_lab,
            'fecha_gobierno'=>$request->fecha_gobierno,
            'mun_lab'=>$request->mun_lab,
            'est_lab'=>$request->est_lab,
            'cod_lab'=>$request->cod_lab,
            ]);


        if(isset($request->den_puesto))
        {
            foreach($request->den_puesto as $item=>$v)
            {
                    //dd($request->carga_titulo);
                    $fileDocPuesto = $request->doc_puesto[$item]->getClientOriginalName();
                $usuario->ExpLaborales()->create([
                    'den_puesto'=>$request->den_puesto[$item],
                    'ins_puesto'=>$request->ins_puesto[$item],
                    'area_puesto'=>$request->area_puesto[$item],
                    'anos_puesto'=>$request->anos_puesto[$item],
                    'fecha_ing_puesto'=>$request->fecha_ing_puesto[$item],
                    'fecha_baj_puesto'=>$request->fecha_baj_puesto[$item],
                    'doc_puesto'=>$request->doc_puesto[$item]->storeAs('DOCPUESTO',$fileDocPuesto),
                    ]);
            }
        }

        //seguro social
        $cual_enf=$request->cual_enf_seg;
        $cual_dis=$request->cual_dis_seg;

        if($cual_enf==""){$cual_enf="Ninguna Enfermedad";}else{$cual_enf;}
        if($cual_dis==""){$cual_dis="Ninguna Discapacidad";}else{$cual_dis;}



        $usuario->Seguros()->create([
            'num_seg'=>$request->num_seg,
            'enf_seg'=>$request->enf_seg,
            'cual_enf_seg'=>$cual_enf,
            'tipo_seg'=>$request->tipo_seg,
            'dis_seg'=>$request->dis_seg,
            'cual_dis_seg'=>$cual_dis,
            'nom_seg'=>$request->nom_seg,
            'pri_seg'=>$request->pri_seg,
            'seg_seg'=>$request->seg_seg,
            'par_seg'=>$request->par_seg,
            'email_seg'=>$request->email_seg,
            'tel_seg'=>$request->tel_seg,
            'mov_seg'=>$request->mov_seg,
            ]);

         $usuario->save();

         //enviar correo
        // $data=array(
        //     'name'=>"Rodrigo villanueva",
        // );

        //  Mail::send('usuarios.email' ,$data, function($men){
        //     $men->from('adminsitrador_carnets@gmail.com','Alta del registro de Carnet');
        //     $men->to('rodrigodrupal1@gmail.com')->subject('Prueba de alta de carnet');
        // });

         $title = __('Usuarios');

    //    return view('usuarios.index',compact('title'));

      return redirect(route('usuarios.index'))->with('message', [
        'success', __("Usuario creado con Exito")
        ]);



        // return response()->json(['success' => 'Dato guardado correctamente.']);

    }


    public function cards()
    {
        $title = __('Carnets');
        return view('usuarios.cards2',compact('title'));
    }

    public function cardsAction(Request $request)
    {

        if($request->ajax())
        {
            $output = '';

            $query = $request->get('query');
            if($query != '')
            {



                $data = DB::table('usuarios')

                    ->orwhere('nom', 'like', '%'.$query.'%')->where('condicion','=',1)
                    ->orWhere('ap', 'like', '%'.$query.'%')->where('condicion','=',1)
                    ->orWhere('am', 'like', '%'.$query.'%')->where('condicion','=',1)
                    ->orWhere('rfc', 'like', '%'.$query.'%')->where('condicion','=',1)
                    ->orWhere('curp', 'like', '%'.$query.'%')->where('condicion','=',1)

                    ->orderBy('nom', 'desc')

                    ->get();

            }
            else
            {
            $data = DB::table('usuarios')
                ->orderBy('nom', 'desc')
                ->where('condicion','=',1)
                ->get();
            }

                $total_row = $data->count();
                if($total_row > 0)
                {
                   $uri ='/recursos/public/Fotos/Usuarios/';
                    foreach($data as $row)

                    {
                        $output .= '
                            <div class="card bg-secondary text-white text-left ">
                                <a href="./show/'.$row->id.'">
                                    <img src="'.$uri.$row->foto.'"  class="card-img-top" alt="'.$row->nom.'">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Nombre: '.$row->nom.'</h5>
                                    <p class="card-text">Apellido paterno:  '.$row->ap.'</p>
                                    <p class="card-text">ID:  '.$row->id.'</p>
                                    <p class="card-text">Fecha de creación:  '.$row->created_at.'</p>
                                </div>

                            </div>
                        ';
                    }
                }
                else
                {
                    $output = '

                      <h2>  No hay resultados</h2>

                ';
                }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }//cards

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Usuarios $usuarios, $id)
    {
        $title = __('Usuario');
        $user = auth()->user();
        $usuario= Usuarios::find($id);
       // dd($usuario);
        // if($user->roles[0]->name == "alta"){
        // $this->authorize('pass', $usuario);
        // }

            $nt=[];//Los valores en array pasados
            $nc=[];
            $ne=[];
            $ng=[];

            foreach($usuario->DetalleEscolaridades as $item=>$v)
            {
                 $id_titulo=$usuario->DetalleEscolaridades[$item]->titulos_id;
                $nom_titulo=Titulos::select('nombre_titulo')->where('id','=',$id_titulo)->get();
                $ntv=$nom_titulo[0]->nombre_titulo;
                array_push($nt, $ntv);



                $id_car=$usuario->DetalleEscolaridades[$item]->carreras_id;
                $nom_car=Carreras::select('nom_car')->where('id','=',$id_car)->get();
                $ncv=$nom_car[0]->nom_car;
                array_push($nc, $ncv);

                $id_esc=$usuario->DetalleEscolaridades[$item]->escuelas_id;
                $nom_esc=Escuelas::select('nombre_escuela')->where('id','=',$id_esc)->get();
                $nev=$nom_esc[0]->nombre_escuela;
                array_push($ne, $nev);

                $id_gra=$usuario->DetalleEscolaridades[$item]->grados_id;
                $nom_gra=Grados::select('nom_gra')->where('id','=',$id_gra)->get();
                $ngv=$nom_gra[0]->nom_gra;
                array_push($ng, $ngv);
            }

            // $total=count($ng);

            //idiomas
            $idi=[];
            foreach($usuario->DetalleIdiomas as $item=>$v)
            {
                $id_idiomas=$usuario->DetalleIdiomas[$item]->idiomas_id;
                $nom_idi=Idiomas::select('nombre_idioma')->where('id','=',$id_idiomas)->get();
                $nid=$nom_idi[0]->nombre_idioma;
                array_push($idi, $nid);
            }
            $totalidi=count($idi);




            // DATOS LABORALES
            $dge=[];
            $dga=[];
            $estl=[];
            $munl=[];
            $coll=[];




                $id_dge=$usuario->DetalleLaborales[0]->direcciones_generales_id;
                $nom_dge=DireccionesGenerales::select('nombre_dir_gen')->where('id','=',$id_dge)->get();
                $ndge=$nom_dge[0]->nombre_dir_gen;
                array_push($dge, $ndge);

                $id_dga=$usuario->DetalleLaborales[0]->direcciones_areas_id;
                $nom_dga=DireccionesAreas::select('nombre_dir_are')->where('id','=',$id_dga)->get();
                $ndga=$nom_dga[0]->nombre_dir_are;
                array_push($dga, $ndga);

                $id_estl=$usuario->DetalleLaborales[0]->est_lab;
                $nom_estl=Estados::select('nombre')->where('id','=',$id_estl)->get();
                $nestl=$nom_estl[0]->nombre;
                array_push($estl, $nestl);

                $id_munl=$usuario->DetalleLaborales[0]->mun_lab;
                $nom_munl=Municipios::select('nombre_mun')->where('id','=',$id_munl)->get();
                $nmunl=$nom_munl[0]->nombre_mun;
                array_push($munl, $nmunl);

                $id_coll=$usuario->DetalleLaborales[0]->col_lab;
                $nom_coll=Colonias::select('nombre_col')->where('id','=',$id_coll)->get();
                $ncoll=$nom_coll[0]->nombre_col;
                array_push($coll, $ncoll);

                $id_coll=$usuario->DetalleLaborales[0]->col_lab;
                $nom_cop=Colonias::select('codigo_postal')->where('id','=',$id_coll)->get();
                $ncopl=$nom_cop[0]->codigo_postal;

                $codi=$usuario->DetalleLaborales[0]->codigo_puesto;
                $nom_codigo=Codigos::select('nom_codigos')->where('id','=',$codi)->get();
                $ncodi=$nom_codigo[0]->nom_codigos;

                $nive=$usuario->DetalleLaborales[0]->grado_nivel;
                $nom_nivel=Niveles::select('nom_niveles')->where('id','=',$nive)->get();
                $nnive=$nom_nivel[0]->nom_niveles;


            $total_Exp=count($usuario->ExpLaborales);
             $total_Esc=count($usuario->DetalleEscolaridades);
            //dd($total_Esc);
            //dd($usuario->DetalleEscolaridades[0]->cedula);

            // $des=$usuario->nom."-".$usuario->ap."-".$usuario->am;



           //dd($usuario->DependientesCasados);

        // return view('usuarios.show',compact('usuario','title','nc','ng','total','ne','nt','idi','totalidi','dge','dga','munl','estl','coll','total_Exp'
        // ,'ncodi','nnive','total_Esc','des','ncopl'));

        //  return view('usuarios.show',compact('usuario','title','nc','ng','total','ne','nt','idi','totalidi'
        // ,'total_Esc','ncodi'));


        return view('usuarios.show',compact('usuario','title','total_Esc','ng','nc','ne','nt','totalidi','idi','ncodi','nnive','dge',
       'dga','estl','munl','coll','ncopl','total_Exp'));
    }

    //show2
    public function show2(Request $request, Usuarios $usuarios, $id)
    {
        $title = __('Usuario');
        $user = auth()->user();
        $usuario= Usuarios::find($id);
       // dd($usuario);
        // if($user->roles[0]->name == "alta"){
        // $this->authorize('pass', $usuario);
        // }

            $nt=[];//Los valores en array pasados
            $nc=[];
            $ne=[];
            $ng=[];

            foreach($usuario->DetalleEscolaridades as $item=>$v)
            {
                 $id_titulo=$usuario->DetalleEscolaridades[$item]->titulos_id;
                $nom_titulo=Titulos::select('nombre_titulo')->where('id','=',$id_titulo)->get();
                $ntv=$nom_titulo[0]->nombre_titulo;
                array_push($nt, $ntv);



                $id_car=$usuario->DetalleEscolaridades[$item]->carreras_id;
                $nom_car=Carreras::select('nom_car')->where('id','=',$id_car)->get();
                $ncv=$nom_car[0]->nom_car;
                array_push($nc, $ncv);

                $id_esc=$usuario->DetalleEscolaridades[$item]->escuelas_id;
                $nom_esc=Escuelas::select('nombre_escuela')->where('id','=',$id_esc)->get();
                $nev=$nom_esc[0]->nombre_escuela;
                array_push($ne, $nev);

                $id_gra=$usuario->DetalleEscolaridades[$item]->grados_id;
                $nom_gra=Grados::select('nom_gra')->where('id','=',$id_gra)->get();
                $ngv=$nom_gra[0]->nom_gra;
                array_push($ng, $ngv);
            }

            // $total=count($ng);

            //idiomas
            $idi=[];
            foreach($usuario->DetalleIdiomas as $item=>$v)
            {
                $id_idiomas=$usuario->DetalleIdiomas[$item]->idiomas_id;
                $nom_idi=Idiomas::select('nombre_idioma')->where('id','=',$id_idiomas)->get();
                $nid=$nom_idi[0]->nombre_idioma;
                array_push($idi, $nid);
            }
            $totalidi=count($idi);




            // DATOS LABORALES
            $dge=[];
            $dga=[];
            $estl=[];
            $munl=[];
            $coll=[];




                $id_dge=$usuario->DetalleLaborales[0]->direcciones_generales_id;
                $nom_dge=DireccionesGenerales::select('nombre_dir_gen')->where('id','=',$id_dge)->get();
                $ndge=$nom_dge[0]->nombre_dir_gen;
                array_push($dge, $ndge);

                $id_dga=$usuario->DetalleLaborales[0]->direcciones_areas_id;
                $nom_dga=DireccionesAreas::select('nombre_dir_are')->where('id','=',$id_dga)->get();
                $ndga=$nom_dga[0]->nombre_dir_are;
                array_push($dga, $ndga);

                $id_estl=$usuario->DetalleLaborales[0]->est_lab;
                $nom_estl=Estados::select('nombre')->where('id','=',$id_estl)->get();
                $nestl=$nom_estl[0]->nombre;
                array_push($estl, $nestl);

                $id_munl=$usuario->DetalleLaborales[0]->mun_lab;
                $nom_munl=Municipios::select('nombre_mun')->where('id','=',$id_munl)->get();
                $nmunl=$nom_munl[0]->nombre_mun;
                array_push($munl, $nmunl);

                $id_coll=$usuario->DetalleLaborales[0]->col_lab;
                $nom_coll=Colonias::select('nombre_col')->where('id','=',$id_coll)->get();
                $ncoll=$nom_coll[0]->nombre_col;
                array_push($coll, $ncoll);

                $id_coll=$usuario->DetalleLaborales[0]->col_lab;
                $nom_cop=Colonias::select('codigo_postal')->where('id','=',$id_coll)->get();
                $ncopl=$nom_cop[0]->codigo_postal;

                $codi=$usuario->DetalleLaborales[0]->codigo_puesto;
                $nom_codigo=Codigos::select('nom_codigos')->where('id','=',$codi)->get();
                $ncodi=$nom_codigo[0]->nom_codigos;

                $nive=$usuario->DetalleLaborales[0]->grado_nivel;
                $nom_nivel=Niveles::select('nom_niveles')->where('id','=',$nive)->get();
                $nnive=$nom_nivel[0]->nom_niveles;


            $total_Exp=count($usuario->ExpLaborales);
             $total_Esc=count($usuario->DetalleEscolaridades);
            //dd($total_Esc);
            //dd($usuario->DetalleEscolaridades[0]->cedula);

            // $des=$usuario->nom."-".$usuario->ap."-".$usuario->am;



           //dd($usuario->DependientesCasados);

        // return view('usuarios.show',compact('usuario','title','nc','ng','total','ne','nt','idi','totalidi','dge','dga','munl','estl','coll','total_Exp'
        // ,'ncodi','nnive','total_Esc','des','ncopl'));

        //  return view('usuarios.show',compact('usuario','title','nc','ng','total','ne','nt','idi','totalidi'
        // ,'total_Esc','ncodi'));


        return view('usuarios.show2',compact('usuario','title','total_Esc','ng','nc','ne','nt','totalidi','idi','ncodi','nnive','dge',
       'dga','estl','munl','coll','ncopl','total_Exp'));
    }

    //show2

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios, $id)
    {
        $validusu=Usuarios::find($id);

        $this->authorize('permisoEditar', $validusu);


        $use=Usuarios::where('id','=',$id)->get();
        $usuarios= Usuarios::findOrFail($id);
        $user = auth()->user();
        if($user->roles[0]->name == "alta"){
        $this->authorize('pass', $usuarios);
        }


        //pais
       $paiss=Paises::orderBy('id','ASC')->select('id','nombre_pais')->get();
       $estadoss=Estados::orderBy('nombre','ASC')->select('id','nombre')->where('condicion','=','1')->get();
       $muns=Municipios::orderBy('nombre_mun','ASC')->select('id','nombre_mun')->where('condicion','=','1')->get();
       $cols=Colonias::orderBy('nombre_col','ASC')->select('id','nombre_col')->where('condicion','=','1')->get();
    //    $escuelas=Escuelas::orderBy('id','ASC')->select('id','nombre_escuela')->get();
      $tituloss=Titulos::orderBy('id','ASC')->select('id','nombre_titulo')->get();
      $gradoss=Grados::orderBy('id','ASC')->select('id','nom_gra')->get();
      $escuelass=Escuelas::orderBy('id','ASC')->select('id','nombre_escuela')->get();
      $carrerass=Carreras::orderBy('id','ASC')->select('id','nom_car')->get();
      $idiomass=Idiomas::orderBy('id','ASC')->select('id','nombre_idioma')->get();
        $estCS=EstadoCivil::orderBy('id','ASC')->select('id','nombre')->get();
       // $opcCiv=Opcionciviles::orderBy('id','ASC')->select('id','opcion_civil')->get();
    //    $estadoCivil=EstadoCivil::orderBy('id','ASC')->select('id','nombre')->get();
          $dg=DireccionesGenerales::orderBy('id','ASC')->select('id','nombre_dir_gen')->get();
          $da=DireccionesAreas::orderBy('id','ASC')->select('id','nombre_dir_are')->get();
          $cos=Codigos::orderBy('id','ASC')->select('id','nom_codigos')->get();
          $ni=Niveles::orderBy('id','ASC')->select('id','nom_niveles')->get();


       $sel_pais=$use[0]->paises_id;
       $s_est=$use[0]->estados_id;
       $s_mun=$use[0]->municipios_id;
       $s_col=$use[0]->colonias_id;
       $s_civ=$use[0]->estado_civils_id;
       $s_opv=$use[0]->opcionciviles_id;
       //rfc
       $edi_rfc=$use[0]->carga_rfc;
       $rfc_sub=substr($edi_rfc,4);


        //dd($use[0]->DetalleEscolaridades);



       $s_carreras=$use[0]->DetalleEscolaridades[0]->carreras_id;
       $s_escuelas=$use[0]->DetalleEscolaridades[0]->escuelas_id;
       $s_tt=$use[0]->DetalleEscolaridades[0]->titulos_id;
       $s_idioma=$use[0]->DetalleIdiomas[0]->idiomas_id;
       $s_ni=$use[0]->DetalleIdiomas[0]->nivel_ingles;

       $codi=$use[0]->DetalleLaborales[0]->codigo_puesto;
       $nom_codigo=Codigos::select('nom_codigos')->where('id','=',$codi)->get();
       $ncodi=$nom_codigo[0]->nom_codigos;

       $nivel=$use[0]->DetalleLaborales[0]->grado_nivel;
       $nom_nivel=Niveles::select('nom_niveles')->where('id','=',$nivel)->get();
       $nivell=$nom_nivel[0]->nom_niveles;

       $id_dge=$use[0]->DetalleLaborales[0]->direcciones_generales_id;
       $nom_dge=DireccionesGenerales::select('nombre_dir_gen')->where('id','=',$id_dge)->get();
       $ndge=$nom_dge[0]->nombre_dir_gen;

       $id_dga=$use[0]->DetalleLaborales[0]->direcciones_areas_id;
       $nom_dga=DireccionesAreas::select('nombre_dir_are')->where('id','=',$id_dga)->get();
       $ndga=$nom_dga[0]->nombre_dir_are;

       $id_estl=$use[0]->DetalleLaborales[0]->est_lab;
       $nom_estl=Estados::select('nombre')->where('id','=',$id_estl)->get();
       $nestl=$nom_estl[0]->nombre;

       $id_munl=$use[0]->DetalleLaborales[0]->mun_lab;
       $nom_munl=Municipios::select('nombre_mun')->where('id','=',$id_munl)->get();
       $nmunl=$nom_munl[0]->nombre_mun;

       $id_coll=$use[0]->DetalleLaborales[0]->col_lab;
       $nom_coll=Colonias::select('nombre_col')->where('id','=',$id_coll)->get();
       $ncoll=$nom_coll[0]->nombre_col;

       $enfermo=$use[0]->Seguros[0]->enf_seg;
       $disca=$use[0]->Seguros[0]->dis_seg;

       $uid=$use[0]->id;

       //dd($nestl);

       //dd($use[0]->DetalleEscolaridades);


        return view('usuarios.editar',compact('use','paiss','sel_pais','rfc_sub','estadoss','s_est','muns','s_mun','cols','s_col'
        ,'estCS','s_civ','s_opv','opcCiv','gradoss','grados_A','carrerass','s_carreras','escuelass','s_escuelas','tituloss','s_tt'
        ,'idiomass','s_idioma','s_ni','cos','ncodi','ni','nivell','dg','ndge','da','ndga','estadoss','nestl','muns','nmunl','cols','ncoll'
    ,   'enfermo','disca','uid','s_grados','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //dd($id);
        $title = __('Actualizar');
        $usuario = Usuarios::find($id);

        // dd($usuario);
        $user = auth()->user();

        $this->authorize('permisoEditar', $usuario);



        $usuario->fill($request->all())->save();

        if($request->hasFile('foto')){

            $filenamewithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('foto')->guessClientExtension();
            $fileNameToStore = time().'.'.$extension;
            $path = $request->file('foto')->storeAs('Fotos/Usuarios',$fileNameToStore);
            $usuario->foto=$fileNameToStore;
         }

         if ($request->hasfile('carga_rfc')) {
            $filenamewithExt = $request->file('carga_rfc')->getClientOriginalName();
            $usuario->carga_rfc=$request->carga_rfc->storeAs('RFC',$filenamewithExt);
         }

         if ($request->hasfile('carga_curp')) {
            $filenamewithExt = $request->file('carga_curp')->getClientOriginalName();
            $usuario->carga_curp=$request->carga_curp->storeAs('CURP',$filenamewithExt);
         }

         if ($request->hasfile('carga_ife')) {
            $filenamewithExt = $request->file('carga_ife')->getClientOriginalName();
            $usuario->carga_ife=$request->carga_ife->storeAs('IFE',$filenamewithExt);
         }

         if ($request->hasfile('carga_domicilio')) {
            $filenamewithExt = $request->file('carga_domicilio')->getClientOriginalName();
            $usuario->carga_domicilio=$request->carga_domicilio->storeAs('DOMICILIO',$filenamewithExt);
         }


         //carga hijos ok
         $usuario->solteros()->delete($id);

         if(isset($request->nombre_hijo))
         {
                foreach($request->nombre_hijo as $item=>$v)
                {
                    $rec=$request->rec_img[$item];
                    $valr=substr($rec,10);
                    $rr="CURPHIJOS/".$valr;
                    $nom_hijo=$request->nombre_hijo[$item];
                    $curp_hijo=$request->curp_hijo[$item];
                    $cch=(isset($request->carga_curp_hijo[$item]))?"true" : "false";

                   // var_dump($cch);

                    if($cch=="true")
                    {
                        $cch=$request->carga_curp_hijo[$item];
                        $file_curp_hijo =$cch->getClientOriginalName();
                        $cch=$request->carga_curp_hijo[$item]->storeAs('CURPHIJOS',$file_curp_hijo);
                    }
                    else if($cch=="false")
                    {
                        $cch=$rr;
                    }

                    if($nom_hijo=="0" || $nom_hijo==""){
                    $nom_hijo=0;
                    }else{
                    $nom_hijo=$request->nombre_hijo[$item];
                    }

                    if($curp_hijo=="0" || $curp_hijo=="")
                    {
                    $curp_hijo=0;
                    }else{
                    $curp_hijo=$request->curp_hijo[$item];
                    }

                    $usuario->solteros()->create([
                    'nombre_hijo'=>$nom_hijo,
                    'curp_hijo'=>$curp_hijo,
                    'carga_curp_hijo'=>$cch
                    ]);
                }
        }

        //conyuges
        $usuario->conyuges()->delete($id);
        if(isset($request->nombres_coy))
        {
                $rcoy=$request->rec_curp_coy;
                $nom=$request->nombres_coy;
                $primero=$request->primero_coy;
                $segundo=$request->segundo_coy;
                $curp=$request->curp_coy;
                $ccoy=(isset($request->carga_curp_coy))?"true" : "false";
                //$curp_carga=$request->carga_curp_coy;

                //dd($curp_carga);

                if($nom==""){$nom=0;}else{$nom=$request->nombres_coy;}
                if($primero==""){$primero=0;}else{$primero=$request->primero_coy;}
                if($segundo==""){$segundo=0;}else{$segundo=$request->segundo_coy;}
                if($curp==""){$curp=0;}else{$curp=$request->curp_coy;}

                if($ccoy=="true")
                {
                    $ccoy=$request->carga_curp_coy;
                    $filenamewithExt =$ccoy->getClientOriginalName();
                    $ccoy=$request->carga_curp_coy->storeAs('CURPCONYUGES',$filenamewithExt);
                }
                else if($ccoy=="false")
                {
                    $ccoy=$rcoy;
                }

                $usuario->conyuges()->create([
                    'nombres_coy'=>$nom,
                    'primero_coy'=>$primero,
                    'segundo_coy'=>$segundo,
                    'curp_coy'=>$curp,
                    'carga_curp_coy'=>$ccoy

                ]);
         }


         //borramos dependientes y se vuelve a crear
         $usuario->Descensientes()->delete($id);

          if(isset($request->nombre_des))
          {
                 foreach($request->nombre_des as $item=>$v)
                 {
                     $nom=$request->nombre_des[$item];
                     $ap=$request->ap_des[$item];
                     $am=$request->am_des[$item];                    //dd($edad);

                     if($nom==""){$nom=0;}else{$nom=$request->nombre_des[$item];}
                     if($ap==""){$ap=0;}else{$ap=$request->ap_des[$item];}
                     if($am==""){$am=0;}else{$am=$request->am_des[$item];}

                     $usuario->Descensientes()->create([
                     'nombre_des'=>$nom,
                     'ap_des'=>$ap,
                     'am_des'=>$am
                     ]);
                 }
         }


        //borramos escolaridad y se vuelve a crear
        $usuario->DetalleEscolaridades()->delete($id);

         if(isset($request->grados_id))
         {
             foreach($request->grados_id as $item=>$v)
             {
                $rec_tit=$request->rec_titulo[$item];
                $rec_ced=$request->rec_cedula[$item];
                $vtit=substr($rec_tit,18);
                $vced=substr($rec_ced,7);
                $rtit="TITULOPROFESIONAL/".$vtit;
                $rced="CEDULA/".$vced;


                 $car_tit=(isset($request->carga_titulo[$item]))?"true" : "false";
                 $car_ced=(isset($request->carga_cedula[$item]))?"true" : "false";


                 if($car_tit=="true")
                 {
                    $carga_titulo=$request->carga_titulo[$item];
                    $file_tit = $carga_titulo->getClientOriginalName();
                    $carga_titulo=$request->carga_titulo[$item]->storeAs('TITULOPROFESIONAL',$file_tit);
                 }
                 else{
                     $carga_titulo=$rtit;
                 }

                 if($car_ced=="true"){
                    $carga_cedula=$request->carga_cedula[$item];
                    $filenameCed = $carga_cedula->getClientOriginalName();
                    $carga_cedula=$request->carga_cedula[$item]->storeAs('CEDULA',$filenameCed);
                 }else{
                    $carga_cedula=$rced;
                 }

                 $usuario->DetalleEscolaridades()->create([
                     'titulos_id'=>$request->titulos_id[$item],
                     'carreras_id'=>$request->carreras_id[$item],
                     'escuelas_id'=>$request->escuelas_id[$item],
                     'grados_id'=>$request->grados_id[$item],
                     'cedula'=>$request->cedula[$item],
                     'carga_titulo'=>$carga_titulo,
                     'carga_cedula'=>$carga_cedula,
                     ]);
             }
         }

         //borramos idioma
        $usuario->DetalleIdiomas()->delete($id);

         if(isset($request->idiomas_id))
         {
             foreach($request->idiomas_id as $item=>$v)
             {

                $rec_idi=$request->rec_idioma[$item];
                $vidi=substr($rec_idi,13);
                //dd($vidi);
                $ridi="CERT_IDIOMAS/".$vidi;

                $car_cer=(isset($request->carga_certificado[$item]))?"true" : "false";

                if($car_cer=="true")
                {
                    $carga_certificado=$request->carga_certificado[$item];
                    $filencer =$carga_certificado->getClientOriginalName();
                    $carga_certificado=$request->carga_certificado[$item]->storeAs('CERT_IDIOMAS',$filencer);
                }
                else{
                    $carga_certificado=$ridi;
                }

                 $usuario->DetalleIdiomas()->create([
                     'idiomas_id'=>$request->idiomas_id[$item],
                     'carga_certificado'=>$carga_certificado,
                     'nivel_ingles'=>$request->nivel_ingles[$item],
                     ]);
             }
         }

         //Laborales.
          //laborales
        $usuario->DetalleLaborales()->delete($id);
        $usuario->DetalleLaborales()->create([
            'puesto_actual'=>$request->puesto_actual,
            'codigo_puesto'=>$request->codigo_puesto,
            'grado_nivel'=>$request->grado_nivel,
            'direcciones_generales_id'=>$request->direcciones_generales_id,
            'direcciones_areas_id'=>$request->direcciones_areas_id,
            'fecha_ultimo'=>$request->fecha_ultimo,
            'fecha_senasica'=>$request->fecha_senasica,
            'calle_lab'=>$request->calle_lab,
            'num_lab'=>$request->num_lab,
            'col_lab'=>$request->col_lab,
            'fecha_gobierno'=>$request->fecha_gobierno,
            'mun_lab'=>$request->mun_lab,
            'est_lab'=>$request->est_lab,
            'cod_lab'=>$request->cod_lab,
            ]);


          //borramos Experiencia laboral
        $usuario->ExpLaborales()->delete($id);
         if(isset($request->den_puesto))
        {
            foreach($request->den_puesto as $item=>$v)
            {

                $rec_puesto=$request->rec_puesto[$item];
                $vpue=substr($rec_puesto,10);
                //dd($vpuesto);
                $rpue="DOCPUESTO/".$vpue;

                $car_puesto=(isset($request->doc_puesto[$item]))?"true" : "false";

                if($car_puesto=="true")
                {
                    $doc_puesto=$request->doc_puesto[$item];
                    $filendoc =$doc_puesto->getClientOriginalName();
                    $doc_puesto=$request->doc_puesto[$item]->storeAs('DOCPUESTO',$filendoc);
                }
                else{
                    $doc_puesto=$rpue;
                }

                $usuario->ExpLaborales()->create([
                    'den_puesto'=>$request->den_puesto[$item],
                    'ins_puesto'=>$request->ins_puesto[$item],
                    'area_puesto'=>$request->area_puesto[$item],
                    'anos_puesto'=>$request->anos_puesto[$item],
                    'fecha_ing_puesto'=>$request->fecha_ing_puesto[$item],
                    'fecha_baj_puesto'=>$request->fecha_baj_puesto[$item],
                    'doc_puesto'=>$doc_puesto
                    ]);
            }
        }

        //seguro social
        $usuario->Seguros()->delete($id);
        $cual_enf=$request->cual_enf_seg;
        $cual_dis=$request->cual_dis_seg;

        if($cual_enf==""){$cual_enf="Ninguna Enfermedad";}else{$cual_enf;}
        if($cual_dis==""){$cual_dis="Ninguna Discapacidad";}else{$cual_dis;}



        $usuario->Seguros()->create([
            'num_seg'=>$request->num_seg,
            'enf_seg'=>$request->enf_seg,
            'cual_enf_seg'=>$cual_enf,
            'tipo_seg'=>$request->tipo_seg,
            'dis_seg'=>$request->dis_seg,
            'cual_dis_seg'=>$cual_dis,
            'nom_seg'=>$request->nom_seg,
            'pri_seg'=>$request->pri_seg,
            'seg_seg'=>$request->seg_seg,
            'par_seg'=>$request->par_seg,
            'email_seg'=>$request->email_seg,
            'tel_seg'=>$request->tel_seg,
            'mov_seg'=>$request->mov_seg,
            ]);

        $usuario->condicion='1';

        $usuario->save();

        return view('usuarios.index',compact('title'));
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios,  $id)
    {
        dd($id);
    }

    public function desactivar($id)
    {
        $usuario= Usuarios::findOrFail($id);
        $usuario->condicion='0';
        $usuario->save();
        $title = __('Usuarios');
        // return view('usuarios.index',compact('title'));
        return Redirect::back();
    }

    public function activar($id)
    {
        $usuario= Usuarios::findOrFail($id);
        $usuario->condicion='1';
        $usuario->save();
        $title = __('Usuarios');
        // return view('usuarios.index',compact('title'));
        return Redirect::back();
    }

    public function exportarExcel()
    {
        return Excel::download(new UsuariosExport, 'usuarios.xlsx');

    }

    public function index_exp(){
        $title = __('Usuarios Reportes 3');
        return view('usuarios.index_exp', compact('title'));
    }

    public function usuarios_expp(Request $request)
    {
        if (request()->ajax()) {

            $user = auth()->user();
                if($user->roles[0]->name == "alta" || $user->roles[0]->name == "Editar_Alta"){
                    $actions = 'usuarios.datatables.index2';
                    // return datatables()->of(Usuarios::query()->where('condicion','=','1'))->addColumn('actions', $actions) funciona
                    return datatables()->of(Usuarios::query()
                         ->where('condicion','=','1')
                        ->where('user_id', auth()->user()->id))
                        ->addColumn('actions', $actions)
                        ->rawColumns(['actions'])
                        // ->orderBy('nom','ASC')
                        ->toJson();
                }else{
                    $actions = 'usuarios.datatables.index2';
                    // return datatables()->of(Usuarios::query()->where('condicion','=','1'))->addColumn('actions', $actions) funciona
                    return datatables()->of(Usuarios::query())->addColumn('actions', $actions)
                        ->rawColumns(['actions'])
                        // ->orderBy('nom','ASC')
                        ->toJson();
                }
            }

    }





}

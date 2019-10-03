<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Usuarios;
use App\Role;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $usuarios=User::all();
        // foreach($usuarios as $user){
        //     if($user->condicion == 1){
        //        // $user->attachRole('alta');
        //     }
        // }

        // $user=User::with('usuarios')->get();

        // //dd($user[3]->usuarios->nom);

        // foreach($user->usuarios as $item){
        //         dd($item);
        //      }



        $title = __('Usuarios');
        return view('user.index', compact('title'));
    }


    public function json () {
        $user = auth()->user();
        if($user->id == 1){
            if (request()->ajax()) {

                $actions = 'user.datatables.index';
                return datatables()->of(User::query())->addColumn('actions', $actions)
                    ->rawColumns(['actions'])
                    ->toJson();
            }
        }else{
            if (request()->ajax()) {

                $actions = 'user.datatables.index';
                return datatables()->of(User::query()->where('id','!=','1'))->addColumn('actions', $actions)
                    ->rawColumns(['actions'])
                    ->toJson();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        $title = __('Crear Usuario');
        $user = new User;
        return view('user.form', compact('user', 'title','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->password= bcrypt( $request->input("password") );

        $user->roles()->sync($request->get('roles'));

        //$user->attachRole('alta');

        $user->save();

        return redirect()->route('user.index')->with('message', [
            'success', __("Usuario creado correctamente")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = __('Actualizar Usuario');
        $user = User::find($id);
        $roles = Role::all();
        return view('user.form', compact('user', 'title','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            $user = User::findOrFail($id);
            hooks()->do_action('before_update_user', $user);

            $user->fill($request->input())->save();

            $user->password= bcrypt($request->password);

            $user->save();

            hooks()->do_action('after_update_user', $user);
            $user->roles()->sync($request->get('roles'));
            \DB::commit();
            return redirect(route('user.index'))->with('message', [
                'success', __("Usuario actualizado correctamente")
            ]);
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect(route('user.index'))->with('message', [
                'danger', __(sprintf("Error actualizando la categoría: %s", $exception->getMessage()))
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (request()->ajax()) {
        //     if (auth()->user()->can('delete-user')) {
        //         try {
        //             \DB::beginTransaction();
        //             $user = User::find($id);

        //             hooks()->add_action('before_delete_user', $user);
        //             $user->delete();
        //             hooks()->add_action('after_delete_category', $id);
        //             \DB::commit();
        //         } catch (\Exception $exception) {
        //             \DB::rollBack();
        //             //TODO hacer lo que sea necesario
        //         }
        //     }
        // } else {
        //     abort(401);
        // }
        // if(auth()->id() == 1)
        // {
        //     abort("No se puede borrar al SuperAdmin");
        // }


            $user = User::find($id);
            $user->delete();
            return redirect(route('user.index'))->with('message', [
                'success', __("Usuario borrado correctamente")
            ]);



    }

    public function cargarUser()
    {
        $title = __('Importar nuevo Usuarios');
        return view('user.import_user',compact('title'));
    }
    public function importarUser()
    {
        Excel::import(new UsersImport, request()->file('file'));

        return redirect(route('user.index'))->with('message', [
            'success', __("Usuarios importados Correctamente")
        ]);
    }


    public function desactivar($id)
    {
        $usuario= User::findOrFail($id);
        $usuario->condicion='0';
        $usuario->detachRole('alta');
        $usuario->detachRole('Editar_Alta');
        $usuario->save();
        $title = __('Usuario');
        // return view('usuarios.index',compact('title'));
        return Redirect::back();
    }

    public function activar($id)
    {
        $usuario= User::findOrFail($id);

        $ver=Usuarios::with('user')
         ->where('user_id', $id)
         ->get();

         $con=count($ver);
         //dd($con);

        if($con >= 1){
            $usuario->attachRole('Editar_alta');
            $usuario->condicion='1';
        }
        else{
            $usuario->attachRole('alta');
            $usuario->condicion='1';
        }

        $usuario->save();
        $title = __('Usuarios');
        // return view('usuarios.index',compact('title'));
        return Redirect::back();
    }


}

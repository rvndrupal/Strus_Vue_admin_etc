<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {

        $this->middleware('guest')->except('logout');



        // $user = User::find(auth()->id());
        // if($user)
        // {
        // $user->is_logged = false;
		// $user->save();

		// $this->guard()->logout();

		// $request->session()->invalidate();

		// return $this->loggedOut($request) ?: redirect('/login');

        // }


    }

    //para cambiar el registro de login
    public function username()
    {
        // return 'email'; Cambiar a rfc_login
        return 'rfc_login';
    }

    //para usuario unico
     /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_logged) {
			$this->guard()->logout(); //cerramos la sesión
			$request->session()->invalidate();
            session()->flash('message', ['danger', 'Ya hay un usuario identificado con esta cuenta']);
			return redirect('/login');
		} else {
			$user->is_logged = true;
            $user->save();

            // $data = Session::all(); //usando el Facade
            // dd($data);
            // var_dump($data);

		}
		return redirect($this->redirectPath());
    }

    /**
	 * Log the user out of the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{
		$user = User::find(auth()->id());
		$user->is_logged = false;
		$user->save();

		$this->guard()->logout();

		$request->session()->invalidate();

		return $this->loggedOut($request) ?: redirect('/login');
	}

	/**
	 * The user has logged out of the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed
	 */
	protected function loggedOut(Request $request)
	{

		session()->flash('message', ['success', 'Has cerrado sesión correctamente']);
		return redirect('/login');
	}


}

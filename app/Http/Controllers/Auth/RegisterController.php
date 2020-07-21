<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','can:create user','isActive']);
    }
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showRegistrationForm()
    {
        $positions = Position::get();
        return view('auth.register', compact('positions'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'position' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function register(Request $request)
    {
        // dd($request);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('register')->with('status','Usuario Registrado Correctamente, Recuerda Activarlo en la sesión ');
    }
    protected function guard()
    {
        return Auth::guard();
    }
    protected function registered(Request $request, $user)
    {

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
    //  * @return \App\User
     */
    protected function create(array $data)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $userCreate = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'position_id' => $data['position'],
            'active' => 0,
            'password' => Hash::make($data['password']),
            'slug' => $data['name'].'_'.substr(str_shuffle($permitted_chars), 0, 4),
            'email_verified_at' => now(),
        ]);
        $user = User::where('id',$userCreate->id)->first();
        if ($user->position_id == 2) {
            $user->givePermissionTo(['create register','view register']);
            // return $user;
        }else{
            $user->givePermissionTo(['create register','edit register','delete register','create user','delete user','view register']);
        }
        // return $user;
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Validator;

use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware {

    public static function middleware(): array {
        return [
            new Middleware(middleware: 'auth', except: ['index', 'show']),
        ];
    }

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['signUp', 'getByEmail']]);
    }

    public function getByEmail(Request $request) {
        $email = $request->query('email');
        $password = $request->query('password');

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        $user = User::where('email', $email)->first();
        // $token = User::attempt($credentials);
        return "asd";
    }

    public function signUp(Request $request){

        $body = $request->all()['user'];

        $validatedData = $request->validate([
            'user.firstName' => 'required|string',
            'user.lastName' => 'required|string',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|string|min:8'
        ]);


        // $validatedData = Validator::make($body, [
        //     'firstName' => 'required|string',
        //     'lastName' => 'required|string',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8'
        // ]);


        $user = User::create([
            'firstName' => $validatedData['user']['firstName'],
            'lastName' => $validatedData['user']['lastName'],
            'email' => $validatedData['user']['email'],
            'password' => bcrypt($validatedData['user']['password']),
        ]);


        return $user;
    }
}


// <?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Models\User;

// use Validator;


// class AuthController extends Controller {

//     public function signUp(Request $request){

//         $body = $request->all()['user'];

//         // $validatedData = $body->validate([
//         //     'firstName' => 'required|string',
//         //     'lastName' => 'required|string',
//         //     'email' => 'required|email|unique:users,email',
//         //     'password' => 'required|string|min:8'
//         // ]);
//         $validatedData = Validator::make($body, [
//             'firstName' => 'required|string',
//             'lastName' => 'required|string',
//             'email' => 'required|email|unique:users,email',
//             'password' => 'required|string|min:8'
//         ]);

//         $user = User::create([
//             'firstName' => $validatedData['firstName'],
//             'lastName' => $validatedData['firstName'],
//             'email' => $validatedData['email'],
//             'password' => bcrypt($validatedData['password']),
//         ]);


//         return $user;
//     }
// }

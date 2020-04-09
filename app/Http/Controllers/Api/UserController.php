<?php
  
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
// use App\Models\User;
use App\Http\Controllers\API\BaseController;
use Laravel\Passport\HasApiTokens;
class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Auth::attempt(['email'=> request('email'),'password'=> request('password')])
            // (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            // return response
            $response = [
                'success' => true,
                'message' => 'User login successful',
                'email' => $request->email,
            ];
            return response()->json($response, 200);
        } else {
            // return response
            $response = [
                'success' => false,
                'message' => 'Unauthorised',
            ];
            return response()->json($response, 404);
        }
    }
    // public function login()
    // {
    //     if(Auth::attempt(['email'=> request('email'),'password'=> request('password')])){
    //         // $user = Auth::user();
    //         // $token = $user->createToken('HMI App')->accessToken;
    //         // $status = 200;
    //         $authenticated_user = \Auth::user();
    //         $user = User::find($authenticated_user->id);
    //         $token=$user->createToken('myApp')->accessToken;
    //         $status = 200;
    //     }else{
    //         $token = 'unauthorize';
    //         $status = 401;
    //     }
    //     return response()->json(['token' => $token],$status);
    // }
    // public function login()
    // {

    //     $response = $this->getAccessTokenResponse($this->getCode());
    //     $user = $this->mapUserToObject($this->getUserByToken(
    //         $token = Arr::get($response, 'access_token')
    //     ));
    //     return $user->setToken($token)
    //                 ->setRefreshToken(Arr::get($response, 'refresh_token'))
    //                 ->setExpiresIn(Arr::get($response, 'expires_in'));
    // }
}
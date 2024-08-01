<?php

namespace  Modules\User\App\Http\Controllers\Api;

use App\Core\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\App\Http\Requests\Auth\LoginRequest;
use Modules\User\App\Models\User;
use Modules\User\App\Http\Requests\Auth\Api\ApiRegisterRequest;
use Modules\User\App\Transformers\UserResource;
use Modules\User\App\Http\Requests\Profile\Api\UpdateProfile;

class UserController extends ApiController
{
    public function register(ApiRegisterRequest $request){
        $user = User::create($request->validated());
        $user->assignRole("user");
        /*$user->sendEmailVerificationNotification();*/
        return $this->successResponse(null,trans("user::index.registered"),201);
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password],$request->remember_me)){
            $response = [
                "user" => UserResource::make(auth()->user()),
                "token" => auth()->user()->createToken("pat")->plainTextToken
            ];
            return $this->successResponse($response);
        }
        return $this->errorResponse(trans("user::index.errors.not_found"),400);
    }


    public function verify_resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return $this->successResponse(null, 'Onaylama e-postası terkardan gönderildi.');
    }

    public function profile()
    {
        return $this->successResponse(UserResource::make(auth()->user()));
    }

    public function profile_post(UpdateProfile $request)
    {
        $user = User::find(auth()->user()->id);
        $user->fill($request->validated());
        if($request->has("password")){
            if($user->password != Hash::make($request->password)){
                $user->password = Hash::make($request->password);
            }else{
                return $this->errorResponse(trans("user::index.errors.not_same_pass_with_old"),400);
            }

        }

        if($request->hasFile("profile_pic")){
            $user
                ->addMedia($request->file("profile_pic"))
                ->usingFileName($user->username.".".$request->file("profile_pic")->extension())
                ->toMediaCollection("profile_pic");
        }

        $user->save();

        return $this->successResponse(UserResource::make($user),200);
    }
}

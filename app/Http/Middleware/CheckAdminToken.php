<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrait;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAdminToken
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // make user null value
        $user = null;
        try{
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e){
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this-> returnError('E3001',trans('auth.tokenInvalid'));  // 'INVALID_TOKEN'
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->returnError('E3001', trans('auth.tokenExpired')); //'EXPIRED_TOKEN'
            } else {
                return $this->returnError('E3001',trans('auth.tokenNotFound')); // 'TOKEN_NOTFOUND'
            }
        }

        // If not user
        if(!$user){
            return $this->returnError('E3001',trans('auth.unauthenticetd'));
        }

        return $next($request);
    }
}

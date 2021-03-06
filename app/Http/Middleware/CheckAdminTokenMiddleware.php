<?php

namespace App\Http\Middleware;

use App\Triads\GeneralTriads;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class CheckAdminTokenMiddleware
{
    use GeneralTriads;
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this -> returnError('E3001','INVALID_TOKEN');
            }
            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this -> returnError('E3001','EXPIRED_TOKEN');
            }
            else {
                return $this -> returnError('E3001','TOKEN_NOTFOUND');
            }
        } catch (\Throwable $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this -> returnError('E3001','INVALID_TOKEN');
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this -> returnError('E3001','EXPIRED_TOKEN');
            } else {
                return $this -> returnError('E3001','TOKEN_NOTFOUND');
            }
        }

        if (!$user)
            $this -> returnError(trans('Unauthenticated'),'error');
        return $next($request);
    }
}

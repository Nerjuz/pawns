<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\BadCredentialsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\TokenResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @throws BadCredentialsException
     */
    public function __invoke(AuthRequest $request): TokenResource
    {
        try {
            $user = User::where('email', $request->get('email'))->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new BadCredentialsException();
        }

        if (! Hash::check($request->get('password'), $user->password)) {
            throw new BadCredentialsException();
        }

        $token = $user->createToken('api');

        return new TokenResource($token);
    }
}

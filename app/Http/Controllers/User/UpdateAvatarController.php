<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UpdateAvatarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $avatar = null;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store();
        }

        $request->user()->update([
            'avatar' => $avatar,
        ]);

        return UserResource::make($request->user());
    }
}

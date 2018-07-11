<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user = fractal($user, new UserTransformer())->toArray();
        return response()->json($user);
    }
}

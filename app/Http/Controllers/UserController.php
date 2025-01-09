<?php

namespace App\Http\Controllers;

use App\Events\UserDeleteEvent;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //
    public function home()
    {
        $users = User::query()
            ->when(request()->search, function ($query) {
                $query->whereAny(['name', 'email', 'id'], 'like', '%' . request()->search . '%');
            })
            ->orderBy("created_at", 'desc')
            ->paginate(10)->withQueryString();
        return Inertia::render('Home', [
            'users' => $users,
            'search_key' => request()->search,
            'can' => [
                'delete-user' => Auth::user() ? Auth::user()->can('delete',Auth::user()) : null,
            ]
        ]);
    }

    public function destory(User $user)
    {
        Gate::authorize('delete', $user);
        event(new UserDeleteEvent($user));
        return back()->with('message', 'delete success!');
    }
}

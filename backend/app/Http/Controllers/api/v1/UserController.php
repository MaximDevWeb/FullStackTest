<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UsersRequest;
use App\Http\Resources\User\UsersCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersRequest $request): UsersCollection
    {
        $users = Cache::remember(
            'users_' . $request->getQueryString(),
            now()->addMinutes(60),
            function() use ($request) {
                return User::query()
                    ->sort($request)
                    ->filterName($request)
                    ->filterActive($request)
                    ->filterActivityDate($request)
                    ->paginate($request->per_page ?? 25);
                }
        );

        return new UsersCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

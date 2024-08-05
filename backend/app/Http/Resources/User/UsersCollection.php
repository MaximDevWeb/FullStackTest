<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BasicCollection;
use Illuminate\Http\Request;

class UsersCollection extends BasicCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => $this->meta,
        ];
    }
}
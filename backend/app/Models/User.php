<?php

namespace App\Models;

use App\Http\Requests\User\UsersRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Model
{
    use HasFactory;

    protected function lastActivityAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => date('d.m.Y', strtotime($value)),
        );
    }

    public function scopeSort(Builder $query, UsersRequest $request): void
    {
        if ($request->sort_by) {
            $query->orderBy($request->sort_by, $request->sort_direction ?? 'asc');
        } else {
            $query->orderBy('id');
        }
    }

    public function scopeFilterName(Builder $query, UsersRequest $request): void
    {
        if ($request->name) {
            $query->whereLike('full_name', "%$request->name%");
        }
    }

    public function scopeFilterActive(Builder $query, UsersRequest $request): void
    {
        if ($request->active === '1') {
            $query->where('active', true);
        }
    }

    public function scopeFilterActivityDate(Builder $query, UsersRequest $request): void
    {
        if ($request->activity_from) {
            $query->whereDate('last_activity_at', ">=" , $request->activity_from);
        }

        if ($request->activity_to) {
            $query->whereDate('last_activity_at', "<=" , $request->activity_to);
        }
    }
}

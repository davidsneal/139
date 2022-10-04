<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait GlobalScope
{
    /**
     * Boot the trait.
     *
     * @return void
     */
    public static function bootGlobalScope(): void
    {
        static::addGlobalScope('account', function (Builder $builder) {
            $builder->when(request()?->user()?->id, function ($q) {
                $q->where('id', request()->user()->id);
            });
        });
    }
}

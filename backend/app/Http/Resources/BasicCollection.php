<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class BasicCollection extends ResourceCollection
{
    protected array $meta;

    public function __construct(LengthAwarePaginator $resource)
    {
        $this->meta = [
            'total' => $resource->total(),
        ];

        $resource = $resource->getCollection();
        parent::__construct($resource);
    }
}
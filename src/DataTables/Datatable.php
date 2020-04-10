<?php

namespace Dash\DataTables;

use Illuminate\Database\Query\Builder;

abstract class Datatable
{
    /**
     * The query builder object
     *
     * @return Builder
     */
    abstract public function query();

    /**
     * Use query function result to return a new json result for datatable
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function build()
    {
        return datatables($this->query())->toJson();
    }

    /**
     * Generate the datatable json response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function generate()
    {
        return (new static())->build();
    }
}


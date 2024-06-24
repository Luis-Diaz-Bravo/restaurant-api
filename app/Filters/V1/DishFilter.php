<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class DishFilter extends ApiFilter
{
    /**
     * Listado de columnas permitidas para el filtrado
     * además de los operadores válidos a usar sobre
     * estas columnas.
     */
    protected $safeParams = [
        'name' => ['eq', 'like'],
        'price' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];

    /**
     * Se correlaciona los nombres de las columnas dados
     * en la query con los de las tabla en la base de datos
     */
    protected $columnMap = [
        'updatedAt' => 'updated_at',
    ];

    /**
     * Se correlaciona los operadores dados en la query
     * con los equivalentes para Eloquent
     */
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'like' => 'like',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *    schema="  ",
 *       @OA\Property(property="id", type="number", example=1),
 *       @OA\Property(property="name", type="string", example="Получение продуктов"),
 *       @OA\Property(property="url", type="string", example="john@test.com"),
 *       @OA\Property(property="query", type="string", example="?limit=20&sort=-id"),
 *       @OA\Property(property="method", type="enum", enum={"GET", "POST", "PUT", "PATCH", "DELETE"}, example="GET"),
 *       @OA\Property(property="created_at", type="datetime", example="2022-06-28 06:06:17"),
 *       @OA\Property(property="updated_at", type="datetime", example="2022-06-28 06:06:17"),
 *    )
 * )
 */
class Api extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'query',
        'method',
    ];
}

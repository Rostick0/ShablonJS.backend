<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *    schema="RuleSchema",
 *       @OA\Property(property="id", type="number", example=1),
 *       @OA\Property(property="name", type="string", example="Минимум 5 символов"),
 *       @OA\Property(property="value", type="string", example="min:5"),
 *       @OA\Property(property="created_at", type="datetime", example="2022-06-28 06:06:17"),
 *       @OA\Property(property="updated_at", type="datetime", example="2022-06-28 06:06:17"),
 *    )
 * )
 */
class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
    ];
}

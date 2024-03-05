<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *    schema="MaskSchema",
 *       @OA\Property(property="id", type="number", example=1),
 *       @OA\Property(property="maska", type="string", example="S*"),
 *       @OA\Property(property="tokens", type="string", example="S:[0-9]:multiple"),
 *       @OA\Property(property="is_reversed", type="boolean", example="1"),
 *       @OA\Property(property="created_at", type="datetime", example="2022-06-28 06:06:17"),
 *       @OA\Property(property="updated_at", type="datetime", example="2022-06-28 06:06:17"),
 *    )
 * )
 */
class Mask extends Model
{
    use HasFactory;

    protected $fillable = [
        'maska',
        'tokens',
        'is_reversed',
    ];
}

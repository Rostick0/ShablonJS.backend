<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *    schema="LayoutSchema",
 *       @OA\Property(property="id", type="number", example=1),
 *       @OA\Property(property="name", type="string", example="Админка админки"),
 *       @OA\Property(property="code", type="string", example="code component"),
 *       @OA\Property(property="created_at", type="datetime", example="2022-06-28 06:06:17"),
 *       @OA\Property(property="updated_at", type="datetime", example="2022-06-28 06:06:17"),
 *    )
 * )
 */
class Layout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function pages() {
        return $this->hasMany(Page::class);
    }
}

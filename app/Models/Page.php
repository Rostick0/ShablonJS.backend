<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *    schema="PageSchema",
 *       @OA\Property(property="id", type="number", example=1),
 *       @OA\Property(property="name", type="string", example="Админка админки"),
 *       @OA\Property(property="code", type="string", example="code page"),
 *       @OA\Property(property="type", type="enum", enum={"index", "create", "edit", "show", "other"}, example="other"),
 *       @OA\Property(property="layout_id", type="number", example=1),
 *       @OA\Property(property="created_at", type="datetime", example="2022-06-28 06:06:17"),
 *       @OA\Property(property="updated_at", type="datetime", example="2022-06-28 06:06:17"),
 *    )
 * )
 */
class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'type',
        'layout_id',
    ];

    public function layout() {
        return $this->belongsTo(Layout::class);
    }
}

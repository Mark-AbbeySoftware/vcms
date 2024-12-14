<?php

namespace Modules\InteractiveMapping\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Point extends Model
{
    public const TABLE = 'mapping_points';
    protected $table = self::TABLE;

    protected $fillable = [
        'polygon_id',
        'uuid',
        'point',
    ];

    public function polygon(): BelongsTo
    {
        return $this->belongsTo(Polygon::class);
    }

}

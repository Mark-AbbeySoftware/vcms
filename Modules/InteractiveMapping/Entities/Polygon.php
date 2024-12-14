<?php

namespace Modules\InteractiveMapping\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Polygon extends Model
{
    public const TABLE = 'mapping_polygons';
    protected $table = self::TABLE;

    protected $fillable = [
        'region_id',
        'uuid',
    ];


    public function regions(): BelongsTo
    {
        return $this->belongsTo(MappingRegion::class);
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class,'polygon_id','id');
    }

}

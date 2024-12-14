<?php

namespace Modules\InteractiveMapping\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class MappingRegion extends Model
{
    public const TABLE = 'mapping_elements';

    protected $table = self::TABLE;

    protected $fillable = [
        'polygon_class',
        'url',
        'uuid',
        'target',
        'identifier',
        'title',
        'class',
        'tooltip_title',
        'tooltip_id'
    ];


    public function polygons(): HasMany
    {
        return $this->hasMany(Polygon::class,'region_id','id');
    }


}

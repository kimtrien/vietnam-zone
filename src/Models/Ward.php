<?php

namespace Kjmtrue\VietnamZone\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Kjmtrue\VietnamZone\Models\Ward
 *
 * @property int $id
 * @property string $name
 * @property string $gso_id
 * @property int $district_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kjmtrue\VietnamZone\Models\District $district
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereGsoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ward extends Model
{
    protected $table = 'wards';

    protected $fillable = [
        'name',
        'gso_id',
        'published',
        'district_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}

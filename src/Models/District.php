<?php

namespace Kjmtrue\VietnamZone\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Kjmtrue\VietnamZone\Models\District
 *
 * @property int $id
 * @property string $name
 * @property string $gso_id
 * @property int $province_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kjmtrue\VietnamZone\Models\Province $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\Kjmtrue\VietnamZone\Models\Ward[] $wards
 * @property-read int|null $wards_count
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereGsoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class District extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'name',
        'gso_id',
        'published',
        'province_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceSchedule
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $type
 * @property string|null $location
 * @property \Illuminate\Support\Carbon $scheduled_at
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSchedule active()
 * @method static \Database\Factories\ServiceScheduleFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class ServiceSchedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'scheduled_at',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active schedules.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
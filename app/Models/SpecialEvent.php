<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SpecialEvent
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $type
 * @property string|null $location
 * @property \Illuminate\Support\Carbon $event_date
 * @property bool $is_active
 * @property string|null $requirements
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent active()

 * 
 * @mixin \Eloquent
 */
class SpecialEvent extends Model
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
        'event_date',
        'is_active',
        'requirements',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'event_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active events.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
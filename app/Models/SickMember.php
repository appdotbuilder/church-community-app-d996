<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SickMember
 *
 * @property int $id
 * @property string $name
 * @property string $domicile_group
 * @property string $care_location
 * @property string|null $illness_description
 * @property \Illuminate\Support\Carbon $care_start_date
 * @property \Illuminate\Support\Carbon|null $care_end_date
 * @property string $status
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereDomicileGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereCareLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereIllnessDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereCareStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereCareEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SickMember active()

 * 
 * @mixin \Eloquent
 */
class SickMember extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'domicile_group',
        'care_location',
        'illness_description',
        'care_start_date',
        'care_end_date',
        'status',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'care_start_date' => 'date',
        'care_end_date' => 'date',
    ];

    /**
     * Scope a query to only include active sick members.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
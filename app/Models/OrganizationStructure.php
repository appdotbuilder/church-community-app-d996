<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrganizationStructure
 *
 * @property int $id
 * @property string $position
 * @property string $name
 * @property string|null $phone
 * @property string|null $email
 * @property string $department
 * @property int $order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationStructure active()

 * 
 * @mixin \Eloquent
 */
class OrganizationStructure extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'position',
        'name',
        'phone',
        'email',
        'department',
        'order',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active positions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
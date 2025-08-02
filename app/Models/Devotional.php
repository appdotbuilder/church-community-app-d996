<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Devotional
 *
 * @property int $id
 * @property string $title
 * @property string $scripture_reference
 * @property string $content
 * @property \Illuminate\Support\Carbon $devotional_date
 * @property string|null $author
 * @property bool $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional query()
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereScriptureReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereDevotionalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Devotional published()

 * 
 * @mixin \Eloquent
 */
class Devotional extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'scripture_reference',
        'content',
        'devotional_date',
        'author',
        'is_published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'devotional_date' => 'date',
        'is_published' => 'boolean',
    ];

    /**
     * Scope a query to only include published devotionals.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
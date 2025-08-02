<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinancialRecord
 *
 * @property int $id
 * @property string $description
 * @property float $amount
 * @property string $type
 * @property \Illuminate\Support\Carbon $receipt_date
 * @property string|null $donor_name
 * @property string|null $notes
 * @property bool $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereReceiptDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereDonorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord published()
 * @method static \Database\Factories\FinancialRecordFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class FinancialRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'description',
        'amount',
        'type',
        'receipt_date',
        'donor_name',
        'notes',
        'is_published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'receipt_date' => 'date',
        'is_published' => 'boolean',
    ];

    /**
     * Scope a query to only include published records.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
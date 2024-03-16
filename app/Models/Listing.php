<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'logo',
        'description',
    ];

    public function scopeFilter($query, array $filters): void
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', "%{$filters['tag']}%");
        }
        if ($filters['search'] ?? false) {
            $query->where('title',       'like', "%{$filters['search']}%")
                ->orWhere('tags',        'like', "%{$filters['search']}%")
                ->orWhere('company',     'like', "%{$filters['search']}%")
                ->orWhere('description', 'like', "%{$filters['search']}%");
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

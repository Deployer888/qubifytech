<?php

namespace Modules\DynamicPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\DynamicPage\Database\factories\PageTypeFactory;

class PageType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'page_id',
        'type'
    ];
    
    /**
     * Get the page that owns the page type.
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the dynamic contents for the page type.
     */
    public function dynamicContents(): HasMany
    {
        return $this->hasMany(DynamicContent::class);
    }

    /**
     * Get active dynamic contents for this page type.
     */
    public function activeDynamicContents(): HasMany
    {
        return $this->hasMany(DynamicContent::class)
                    ->where('is_active', true)
                    ->orderBy('order_by');
    }
}

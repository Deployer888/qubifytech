<?php

namespace Modules\DynamicPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Modules\DynamicPage\Database\factories\DynamicContentFactory;

class DynamicContent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'page_id',
        'page_type_id',
        'section_name',
        'content_json',
        'order_by',
        'is_active',
    ];
    
    protected $casts = [
        'content_json' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the page that owns the dynamic content.
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the page type that owns the dynamic content.
     */
    public function pageType(): BelongsTo
    {
        return $this->belongsTo(PageType::class);
    }

    /**
     * Scope a query to only include active dynamic contents.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order by the order_by field.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order_by');
    }

    /**
     * Get the content as a formatted attribute.
     */
    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->content_json,
            set: fn ($value) => ['content_json' => $value],
        );
    }
}

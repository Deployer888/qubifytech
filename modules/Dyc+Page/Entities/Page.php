<?php

namespace Modules\DynamicPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\DynamicPage\Database\factories\PageFactory;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name'];

    /**
     * Get the page types for the page.
     */
    public function pageTypes(): HasMany
    {
        return $this->hasMany(PageType::class);
    }

    /**
     * Get the dynamic contents for the page.
     */
    public function dynamicContents(): HasMany
    {
        return $this->hasMany(DynamicContent::class);
    }

    /**
     * Get active dynamic contents ordered by order_by field.
     */
    public function activeDynamicContents(): HasMany
    {
        return $this->hasMany(DynamicContent::class)
                    ->where('is_active', true)
                    ->orderBy('order_by');
    }

    /**
     * Get dynamic content by section name.
     */
    public function getDynamicContentBySection($sectionName)
    {
        return $this->dynamicContents()
                    ->where('section_name', $sectionName)
                    ->where('is_active', true)
                    ->first();
    }
}

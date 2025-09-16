<?php

namespace Modules\DynamicPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\DynamicPage\Database\factories\CustomSeosFactory;

class CustomSeo extends Model
{
    use HasFactory;

    protected $table = 'custom_seos';

    protected $fillable = [
        'page_id',
        'page_type_id', 
        'content_json'
    ];

    protected $casts = [
        'content_json' => 'array'
    ];

    /**
     * Get SEO setting by page_id and page_type_id
     */
    public static function getBySetting($pageId, $pageTypeId = null)
    {
        return static::where('page_id', $pageId)
                    ->where('page_type_id', $pageTypeId)
                    ->first();
    }

    /**
     * Create or update SEO settings
     */
    public static function updateOrCreateSetting($pageId, $pageTypeId, $contentJson)
    {
        return static::updateOrCreate(
            [
                'page_id' => $pageId,
                'page_type_id' => $pageTypeId
            ],
            [
                'content_json' => $contentJson
            ]
        );
    }

    /**
     * Get meta title from content_json
     */
    public function getMetaTitleAttribute()
    {
        return $this->content_json['meta_title'] ?? null;
    }

    /**
     * Get meta description from content_json
     */
    public function getMetaDescriptionAttribute()
    {
        return $this->content_json['meta_description'] ?? null;
    }

    /**
     * Get slug from content_json
     */
    public function getSlugAttribute()
    {
        return $this->content_json['slug'] ?? null;
    }

    /**
     * Get focus keyphrase from content_json
     */
    public function getFocusKeyphraseAttribute()
    {
        return $this->content_json['focus_keyphrase'] ?? null;
    }

    /**
     * Get additional keyphrases from content_json
     */
    public function getAdditionalKeyphrasesAttribute()
    {
        return $this->content_json['additional_keyphrases'] ?? null;
    }

    /**
     * Get page schema type from content_json
     */
    public function getPageSchemaTypeAttribute()
    {
        return $this->content_json['page_schema_type'] ?? 'WebPage';
    }

    /**
     * Get robots index setting from content_json
     */
    public function getRobotsIndexAttribute()
    {
        return $this->content_json['robots_index'] ?? 'index';
    }

    /**
     * Get robots follow setting from content_json
     */
    public function getRobotsFollowAttribute()
    {
        return $this->content_json['robots_follow'] ?? 'follow';
    }

    /**
     * Get canonical URL from content_json
     */
    public function getCanonicalUrlAttribute()
    {
        return $this->content_json['canonical_url'] ?? null;
    }

    /**
     * Get redirect type from content_json
     */
    public function getRedirectTypeAttribute()
    {
        return $this->content_json['redirect_type'] ?? null;
    }

    /**
     * Get redirect URL from content_json
     */
    public function getRedirectUrlAttribute()
    {
        return $this->content_json['redirect_url'] ?? null;
    }

    /**
     * Get formatted meta robots content
     */
    public function getMetaRobotsAttribute()
    {
        $robots = [];
        
        if ($this->robots_index) {
            $robots[] = $this->robots_index;
        }
        
        if ($this->robots_follow) {
            $robots[] = $this->robots_follow;
        }
        
        return implode(', ', $robots);
    }

    /**
     * Check if page should be indexed
     */
    public function shouldIndex()
    {
        return $this->robots_index === 'index';
    }

    /**
     * Check if links should be followed
     */
    public function shouldFollow()
    {
        return $this->robots_follow === 'follow';
    }

    /**
     * Check if there's a redirect set
     */
    public function hasRedirect()
    {
        return !empty($this->redirect_type) && in_array($this->redirect_type, ['301', '302']);
    }
}

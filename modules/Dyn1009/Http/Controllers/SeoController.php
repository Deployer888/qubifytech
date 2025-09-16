<?php

namespace Modules\DynamicPage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\DynamicPage\Entities\Page;   
use Modules\DynamicPage\Entities\PageType;
use Modules\DynamicPage\Entities\DynamicContent;
use Modules\DynamicPage\Entities\CustomSeo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dynamicpage::seo');
    }

    /**
     * Save SEO data for a specific page
     */
    public function savePageData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_id' => 'required|integer',
            'page_type_id' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'slug' => 'nullable|string|max:255',
            'focus_keyphrase' => 'nullable|string|max:255',
            'additional_keyphrases' => 'nullable|string|max:500',
            'page_schema_type' => 'nullable|string',
            'robots_index' => 'nullable|string|in:index,noindex',
            'robots_follow' => 'nullable|string|in:follow,nofollow',
            'canonical_url' => 'nullable|url|max:255',
            'redirect_type' => 'nullable|string|in:301,302,404,410',
            'redirect_url' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed: ' . $validator->errors()->first()
            ], 422);
        }

        try {
            // Prepare content JSON
            $contentJson = [
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'slug' => $request->slug,
                'focus_keyphrase' => $request->focus_keyphrase,
                'additional_keyphrases' => $request->additional_keyphrases,
                'page_schema_type' => $request->page_schema_type ?? 'WebPage',
                'robots_index' => $request->robots_index ?? 'index',
                'robots_follow' => $request->robots_follow ?? 'follow',
                'canonical_url' => $request->canonical_url,
                'redirect_type' => $request->redirect_type,
                'redirect_url' => $request->redirect_url,
            ];

            // Log the data being saved
            \Log::info('Saving SEO data:', [
                'page_id' => $request->page_id,
                'page_type_id' => $request->page_type_id,
                'content_json' => $contentJson
            ]);

            // Save to database
            $customSeo = CustomSeo::updateOrCreate(
                [
                    'page_id' => $request->page_id,
                    'page_type_id' => $request->page_type_id
                ],
                [
                    'content_json' => $contentJson
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'SEO settings saved successfully!',
                'data' => $customSeo
            ]);

        } catch (\Exception $e) {
            \Log::error('Error saving SEO data:', [
                'error' => $e->getMessage(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error saving SEO data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get SEO data for a specific page
     */
    public function getPageData(Request $request)
    {
        try {
            // Log the request for debugging
            \Log::info('Loading SEO data request:', [
                'page_id' => $request->page_id,
                'page_type_id' => $request->page_type_id,
                'current_url' => $request->current_url
            ]);
    
            // Build query
            $query = CustomSeo::where('page_id', $request->page_id);
            
            // Add page_type_id condition only if it's provided and not null
            if ($request->page_type_id !== null && $request->page_type_id !== '') {
                $query->where('page_type_id', $request->page_type_id);
            } else {
                $query->whereNull('page_type_id');
            }
            
            $customSeo = $query->first();
    
            if ($customSeo) {
                \Log::info('SEO data found:', [
                    'id' => $customSeo->id,
                    'content_json' => $customSeo->content_json
                ]);
    
                return response()->json([
                    'success' => true,
                    'data' => $customSeo->content_json,
                    'record_id' => $customSeo->id,
                    'message' => 'SEO data loaded successfully'
                ]);
            }
    
            \Log::info('No SEO data found for the given criteria');
    
            return response()->json([
                'success' => false,
                'message' => 'No SEO data found for this page',
                'data' => null
            ]);
    
        } catch (\Exception $e) {
            \Log::error('Error loading SEO data:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
    
            return response()->json([
                'success' => false,
                'message' => 'Error loading SEO data: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }
    }



}

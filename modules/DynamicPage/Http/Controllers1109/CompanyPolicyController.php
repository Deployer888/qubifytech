<?php

namespace Modules\DynamicPage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;  
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\DynamicPage\Entities\Page;
use Modules\DynamicPage\Entities\PageType;
use Modules\DynamicPage\Entities\DynamicContent;
use Modules\DynamicPage\Entities\CustomSeo;

class CompanyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Get or create the about page
         $page = $this->getOrCreateTermsPage();
         $pageType = $this->getOrCreatePageType($page->id, 'terms_conditions');
         // Get existing content for all sections
         $termsContent = $this->getSectionContent($page->id, $pageType->id, 'terms');
         $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
         return view('dynamicpage::terms_conditions', compact(
             'termsContent',  
             'seo_data',
             'page',
             'pageType',
             'seo_data'
         ));
    }

    public function policy()
    {
         // Get or create the about page
         $page = $this->getOrCreatePolicyPage();
         $pageType = $this->getOrCreatePageType($page->id, 'privacy_policy');
         // Get existing content for all sections
         $policyContent = $this->getSectionContent($page->id, $pageType->id, 'policy');
         $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
         return view('dynamicpage::privacy_policy', compact( 
             'policyContent',
             'seo_data',
             'page',
             'pageType',
             'seo_data'
         ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function termsSection(Request $request)
    {
        try {
            DB::beginTransaction();

            $page = $this->getOrCreateTermsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'terms_conditions');

            // Prepare content data
            $contentData = [
                'text' => $request->terms_text,
            ];

            // Save or update hero section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'terms'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 1,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Teams section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving terms section: ' . $e->getMessage()
            ], 500);
        }
    }

    public function policySection(Request $request)
    {
        try {
            DB::beginTransaction();

            $page = $this->getOrCreatePolicyPage();
            $pageType = $this->getOrCreatePageType($page->id, 'privacy_policy');

            // Prepare content data
            $contentData = [
                'text' => $request->policy_text,
            ];

            // Save or update hero section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'policy'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 1,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Policy section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving terms section: ' . $e->getMessage()
            ], 500);
        }
    }


      /**
     * Get or create company policy page
     */
    private function getOrCreateTermsPage()
    {
        return Page::firstOrCreate(
            ['name' => 'terms_conditions'],
            [
                'name' => 'terms_conditions'
            ]
        );
    }

    private function getOrCreatePolicyPage()
    {
        return Page::firstOrCreate(
            ['name' => 'privacy_policy'],
            [
                'name' => 'privacy_policy'
            ]
        );
    }

    /**
     * Get or create page type
     */
    private function getOrCreatePageType($pageId, $typeName)
    {
        return PageType::firstOrCreate(
            [
                'page_id' => $pageId,
                'type' => $typeName
            ]
        );
    }

    /**
     * Get section content
     */
    private function getSectionContent($pageId, $pageType, $sectionName)
    {

        return DynamicContent::where('page_id', $pageId)
            ->where('page_type_id', $pageType)
            ->where('section_name', $sectionName)
            ->first();
    }
  
}

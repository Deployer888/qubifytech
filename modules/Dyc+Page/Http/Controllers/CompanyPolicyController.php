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

class CompanyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Get or create the about page
         $page = $this->getOrCreateAboutPage();
        
         // Get existing content for all sections
         $termsContent = $this->getSectionContent($page->id, 'terms');
         $policyContent = $this->getSectionContent($page->id, 'policy');
        
         return view('dynamicpage::company_policy', compact(
             'termsContent', 
             'policyContent'
         ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function termsSection(Request $request)
    {
        try {
            DB::beginTransaction();

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'companyPolicy');

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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'companyPolicy');

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
    private function getOrCreateAboutPage()
    {
        return Page::firstOrCreate(
            ['name' => 'companyPolicy'],
            [
                'name' => 'companyPolicy'
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
    private function getSectionContent($pageId, $sectionName)
    {
        $pageType = PageType::where('page_id', $pageId)->where('type', 'companyPolicy')->first();
        
        if (!$pageType) {
            return null;
        }

        return DynamicContent::where('page_id', $pageId)
            ->where('page_type_id', $pageType->id)
            ->where('section_name', $sectionName)
            ->first();
    }
  
}

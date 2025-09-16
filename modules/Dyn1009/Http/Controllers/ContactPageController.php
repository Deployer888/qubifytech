<?php

namespace Modules\DynamicPage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\DynamicPage\Entities\Page;
use Modules\DynamicPage\Entities\PageType;
use Modules\DynamicPage\Entities\DynamicContent;
use Modules\DynamicPage\Entities\CustomSeo;

class ContactPageController extends Controller
{
    public function index()
    {
        // Get or create the contact page
        $page = $this->getOrCreateContactPage();
        $pageType = $this->getOrCreatePageType($page->id, 'contactpage');
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, 'hero');
        $featuresContent = $this->getSectionContent($page->id, 'features');
        $formContent = $this->getSectionContent($page->id, 'form');
        $officeContent = $this->getSectionContent($page->id, 'office');
        $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
        return view('dynamicpage::contactpage.index', compact(
            'page', 
            'pageType', 
            'heroContent', 
            'featuresContent', 
            'formContent',
            'officeContent',
            'seo_data'
        ));
    }

    /**
     * Save Hero Section
     */
    public function saveHeroSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'hero_title' => 'required|string|max:500',
            'hero_subtitle' => 'required|string|max:1000',
            'hero_button_text' => 'required|string|max:255',
            'hero_button_icon' => 'required|string|max:255',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateContactPage();
            $pageType = $this->getOrCreatePageType($page->id, 'contactpage');

            // Prepare content data
            $contentData = [
                'title' => $request->hero_title,
                'subtitle' => $request->hero_subtitle,
                'button' => [
                    'text' => $request->hero_button_text,
                    'icon' => $request->hero_button_icon
                ]
            ];

            // Save or update hero section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'hero'
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
                'message' => 'Hero section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving hero section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Features Section
     */
    public function saveFeaturesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'features_badge_icon' => 'required|string|max:255',
            'features_badge_text' => 'required|string|max:255',
            'features_title' => 'required|string|max:255',
            // Feature cards (4 features)
            'feature1_icon' => 'required|string|max:255',
            'feature1_title' => 'required|string|max:255',
            'feature1_description' => 'required|string',
            'feature2_icon' => 'required|string|max:255',
            'feature2_title' => 'required|string|max:255',
            'feature2_description' => 'required|string',
            'feature3_icon' => 'required|string|max:255',
            'feature3_title' => 'required|string|max:255',
            'feature3_description' => 'required|string',
            'feature4_icon' => 'required|string|max:255',
            'feature4_title' => 'required|string|max:255',
            'feature4_description' => 'required|string',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateContactPage();
            $pageType = $this->getOrCreatePageType($page->id, 'contactpage');

            // Prepare content data
            $features = [];
            for ($i = 1; $i <= 4; $i++) {
                $features[] = [
                    'icon' => $request->input("feature{$i}_icon"),
                    'title' => $request->input("feature{$i}_title"),
                    'description' => $request->input("feature{$i}_description")
                ];
            }

            $contentData = [
                'badge' => [
                    'icon' => $request->features_badge_icon,
                    'text' => $request->features_badge_text
                ],
                'title' => $request->features_title,
                'features' => $features
            ];

            // Save or update features section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'features'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 2,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Features section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving features section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Form Section
     */
    public function saveFormSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'form_icon' => 'required|string|max:255',
            'form_title' => 'required|string|max:255',
            'form_subtitle' => 'required|string|max:500',
            // Trust indicators
            'trust1_icon' => 'required|string|max:255',
            'trust1_text' => 'required|string|max:255',
            'trust2_icon' => 'required|string|max:255',
            'trust2_text' => 'required|string|max:255',
            'trust3_icon' => 'required|string|max:255',
            'trust3_text' => 'required|string|max:255',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateContactPage();
            $pageType = $this->getOrCreatePageType($page->id, 'contactpage');

            // Prepare content data
            $contentData = [
                'icon' => $request->form_icon,
                'title' => $request->form_title,
                'subtitle' => $request->form_subtitle,
                'trust_indicators' => [
                    [
                        'icon' => $request->trust1_icon,
                        'text' => $request->trust1_text
                    ],
                    [
                        'icon' => $request->trust2_icon,
                        'text' => $request->trust2_text
                    ],
                    [
                        'icon' => $request->trust3_icon,
                        'text' => $request->trust3_text
                    ]
                ]
            ];

            // Save or update form section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'form'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 3,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Form section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving form section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Office Section
     */
    public function saveOfficeSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'office_icon' => 'required|string|max:255',
            'office_title' => 'required|string|max:255',
            'office_address' => 'required|string',
            'office_email' => 'required|email|max:255',
            'office_phone' => 'required|string|max:255',
            'office_hours' => 'required|string',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateContactPage();
            $pageType = $this->getOrCreatePageType($page->id, 'contactpage');

            // Prepare content data
            $contentData = [
                'icon' => $request->office_icon,
                'title' => $request->office_title,
                'details' => [
                    'address' => [
                        'icon' => 'fas fa-map-marker-alt',
                        'title' => 'Address',
                        'content' => $request->office_address
                    ],
                    'email' => [
                        'icon' => 'fas fa-envelope',
                        'title' => 'Email',
                        'content' => $request->office_email
                    ],
                    'phone' => [
                        'icon' => 'fas fa-phone',
                        'title' => 'Phone',
                        'content' => $request->office_phone
                    ],
                    'hours' => [
                        'icon' => 'fas fa-clock',
                        'title' => 'Business Hours',
                        'content' => $request->office_hours
                    ]
                ]
            ];

            // Save or update office section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'office'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 4,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Office section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving office section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle section active status
     */
    public function toggleSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'section_name' => 'required|string',
            'is_active' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $page = $this->getOrCreateContactPage();
            $pageType = $this->getOrCreatePageType($page->id, 'contactpage');

            $content = DynamicContent::where('page_id', $page->id)
                ->where('page_type_id', $pageType->id)
                ->where('section_name', $request->section_name)
                ->first();

            if ($content) {
                $content->is_active = $request->is_active;
                $content->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Section status updated successfully!'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Section not found'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating section status: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get or create contact page
     */
    private function getOrCreateContactPage()
    {
        return Page::firstOrCreate(
            ['name' => 'contactpage'],
            [
                'name' => 'contactpage'
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
        $pageType = PageType::where('page_id', $pageId)->where('type', 'contactpage')->first();
        
        if (!$pageType) {
            return null;
        }

        return DynamicContent::where('page_id', $pageId)
            ->where('page_type_id', $pageType->id)
            ->where('section_name', $sectionName)
            ->first();
    }
}
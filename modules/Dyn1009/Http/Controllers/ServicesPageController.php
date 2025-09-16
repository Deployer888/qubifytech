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

class ServicesPageController extends Controller
{
    public function index()
    {
        // Get or create the services page
        $page = $this->getOrCreateServicesPage();
        $pageType = $this->getOrCreatePageType($page->id, 'servicespage');
        // Get existing content for all sections and extract content_json
        $heroSection = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $heroContent = $heroSection ? $heroSection->content_json : [];
        
        $servicesHeaderSection = $this->getSectionContent($page->id, $pageType->id, 'services_header');
        $servicesHeaderContent = $servicesHeaderSection ? $servicesHeaderSection->content_json : [];
        
        $webDevSection = $this->getSectionContent($page->id, $pageType->id, 'web_development');
        $webDevContent = $webDevSection ? $webDevSection->content_json : [];
        
        $softwareDevSection = $this->getSectionContent($page->id, $pageType->id, 'software_development');
        $softwareDevContent = $softwareDevSection ? $softwareDevSection->content_json : [];
        
        $mobileDevSection = $this->getSectionContent($page->id, $pageType->id, 'mobile_development');
        $mobileDevContent = $mobileDevSection ? $mobileDevSection->content_json : [];
        
        $webAppDevSection = $this->getSectionContent($page->id, $pageType->id, 'web_app_development');
        $webAppDevContent = $webAppDevSection ? $webAppDevSection->content_json : [];
        
        $whyQubifySection = $this->getSectionContent($page->id, $pageType->id, 'why_qubify');
        $whyQubifyContent = $whyQubifySection ? $whyQubifySection->content_json : [];
        
        $technologiesSection = $this->getSectionContent($page->id, $pageType->id, 'technologies');
        $technologiesContent = $technologiesSection ? $technologiesSection->content_json : [];
        
        $ctaSection = $this->getSectionContent($page->id, $pageType->id, 'cta');
        $ctaContent = $ctaSection ? $ctaSection->content_json : [];
        $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
        return view('dynamicpage::servicespage.index', compact(
            'page', 
            'pageType', 
            'heroContent', 
            'servicesHeaderContent', 
            'webDevContent',
            'softwareDevContent',
            'mobileDevContent',
            'webAppDevContent',
            'whyQubifyContent',
            'technologiesContent',
            'ctaContent',
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
            'hero_button1_text' => 'required|string|max:255',
            'hero_button1_url' => 'required|string|max:255',
            'hero_button2_text' => 'required|string|max:255',
            'hero_button2_url' => 'required|string|max:255',
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

            $page = $this->getOrCreateServicesPage();
            $pageType = $this->getOrCreatePageType($page->id, 'servicespage');

            // Prepare content data
            $contentData = [
                'title' => $request->hero_title,
                'subtitle' => $request->hero_subtitle,
                'buttons' => [
                    [
                        'text' => $request->hero_button1_text,
                        'url' => $request->hero_button1_url,
                        'class' => 'btn btn--primary'
                    ],
                    [
                        'text' => $request->hero_button2_text,
                        'url' => $request->hero_button2_url,
                        'class' => 'btn btn--secondary'
                    ]
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
     * Save Services Header Section
     */
    public function saveServicesHeaderSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'services_title' => 'required|string|max:500',
            'services_subtitle' => 'required|string|max:1000',
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

            $page = $this->getOrCreateServicesPage();
            $pageType = $this->getOrCreatePageType($page->id, 'servicespage');

            $contentData = [
                'title' => $request->services_title,
                'subtitle' => $request->services_subtitle
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'services_header'
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
                'message' => 'Services header section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving services header section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Service Card Section (Web Dev, Software Dev, etc.)
     */
    public function saveServiceCardSection(Request $request, $sectionName): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:500',
            'description' => 'required|string|max:2000',
            'features' => 'required|string|max:500',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'image_url' => 'nullable|string|max:500',
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

            $page = $this->getOrCreateServicesPage();
            $pageType = $this->getOrCreatePageType($page->id, 'servicespage');

            $contentData = [
                'category' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'features' => $request->features,
                'button' => [
                    'text' => $request->button_text,
                    'url' => $request->button_url
                ],
                'image_url' => $request->image_url
            ];

            // Determine order based on section name
            $orderMap = [
                'web_development' => 3,
                'software_development' => 4,
                'mobile_development' => 5,
                'web_app_development' => 6
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => $sectionName
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => $orderMap[$sectionName] ?? 10,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => ucwords(str_replace('_', ' ', $sectionName)) . ' section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving ' . $sectionName . ' section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Why Qubify Section
     */
    public function saveWhyQubifySection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:500',
            'description1' => 'required|string|max:1000',
            'description2' => 'required|string|max:1000',
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

            $page = $this->getOrCreateServicesPage();
            $pageType = $this->getOrCreatePageType($page->id, 'servicespage');

            $contentData = [
                'title' => $request->title,
                'description1' => $request->description1,
                'description2' => $request->description2
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_qubify'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 7,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Why Qubify section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Why Qubify section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Technologies Section
     */
    public function saveTechnologiesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:500',
            'subtitle' => 'required|string|max:1000',
            'tech_*.title' => 'required|string|max:255',
            'tech_*.description' => 'required|string|max:500',
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

            $page = $this->getOrCreateServicesPage();
            $pageType = $this->getOrCreatePageType($page->id, 'servicespage');

            // Prepare technologies data
            $technologies = [];
            for ($i = 1; $i <= 4; $i++) {
                if ($request->has("tech_{$i}_title")) {
                    $technologies[] = [
                        'title' => $request->input("tech_{$i}_title"),
                        'description' => $request->input("tech_{$i}_description")
                    ];
                }
            }

            $contentData = [
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'technologies' => $technologies
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'technologies'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 8,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Technologies section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving technologies section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save CTA Section
     */
    public function saveCtaSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:500',
            'description' => 'required|string|max:1000',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
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

            $page = $this->getOrCreateServicesPage();
            $pageType = $this->getOrCreatePageType($page->id, 'servicespage');

            $contentData = [
                'title' => $request->title,
                'description' => $request->description,
                'contact' => [
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'website' => $request->website
                ],
                'button' => [
                    'text' => $request->button_text,
                    'url' => 'mailto:' . $request->email
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'cta'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 9,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'CTA section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving CTA section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get or create services page
     */
    private function getOrCreateServicesPage()
    {
        return Page::firstOrCreate(
            ['name' => 'servicespage'],
            ['name' => 'servicespage']
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
            ],
            [
                'page_id' => $pageId,
                'type' => $typeName
            ]
        );
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
            $page = $this->getOrCreateServicesPage();
            
            $section = DynamicContent::where('page_id', $page->id)
                                   ->where('section_name', $request->section_name)
                                   ->first();

            if (!$section) {
                return response()->json([
                    'success' => false,
                    'message' => 'Section not found'
                ], 404);
            }

            $section->is_active = $request->is_active;
            $section->save();

            return response()->json([
                'success' => true,
                'message' => 'Section status updated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating section status: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get section content
     */
    // private function getSectionContent($pageId, $sectionName)
    // {
    //     return DynamicContent::where('page_id', $pageId)
    //                        ->where('section_name', $sectionName)
    //                        ->first();
    // }

    private function getSectionContent($pageId, $pageTypeId, $sectionName)
    {
        return DynamicContent::where('page_id', $pageId)
                           ->where('page_type_id',$pageTypeId)
                           ->where('section_name', $sectionName)
                           ->first();
    }
}
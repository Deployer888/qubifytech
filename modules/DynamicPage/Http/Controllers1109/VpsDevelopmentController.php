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

/**
 * VPS Development Page Controller
 * 
 * Manages all content sections for the VPS Development solution page
 * including Hero, Intro, Core Features, Hardware Integration, Industries, and Scalability sections.
 */
class VpsDevelopmentController extends Controller
{
    /**
     * Display the VPS Development page management interface
     */
    public function index()
    {
        // Get or create the VPS development page
        $page = $this->getOrCreateVpsPage();
        $pageType = $this->getOrCreatePageType($page->id, 'vps_development');
        
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $coreFeaturesContent = $this->getSectionContent($page->id, $pageType->id, 'core_features');
        $hardwareIntegrationContent = $this->getSectionContent($page->id, $pageType->id, 'hardware_integration');
        $industriesContent = $this->getSectionContent($page->id, $pageType->id, 'industries');
        $scalabilityContent = $this->getSectionContent($page->id, $pageType->id, 'scalability');
        $testimonialsContent = $this->getSectionContent($page->id, $pageType->id, 'testimonials');
        $finalCtaContent = $this->getSectionContent($page->id, $pageType->id, 'final_cta');
        $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
        return view('dynamicpage::solutionspage.vpsDevelopment', compact(
            'page', 
            'pageType', 
            'seo_data', 
            'heroContent', 
            'introContent', 
            'coreFeaturesContent',
            'hardwareIntegrationContent',
            'industriesContent',
            'scalabilityContent',
            'testimonialsContent',
            'finalCtaContent'
        ));
    }

    /**
     * Get or create the VPS development page
     */
    private function getOrCreateVpsPage(): Page
    {
        return Page::firstOrCreate(
            ['name' => 'solutionpages'],
            [
             'name' => 'solutionpages'
            ]
        );
    }

    /**
     * Get or create page type for the given page
     */
    private function getOrCreatePageType(int $pageId, string $type): PageType
    {
        return PageType::firstOrCreate(
            [
                'page_id' => $pageId,
                'type' => $type
            ]
        );
    }

    /**
     * Get section content by page ID and section name
     */
    private function getSectionContent($pageId, $pageTypeId, $sectionName)
    {
        return DynamicContent::where('page_id', $pageId)
        ->where('page_type_id',$pageTypeId)
        ->where('section_name', $sectionName)
        ->first();
    }
    // private function getSectionContent(int $pageId, string $sectionName): ?DynamicContent
    // {
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'vps_development')->first();
        
    //     if (!$pageType) {
    //         return null;
    //     }

    //     return DynamicContent::where('page_id', $pageId)
    //         ->where('page_type_id', $pageType->id)
    //         ->where('section_name', $sectionName)
    //         ->first();
    // }

    /**
     * Save Hero Section
     */
    public function saveHeroSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'hero_title' => 'required|string|max:500',
            'hero_subtitle' => 'required|string|max:1000',
            'hero_feature1' => 'required|string|max:100',
            'hero_feature2' => 'required|string|max:100',
            'hero_feature3' => 'required|string|max:100',
            'hero_button1_text' => 'required|string|max:255',
            'hero_button2_text' => 'required|string|max:255',
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

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            // Prepare content data
            $contentData = [
                'title' => $request->hero_title,
                'subtitle' => $request->hero_subtitle,
                'features' => [
                    $request->hero_feature1,
                    $request->hero_feature2,
                    $request->hero_feature3
                ],
                'buttons' => [
                    [
                        'text' => $request->hero_button1_text,
                        'url' => route('frontend.index') . '#contact',
                        'class' => 'btn btn--primary'
                    ],
                    [
                        'text' => $request->hero_button2_text,
                        'action' => 'openContactModal()',
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
     * Save Intro Section
     */
    public function saveIntroSection(Request $request): JsonResponse
    {
    
        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            // Prepare content data
            $features = [];
            for ($i = 1; $i <= 4; $i++) {
                $features[] = [
                    'title' => $request->input("feature{$i}_title"),
                    'description' => $request->input("feature{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->intro_title,
                'description' => $request->intro_description,
                'features' => $features
            ];

            // Save or update intro section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'intro'
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
                'message' => 'Intro section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving intro section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Core Features Section
     */
    public function saveCoreFeaturesSection(Request $request): JsonResponse
    {

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            // Main capabilities (3 required)
            $capabilities = [];
            for ($i = 1; $i <= 3; $i++) {
                $features = [];
                $stats = [];
                
                $dashboard_title = $request->input("capability{$i}_dashboard_title");
                for ($j = 1; $j <= 3; $j++) {
                    $features[] = $request->input("capability{$i}_feature{$j}");
                    $stats[] = [
                        'label' => $request->input("capability{$i}_stat{$j}_label"),
                        'value' => $request->input("capability{$i}_stat{$j}_value")
                    ];
                }

                $capabilities[] = [
                    'title' => $request->input("capability{$i}_title"),
                    'subtitle' => $request->input("capability{$i}_subtitle"),
                    'description' => $request->input("capability{$i}_description"),
                    'features' => $features,
                    'dashboard_title' => $dashboard_title,
                    'stats' => $stats
                ];
            }

            // Additional features (6 required)
            $additionalFeatures = [];
            for ($i = 1; $i <= 9; $i++) {
                $additionalFeatures[] = [
                    'title' => $request->input("additional{$i}_title"),
                    'subtitle' => $request->input("additional{$i}_subtitle"),
                    'description' => $request->input("additional{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->core_title,
                'subtitle' => $request->core_subtitle,
                'capabilities' => $capabilities,
                'additional_features' => $additionalFeatures
            ];

            // Save or update core features section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'core_features'
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
                'message' => 'Core Features section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Core Features section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Hardware Integration Section
     */
    public function saveHardwareIntegrationSection(Request $request): JsonResponse
    {

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            $hardwareTypes = [];

            if ($request->has('hardware')) {
                foreach ($request->hardware as $item) {
                    $hardwareTypes[] = [
                        'title' => $item['title'] ?? null,
                        'description' => $item['description'] ?? null,
                    ];
                }
            }

            $contentData = [
                'title' => $request->hardware_title,
                'description' => $request->hardware_description,
                'hardware_types' => $hardwareTypes
            ];

            // Save or update hardware integration section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'hardware_integration'
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
                'message' => 'Hardware Integration section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Hardware Integration section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Industries Section
     */
    public function saveIndustriesSection(Request $request): JsonResponse
    {

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            // Prepare industries data
            $industries = [];
            for ($i = 1; $i <= 8; $i++) {
                $industries[] = [
                    'title' => $request->input("industry{$i}_title"),
                    'description' => $request->input("industry{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->industries_title,
                'description' => $request->industries_description,
                'industries' => $industries
            ];

            // Save or update industries section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'industries'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 5,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Industries section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Industries section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Scalability Section
     */
    public function saveScalabilitySection(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            // Prepare scalability features data
            $features = [];
            for ($i = 1; $i <= 3; $i++) {
                $features[] = [
                    'title' => $request->input("scalability{$i}_title"),
                    'description' => $request->input("scalability{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->scalability_title,
                'description' => $request->scalability_description,
                'features' => $features
            ];

            // Save or update scalability section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'scalability'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 6,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Scalability section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Scalability section: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveTestimonialsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'testimonials_title' => 'required|string|max:255',
            'testimonial1_name' => 'required|string|max:100',
            'testimonial1_role' => 'required|string|max:100',
            'testimonial1_company' => 'required|string|max:100',
            'testimonial1_review' => 'required|string',
            'testimonial1_rating' => 'required|integer|min:1|max:5',
            'testimonial2_name' => 'required|string|max:100',
            'testimonial2_role' => 'required|string|max:100',
            'testimonial2_company' => 'required|string|max:100',
            'testimonial2_review' => 'required|string',
            'testimonial2_rating' => 'required|integer|min:1|max:5',
            'testimonial3_name' => 'required|string|max:100',
            'testimonial3_role' => 'required|string|max:100',
            'testimonial3_company' => 'required|string|max:100',
            'testimonial3_review' => 'required|string',
            'testimonial3_rating' => 'required|integer|min:1|max:5',
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

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            // Prepare content data
            $testimonials = [];
            for ($i = 1; $i <= 3; $i++) {
                $testimonials[] = [
                    'name' => $request->input("testimonial{$i}_name"),
                    'role' => $request->input("testimonial{$i}_role"),
                    'company' => $request->input("testimonial{$i}_company"),
                    'review' => $request->input("testimonial{$i}_review"),
                    'rating' => $request->input("testimonial{$i}_rating")
                ];
            }

            $contentData = [
                'title' => $request->testimonials_title,
                'testimonials' => $testimonials
            ];

            // Save or update testimonials section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'testimonials'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 6,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Testimonials section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Testimonials section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Final CTA Section
     */
    public function saveFinalCtaSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'final_cta_title' => 'required|string|max:500',
            'final_cta_description' => 'required|string',
            'feature_pill_1' => 'required|string|max:50',
            'feature_pill_2' => 'required|string|max:50',
            'feature_pill_3' => 'required|string|max:50',
            'button1_text' => 'required|string|max:100',
            'button2_text' => 'required|string|max:100',
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

            $page = $this->getOrCreateVpsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vps_development');

            // Prepare content data
            $contentData = [
                'title' => $request->final_cta_title,
                'description' => $request->final_cta_description,
                'features' => [
                    $request->feature_pill_1,
                    $request->feature_pill_2,
                    $request->feature_pill_3,
                    $request->feature_pill_4
                ],
                'buttons' => [
                    [
                        'text' => $request->button1_text,
                        'action' => 'modal',
                        'classes' => 'btn-primary'
                    ],
                    [
                        'text' => $request->button2_text,
                        'classes' => 'btn-secondary'
                    ]
                ]
            ];

            // Save or update final CTA section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'final_cta'
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
                'message' => 'Final CTA section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Final CTA section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle section active/inactive status
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
            $page = $this->getOrCreateVpsPage();
            
            $content = DynamicContent::where('page_id', $page->id)
                ->where('section_name', $request->section_name)
                ->first();

            if ($content) {
                $content->update(['is_active' => $request->is_active]);
                
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
}
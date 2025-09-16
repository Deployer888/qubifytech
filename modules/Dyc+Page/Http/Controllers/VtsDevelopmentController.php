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

/**
 * VTS Development Page Controller
 * 
 * Manages all content sections for the VTS Development solution page
 * including Hero, Intro, Core Features, Additional Features, Hardware Integration,
 * Use Cases, Benefits, Testimonials, and Final CTA sections.
 */
class VtsDevelopmentController extends Controller
{
    /**
     * Display the VTS Development page management interface
     */
    public function index()
    {
        // Get or create the VTS development page
        $page = $this->getOrCreateVtsPage();
        $pageType = $this->getOrCreatePageType($page->id, 'vts_development');
        
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $coreFeaturesContent = $this->getSectionContent($page->id, $pageType->id, 'core_features');
        $additionalFeaturesContent = $this->getSectionContent($page->id, $pageType->id, 'additional_features');
        $hardwareIntegrationContent = $this->getSectionContent($page->id, $pageType->id, 'hardware_integration');
        $useCasesContent = $this->getSectionContent($page->id, $pageType->id, 'use_cases');
        $benefitsContent = $this->getSectionContent($page->id, $pageType->id, 'benefits');
        $testimonialsContent = $this->getSectionContent($page->id, $pageType->id, 'testimonials');
        $finalCtaContent = $this->getSectionContent($page->id, $pageType->id, 'final_cta');
       
        return view('dynamicpage::solutionspage.vtsDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'coreFeaturesContent',
            'additionalFeaturesContent',
            'hardwareIntegrationContent',
            'useCasesContent',
            'benefitsContent',
            'testimonialsContent',
            'finalCtaContent'
        ));
    }

    /**
     * Get or create the VTS development page
     */
    private function getOrCreateVtsPage(): Page
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
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'vts_development')->first();
        
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
            'feature_pill_1' => 'required|string|max:50',
            'feature_pill_2' => 'required|string|max:50',
            'feature_pill_3' => 'required|string|max:50',
            'button1_text' => 'required|string|max:100',
            'button2_text' => 'required|string|max:100',
            'button2_url' => 'required|string|max:255',
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare content data
            $contentData = [
                'title' => $request->hero_title,
                'subtitle' => $request->hero_subtitle,
                'features' => [
                    $request->feature_pill_1,
                    $request->feature_pill_2,
                    $request->feature_pill_3
                ],
                'buttons' => [
                    [
                        'text' => $request->button1_text,
                        'url' => '#contact',
                        'classes' => 'btn-primary'
                    ],
                    [
                        'text' => $request->button2_text,
                        'url' => $request->button2_url,
                        'classes' => 'btn-secondary'
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare content data
            $contentData = [
                'title' => $request->intro_title,
                'description' => $request->intro_description,
                'subtitle' => $request->intro_subtitle,
                'features' => [
                    [
                        'title' => $request->core_feature_1_title,
                        'description' => $request->core_feature_1_description
                    ],
                    [
                        'title' => $request->core_feature_2_title,
                        'description' => $request->core_feature_2_description
                    ],
                    [
                        'title' => $request->core_feature_3_title,
                        'description' => $request->core_feature_3_description
                    ],
                    [
                        'title' => $request->core_feature_4_title,
                        'description' => $request->core_feature_4_description
                    ]
                ]
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare capabilities data
            $capabilities = [];
            for ($i = 1; $i <= 3; $i++) {
                $capabilities[] = [
                    'title' => $request->input("capability_{$i}_title"),
                    'subtitle' => $request->input("capability_{$i}_subtitle"),
                    'description' => $request->input("capability_{$i}_description"),
                    'features' => [
                        $request->input("capability_{$i}_feature_1"),
                        $request->input("capability_{$i}_feature_2"),
                        $request->input("capability_{$i}_feature_3")
                    ],
                    'dashboard_stats' => [
                        [
                            'label' => $request->input("capability_{$i}_stat_1_label"),
                            'value' => $request->input("capability_{$i}_stat_1_value")
                        ],
                        [
                            'label' => $request->input("capability_{$i}_stat_2_label"),
                            'value' => $request->input("capability_{$i}_stat_2_value")
                        ],
                        [
                            'label' => $request->input("capability_{$i}_stat_3_label"),
                            'value' => $request->input("capability_{$i}_stat_3_value")
                        ]
                    ]
                ];
            }

            $contentData = [
                'title' => $request->core_features_title,
                'subtitle' => $request->core_features_subtitle,
                'capabilities' => $capabilities
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
     * Save Additional Features Section
     */
    public function saveAdditionalFeaturesSection(Request $request): JsonResponse
    {

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare features data
            $features = [];
            
            for ($i = 1; $i <= 6; $i++) {
                $features[] = [
                    'title' => $request->input("feature_{$i}_title"),
                    'subtitle' => $request->input("feature_{$i}_subtitle"),
                    'description' => $request->input("feature_{$i}_description")
                ];
            }

            $contentData = [
                'features' => $features
            ];

            // Save or update additional features section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'additional_features'
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
                'message' => 'Additional Features section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Additional Features section: ' . $e->getMessage()
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare hardware types data
            $hardwareTypes = [];
            
            for ($i = 1; $i <= 4; $i++) {
                $hardwareTypes[] = [
                    'title' => $request->input("hardware_{$i}_title"),
                    'description' => $request->input("hardware_{$i}_description")
                ];
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
                    'order_by' => 5,
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
     * Save Use Cases Section
     */
    public function saveUseCasesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'use_cases_title' => 'required|string|max:255',
            'use_cases_description' => 'required|string',
            'use_case_1_title' => 'required|string|max:255',
            'use_case_1_description' => 'required|string',
            'use_case_2_title' => 'required|string|max:255',
            'use_case_2_description' => 'required|string',
            'use_case_3_title' => 'required|string|max:255',
            'use_case_3_description' => 'required|string',
            'use_case_4_title' => 'required|string|max:255',
            'use_case_4_description' => 'required|string',
            'use_case_5_title' => 'required|string|max:255',
            'use_case_5_description' => 'required|string',
            'use_case_6_title' => 'required|string|max:255',
            'use_case_6_description' => 'required|string',
            'use_case_7_title' => 'required|string|max:255',
            'use_case_7_description' => 'required|string',
            'use_case_8_title' => 'required|string|max:255',
            'use_case_8_description' => 'required|string',
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare use cases data
            $useCases = [];
            
            for ($i = 1; $i <= 8; $i++) {
                $useCases[] = [
                    'title' => $request->input("use_case_{$i}_title"),
                    'description' => $request->input("use_case_{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->use_cases_title,
                'description' => $request->use_cases_description,
                'use_cases' => $useCases
            ];

            // Save or update use cases section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'use_cases'
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
                'message' => 'Use Cases section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Use Cases section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Benefits Section
     */
    public function saveBenefitsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'benefits_title' => 'required|string|max:255',
            'benefit_1_title' => 'required|string|max:255',
            'benefit_1_description' => 'required|string',
            'benefit_2_title' => 'required|string|max:255',
            'benefit_2_description' => 'required|string',
            'benefit_3_title' => 'required|string|max:255',
            'benefit_3_description' => 'required|string',
            'benefit_4_title' => 'required|string|max:255',
            'benefit_4_description' => 'required|string',
            'benefit_5_title' => 'required|string|max:255',
            'benefit_5_description' => 'required|string',
            'benefit_6_title' => 'required|string|max:255',
            'benefit_6_description' => 'required|string',
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare benefits data
            $benefits = [];
            
            for ($i = 1; $i <= 6; $i++) {
                $benefits[] = [
                    'title' => $request->input("benefit_{$i}_title"),
                    'description' => $request->input("benefit_{$i}_description"),
                ];
            }

            $contentData = [
                'title' => $request->benefits_title,
                'benefits' => $benefits
            ];

            // Save or update benefits section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'benefits'
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
                'message' => 'Benefits section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Benefits section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Testimonials Section
     */
    public function saveTestimonialsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'testimonials_title' => 'required|string|max:255',
            'testimonial_1_name' => 'required|string|max:100',
            'testimonial_1_position' => 'required|string|max:100',
            'testimonial_1_text' => 'required|string',
            'testimonial_1_rating' => 'required|integer|min:1|max:5',
            'testimonial_2_name' => 'required|string|max:100',
            'testimonial_2_position' => 'required|string|max:100',
            'testimonial_2_text' => 'required|string',
            'testimonial_2_rating' => 'required|integer|min:1|max:5',
            'testimonial_3_name' => 'required|string|max:100',
            'testimonial_3_position' => 'required|string|max:100',
            'testimonial_3_text' => 'required|string',
            'testimonial_3_rating' => 'required|integer|min:1|max:5',
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare testimonials data
            $testimonials = [];
            
            for ($i = 1; $i <= 3; $i++) {
                $testimonials[] = [
                    'name' => $request->input("testimonial_{$i}_name"),
                    'position' => $request->input("testimonial_{$i}_position"),
                    'text' => $request->input("testimonial_{$i}_text"),
                    'rating' => $request->input("testimonial_{$i}_rating")
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
                    'order_by' => 8,
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
            'final_feature_pill_1' => 'required|string|max:100',
            'final_feature_pill_2' => 'required|string|max:100',
            'final_feature_pill_3' => 'required|string|max:100',
            'final_feature_pill_4' => 'required|string|max:100',
            'final_button1_text' => 'required|string|max:100',
            'final_button2_text' => 'required|string|max:100',
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

            $page = $this->getOrCreateVtsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vts_development');

            // Prepare content data
            $contentData = [
                'title' => $request->final_cta_title,
                'description' => $request->final_cta_description,
                'features' => [
                    $request->final_feature_pill_1,
                    $request->final_feature_pill_2,
                    $request->final_feature_pill_3,
                    $request->final_feature_pill_4
                ],
                'buttons' => [
                    [
                        'text' => $request->final_button1_text,
                        'classes' => 'btn-primary'
                    ],
                    [
                        'text' => $request->final_button2_text,
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
                    'order_by' => 9,
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
            $page = $this->getOrCreateVtsPage();
            
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
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
 * HRMS Development Page Controller
 * 
 * Manages all content sections for the HRMS Development solution page
 * including Hero, Intro, Core Features, Benefits, Use Cases, Testimonials, and Final CTA sections.
 */
class HrmsDevelopmentController extends Controller
{
    /**
     * Display the HRMS Development page management interface
     */
    public function index()
    {
        // Get or create the HRMS development page
        $page = $this->getOrCreateHrmsPage();
        $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $coreFeaturesContent = $this->getSectionContent($page->id, $pageType->id, 'core_features');
        $benefitsContent = $this->getSectionContent($page->id, $pageType->id, 'benefits');
        $useCasesContent = $this->getSectionContent($page->id, $pageType->id, 'use_cases');
        $testimonialsContent = $this->getSectionContent($page->id, $pageType->id, 'testimonials');
        $finalCtaContent = $this->getSectionContent($page->id, $pageType->id, 'final_cta');
       
        return view('dynamicpage::solutionspage.hrmsDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'coreFeaturesContent',
            'benefitsContent',
            'useCasesContent',
            'testimonialsContent',
            'finalCtaContent'
        ));
    }

    /**
     * Get or create the HRMS development page
     */
    private function getOrCreateHrmsPage(): Page
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
    // private function getSectionContent(int $pageId, string $sectionName): ?DynamicContent
    // {
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'hrms_development')->first();
        
    //         if (!$pageType) {
    //             return null;
    //         }
    
    //         return DynamicContent::where('page_id', $pageId)
    //             ->where('page_type_id', $pageType->id)
    //             ->where('section_name', $sectionName)
    //             ->first();
        
    // }

    
    private function getSectionContent($pageId, $pageTypeId, $sectionName)
    {
        return DynamicContent::where('page_id', $pageId)
        ->where('page_type_id',$pageTypeId)
        ->where('section_name', $sectionName)
        ->first();
    }

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

            $page = $this->getOrCreateHrmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');

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
                        'action' => 'modal',
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
        $validator = Validator::make($request->all(), [
            'intro_title' => 'required|string|max:500',
            'intro_description' => 'required|string',
            'feature1_title' => 'required|string|max:255',
            'feature1_description' => 'required|string',
            'feature2_title' => 'required|string|max:255',
            'feature2_description' => 'required|string',
            'feature3_title' => 'required|string|max:255',
            'feature3_description' => 'required|string',
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

            $page = $this->getOrCreateHrmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');

            // Prepare content data
            $contentData = [
                'title' => $request->intro_title,
                'description' => $request->intro_description,
                'features' => [
                    [
                        'title' => $request->feature1_title,
                        'description' => $request->feature1_description
                    ],
                    [
                        'title' => $request->feature2_title,
                        'description' => $request->feature2_description
                    ],
                    [
                        'title' => $request->feature3_title,
                        'description' => $request->feature3_description
                    ]
                ],
                'extraFeatures' => [
                    [
                        'title' => $request->extraFeature1_title,
                        'description' => $request->extraFeature1_description
                    ],
                    [
                        'title' => $request->extraFeature2_title,
                        'description' => $request->extraFeature2_description
                    ],
                    [
                        'title' => $request->extraFeature3_title,
                        'description' => $request->extraFeature3_description
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
        $validator = Validator::make($request->all(), [
            'core_title' => 'required|string|max:255',
            'core_description' => 'required|string',
            
            // Feature 1
            'feature1_title' => 'required|string|max:255',
            'feature1_subtitle' => 'required|string|max:255',
            'feature1_description' => 'required|string',
            'feature1_stat1_label' => 'required|string|max:100',
            'feature1_stat1_value' => 'required|string|max:20',
            'feature1_stat2_label' => 'required|string|max:100',
            'feature1_stat2_value' => 'required|string|max:20',
            'feature1_stat3_label' => 'required|string|max:100',
            'feature1_stat3_value' => 'required|string|max:20',
    
            // Feature 2
            'feature2_title' => 'required|string|max:255',
            'feature2_subtitle' => 'required|string|max:255',
            'feature2_description' => 'required|string',
            'feature2_stat1_label' => 'required|string|max:100',
            'feature2_stat1_value' => 'required|string|max:20',
            'feature2_stat2_label' => 'required|string|max:100',
            'feature2_stat2_value' => 'required|string|max:20',
            'feature2_stat3_label' => 'required|string|max:100',
            'feature2_stat3_value' => 'required|string|max:20',
    
            // Feature 3
            'feature3_title' => 'required|string|max:255',
            'feature3_subtitle' => 'required|string|max:255',
            'feature3_description' => 'required|string',
            'feature3_stat1_label' => 'required|string|max:100',
            'feature3_stat1_value' => 'required|string|max:20',
            'feature3_stat2_label' => 'required|string|max:100',
            'feature3_stat2_value' => 'required|string|max:20',
            'feature3_stat3_label' => 'required|string|max:100',
            'feature3_stat3_value' => 'required|string|max:20',

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
    
            $page = $this->getOrCreateHrmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');
    
            // Core features (3 required)
            $features = [];
            for ($i = 1; $i <= 3; $i++) {
                $stats = [];
                for ($j = 1; $j <= 3; $j++) {
                    $stats[] = [
                        'label' => $request->input("feature{$i}_stat{$j}_label"),
                        'value' => $request->input("feature{$i}_stat{$j}_value")
                    ];
                }
    
                $features[] = [
                    'title' => $request->input("feature{$i}_title"),
                    'subtitle' => $request->input("feature{$i}_subtitle"),
                    'description' => $request->input("feature{$i}_description"),
                    'stats' => $stats
                ];
            }
    
            // Extra features (up to 4 optional)
            $extraFeatures = [];
            for ($i = 1; $i <= 4; $i++) {
                $title = $request->input("extraFeature{$i}_title");
                $subtitle = $request->input("extraFeature{$i}_subtitle");
                $description = $request->input("extraFeature{$i}_description");
    
                if ($title || $subtitle || $description) {
                    $extraFeatures[] = [
                        'title' => $title,
                        'subtitle' => $subtitle,
                        'description' => $description
                    ];
                }
            }
    
            $contentData = [
                'title' => $request->core_title,
                'description' => $request->core_description,
                'features' => $features,
                'extra_features' => $extraFeatures
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
     * Save Benefits Section
     */
    public function saveBenefitsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'benefits_title' => 'required|string|max:255',
            'benefit1_title' => 'required|string|max:255',
            'benefit1_description' => 'required|string',
            'benefit2_title' => 'required|string|max:255',
            'benefit2_description' => 'required|string',
            'benefit3_title' => 'required|string|max:255',
            'benefit3_description' => 'required|string',
            'benefit4_title' => 'required|string|max:255',
            'benefit4_description' => 'required|string',
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

            $page = $this->getOrCreateHrmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');

            // Prepare content data
            $benefits = [];
            for ($i = 1; $i <= 4; $i++) {
                $benefits[] = [
                    'title' => $request->input("benefit{$i}_title"),
                    'description' => $request->input("benefit{$i}_description")
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
                    'order_by' => 4,
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
     * Save Use Cases Section
     */
    public function saveUseCasesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'use_cases_title' => 'required|string|max:255',
            'use_cases_description' => 'required|string',
            'use_case1_title' => 'required|string|max:255',
            'use_case1_description' => 'required|string',
            'use_case2_title' => 'required|string|max:255',
            'use_case2_description' => 'required|string',
            'use_case3_title' => 'required|string|max:255',
            'use_case3_description' => 'required|string',
            'use_case4_title' => 'required|string|max:255',
            'use_case4_description' => 'required|string',
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

            $page = $this->getOrCreateHrmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');

            // Prepare content data
            $useCases = [];
            for ($i = 1; $i <= 4; $i++) {
                $useCases[] = [
                    'title' => $request->input("use_case{$i}_title"),
                    'description' => $request->input("use_case{$i}_description")
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
                    'order_by' => 5,
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
     * Save Testimonials Section
     */
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

            $page = $this->getOrCreateHrmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');

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

            $page = $this->getOrCreateHrmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'hrms_development');

            // Prepare content data
            $contentData = [
                'title' => $request->final_cta_title,
                'description' => $request->final_cta_description,
                'features' => [
                    $request->feature_pill_1,
                    $request->feature_pill_2,
                    $request->feature_pill_3
                ],
                'buttons' => [
                    [
                        'text' => $request->button1_text,
                        'action' => 'modal',
                        'classes' => 'btn-primary'
                    ],
                    [
                        'text' => $request->button2_text,
                        'url' => $request->button2_url,
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
            $page = $this->getOrCreateHrmsPage();
            
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
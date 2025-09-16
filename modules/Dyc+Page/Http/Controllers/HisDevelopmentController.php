<?php

namespace Modules\DynamicPage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\DynamicPage\Entities\Page;   
use Modules\DynamicPage\Entities\PageType;
use Modules\DynamicPage\Entities\DynamicContent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class HisDevelopmentController extends Controller
{
    /**
     * Display the HIS Development page management interface
     */
    public function index()
    {
        // Get or create the HIS development page
        $page = $this->getOrCreateHisPage();
        $pageType = $this->getOrCreatePageType($page->id, 'his_development');
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $whyChooseContent = $this->getSectionContent($page->id, $pageType->id, 'why_choose');
        $coreFeaturesContent = $this->getSectionContent($page->id, $pageType->id, 'core_features');
        $whyTrustContent = $this->getSectionContent($page->id, $pageType->id, 'why_trust');
        $useCasesContent = $this->getSectionContent($page->id, $pageType->id, 'use_cases');
        $testimonialsContent = $this->getSectionContent($page->id, $pageType->id, 'testimonials');
        $finalCtaContent = $this->getSectionContent($page->id, $pageType->id, 'final_cta');
       
        return view('dynamicpage::solutionspage.hisDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'whyChooseContent',
            'coreFeaturesContent',
            'whyTrustContent',
            'useCasesContent',
            'testimonialsContent',
            'finalCtaContent'
        ));
    }

    /**
     * Get or create the HIS development page
     */
    private function getOrCreateHisPage(): Page
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
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'his_development')->first();
        
    //     if (!$pageType) {
    //         return null;
    //     }

    //     return DynamicContent::where('page_id', $pageId)
    //         ->where('page_type_id', $pageType->id)
    //         ->where('section_name', $sectionName)
    //         ->first();
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
            'feature_pill_1' => 'required|string|max:100',
            'feature_pill_2' => 'required|string|max:100',
            'feature_pill_3' => 'required|string|max:100',
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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

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
            $page = $this->getOrCreateHisPage();
            
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

    /**
     * Save Intro Section (What is HIS)
     */
    public function saveIntroSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'intro_title' => 'required|string|max:255',
            'intro_description' => 'required|string|max:1000',
            'feature1_title' => 'required|string|max:100',
            'feature1_description' => 'required|string|max:255',
            'feature2_title' => 'required|string|max:100',
            'feature2_description' => 'required|string|max:255',
            'feature3_title' => 'required|string|max:100',
            'feature3_description' => 'required|string|max:255',
            'feature4_title' => 'required|string|max:100',
            'feature4_description' => 'required|string|max:255',
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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

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
                    ],
                    [
                        'title' => $request->feature4_title,
                        'description' => $request->feature4_description
                    ]
                ]
            ];

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
                'message' => 'What is HIS section saved successfully!'
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
     * Save Why Choose HIS Section
     */
    public function saveWhyChooseSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'section_title' => 'required|string|max:255',
            'section_subtitle' => 'required|string|max:500',
            'main_description' => 'required|string|max:1000',
            'benefit1_title' => 'required|string|max:100',
            'benefit1_description' => 'required|string|max:500',
            'benefit1_features' => 'required|array|min:2',
            'benefit2_title' => 'required|string|max:100',
            'benefit2_description' => 'required|string|max:500',
            'benefit2_features' => 'required|array|min:4',
            'benefit3_title' => 'required|string|max:100',
            'benefit3_description' => 'required|string|max:500',
            'benefit3_security_features' => 'required|array|min:4',
            'benefit3_compliance_features' => 'required|array|min:4',
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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

            $contentData = [
                'title' => $request->section_title,
                'subtitle' => $request->section_subtitle,
                'main_description' => $request->main_description,
                'benefits' => [
                    [
                        'title' => $request->benefit1_title,
                        'description' => $request->benefit1_description,
                        'features' => $request->benefit1_features
                    ],
                    [
                        'title' => $request->benefit2_title,
                        'description' => $request->benefit2_description,
                        'features' => $request->benefit2_features
                    ],
                    [
                        'title' => $request->benefit3_title,
                        'description' => $request->benefit3_description,
                        'security_features' => $request->benefit3_security_features,
                        'compliance_features' => $request->benefit3_compliance_features
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_choose'
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
                'message' => 'Why Choose HIS section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error saving Why Choose HIS section: ' . $e->getMessage()
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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

            // Build capabilities array
            $capabilities = [];
            for ($i = 1; $i <= 11; $i++) {
                // Build features array
                $features = [];
                for ($j = 1; $j <= 3; $j++) {
                    $features[] = $request->input("capability{$i}_feature{$j}");
                }

                $capability = [
                    'title' => $request->input("capability{$i}_title"),
                    'subtitle' => $request->input("capability{$i}_subtitle"),
                    'description' => $request->input("capability{$i}_description"),
                    'features' => $features
                ];

                // Add dashboard data only for first 3 capabilities
                if ($i <= 3) {
                    // Build dashboard stats array
                    $dashboardStats = [];
                    for ($k = 1; $k <= 3; $k++) {
                        $dashboardStats[] = [
                            'label' => $request->input("capability{$i}_stat{$k}_label"),
                            'value' => $request->input("capability{$i}_stat{$k}_value")
                        ];
                    }

                    $capability['dashboard'] = [
                        'title' => $request->input("capability{$i}_dashboard_title"),
                        'stats' => $dashboardStats
                    ];
                }

                $capabilities[] = $capability;
            }

            $contentData = [
                'title' => $request->capabilities_title,
                'description' => $request->capabilities_description,
                'capabilities' => $capabilities
            ];

            // Save or update core capabilities section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'core_features'
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
                'message' => 'Core Capabilities section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Core Capabilities section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Why Trust Section
     */
    public function saveWhyTrustSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'section_title' => 'required|string|max:255',
            'trust1_title' => 'required|string|max:100',
            'trust1_description' => 'required|string|max:255',
            'trust2_title' => 'required|string|max:100',
            'trust2_description' => 'required|string|max:255',
            'trust3_title' => 'required|string|max:100',
            'trust3_description' => 'required|string|max:255',
            'trust4_title' => 'required|string|max:100',
            'trust4_description' => 'required|string|max:255',
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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

            $trustFactors = [];
            for ($i = 1; $i <= 4; $i++) {
                $trustFactors[] = [
                    'title' => $request->input("trust{$i}_title"),
                    'description' => $request->input("trust{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->section_title,
                'trust_factors' => $trustFactors
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_trust'
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
                'message' => 'Why Teams Trust section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error saving Why Teams Trust section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Use Cases Section
     */
    public function saveUseCasesSection(Request $request): JsonResponse
    {
        // return response()->json($request);
        $validator = Validator::make($request->all(), [
            'section_title' => 'required|string|max:255',
            'section_description' => 'required|string|max:500',
            'usecase1_title' => 'required|string|max:100',
            'usecase1_description' => 'required|string|max:255',
            'usecase2_title' => 'required|string|max:100',
            'usecase2_description' => 'required|string|max:255',
            'usecase3_title' => 'required|string|max:100',
            'usecase3_description' => 'required|string|max:255',
            'usecase4_title' => 'required|string|max:100',
            'usecase4_description' => 'required|string|max:255',
            'usecase5_title' => 'required|string|max:100',
            'usecase5_description' => 'required|string|max:255',
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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

            $useCases = [];
            for ($i = 1; $i <= 5; $i++) {
                $useCases[] = [
                    'title' => $request->input("usecase{$i}_title"),
                    'description' => $request->input("usecase{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->section_title,
                'description' => $request->section_description,
                'footer_text' => $request->footer_text,
                'use_cases' => $useCases
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'use_cases'
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
            'testimonial1_review' => 'required|string|max:500',
            'testimonial1_rating' => 'required|integer|min:1|max:5',
            'testimonial2_name' => 'required|string|max:100',
            'testimonial2_role' => 'required|string|max:100',
            'testimonial2_company' => 'required|string|max:100',
            'testimonial2_review' => 'required|string|max:500',
            'testimonial2_rating' => 'required|integer|min:1|max:5',
            'testimonial3_name' => 'required|string|max:100',
            'testimonial3_role' => 'required|string|max:100',
            'testimonial3_company' => 'required|string|max:100',
            'testimonial3_review' => 'required|string|max:500',
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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

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

            $page = $this->getOrCreateHisPage();
            $pageType = $this->getOrCreatePageType($page->id, 'his_development');

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
                        'classes' => 'btn-primary'
                    ],
                    [
                        'text' => $request->button2_text,
                        'classes' => 'btn-secondary'
                    ]
                ]
            ];

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
}
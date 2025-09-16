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


class VmsDevelopmentController extends Controller
{
     /**
     * Display the Vms Development page management interface
     */
    public function index()
    {
        
        // Get or create the Vms development page
        $page = $this->getOrCreateVmsPage();
        $pageType = $this->getOrCreatePageType($page->id, 'vms_development');
        
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $keyBenefitsContent = $this->getSectionContent($page->id, $pageType->id, 'key_benefits');
        $coreFeaturesContent = $this->getSectionContent($page->id, $pageType->id, 'core_features');
        $whyTrustContent = $this->getSectionContent($page->id, $pageType->id, 'why_trust');
        $realSecurityContent = $this->getSectionContent($page->id, $pageType->id, 'real_security');
        $useCasesContent = $this->getSectionContent($page->id, $pageType->id, 'use_cases');
        $testimonialsContent = $this->getSectionContent($page->id, $pageType->id, 'testimonials');
        $finalCtaContent = $this->getSectionContent($page->id, $pageType->id, 'final_cta');
       
        return view('dynamicpage::solutionspage.VmsDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'coreFeaturesContent',
            'whyTrustContent',
            'useCasesContent',
            'testimonialsContent',
            'finalCtaContent',
            'keyBenefitsContent',
            'realSecurityContent'
        ));
    }

    /**
     * Get or create the Vms development page
     */
    private function getOrCreateVmsPage(): Page
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
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'vms_development')->first();
        
    //         if (!$pageType) {
    //             return null;
    //         }
    
    //         return DynamicContent::where('page_id', $pageId)
    //             ->where('page_type_id', $pageType->id)
    //             ->where('section_name', $sectionName)
    //             ->first();
        
    // }

    /**
     * Save Hero Section
     */
    public function saveHeroSection(Request $request): JsonResponse
    {

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');

            // Prepare content data
            $contentData = [
                'title' => $request->hero_title,
                'subtitle' => $request->hero_subtitle,
                'features' => [
                    $request->feature_pill_1,
                    $request->feature_pill_2
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
     * Save Intro Section
     */

    public function saveIntroSection(Request $request): JsonResponse
    {
    
        try {
            DB::beginTransaction();
    
            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');
    
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


    public function saveKeyBenefitsSection(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();
    
            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');
    
            $contentData = [
                'title' => $request->benefits_title,
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
                    'section_name' => 'key_benefits'
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
                'message' => 'Key Benefits section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving key benefits: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Save Core Features Section
     */

    public function saveCoreFeaturesSection(Request $request): JsonResponse
    {
        $validationRules = [
            'capabilities_title' => 'required|string|max:255',
            'capabilities_description' => 'required|string',
            'is_active' => 'boolean'
        ];

        // Add validation rules for all 5 capabilities
        for ($i = 1; $i <= 5; $i++) {
            $validationRules = array_merge($validationRules, [
                "capability{$i}_title" => 'required|string|max:255',
                "capability{$i}_subtitle" => 'required|string|max:255',
                "capability{$i}_description" => 'required|string',
            ]);

            // Add validation for features
            if ($i <= 3) {
                for ($j = 1; $j <= 3; $j++) {
                    $validationRules["capability{$i}_feature{$j}"] = 'required|string|max:255';
                }

            // Add validation for dashboard (only for first 3 capabilities)
           
                $validationRules["capability{$i}_dashboard_title"] = 'required|string|max:255';
                
                // Add validation for dashboard stats
                for ($k = 1; $k <= 3; $k++) {
                    $validationRules["capability{$i}_stat{$k}_label"] = 'required|string|max:100';
                    $validationRules["capability{$i}_stat{$k}_value"] = 'required|string|max:50';
                }
            }
        }

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');

            // Build capabilities array
            $capabilities = [];
            for ($i = 1; $i <= 5; $i++) {
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
                    'order_by' => 3,
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


    public function saveRealSecuritySection(Request $request): JsonResponse
    {
        $validationRules = [
            'section_title' => 'required|string|max:255',
            'section_subtitle' => 'required|string|max:500',
            'is_active' => 'boolean',
        ];
    
        for ($i = 1; $i <= 4; $i++) {
            $validationRules = array_merge($validationRules, [
                "facility{$i}_title" => 'required|string|max:255',
                "facility{$i}_description" => 'required|string|max:500',
            ]);
        }
    
        $validator = Validator::make($request->all(), $validationRules);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            DB::beginTransaction();
    
            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');
    
            $facilities = [];
            for ($i = 1; $i <= 4; $i++) {
                $facilities[] = [
                    'title' => $request->input("facility{$i}_title"),
                    'description' => $request->input("facility{$i}_description"),
                ];
            }
    
            $contentData = [
                'title' => $request->section_title,
                'subtitle' => $request->section_subtitle,
                'facilities' => $facilities,
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'real_security'
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
                'message' => 'Real Security section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving Real Security section: ' . $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Save why_trust Section
     */
    public function saveWhyTrustSection(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');

            // Prepare content data
            $why_trust = [];
            for ($i = 1; $i <= 4; $i++) {
                $why_trust[] = [
                    'title' => $request->input("benefit{$i}_title"),
                    'description' => $request->input("benefit{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->whyTrust_title,
                'why_trust' => $why_trust
            ];

            // Save or update why_trust section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_trust'
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
                'message' => 'Why Trust section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving why_trust section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Testimonials Section
     */
    public function saveTestimonialsSection(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');

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

            $page = $this->getOrCreateVmsPage();
            $pageType = $this->getOrCreatePageType($page->id, 'vms_development');

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
            $page = $this->getOrCreateVmsPage();
            
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

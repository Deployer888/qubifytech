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
 * MVP Development Page Controller
 * 
 * Manages all content sections for the MVP Development service page
 * including Hero, Intro, Services, Industries, Tech Stack, Process,
 * Benefits, Methodologies, Why Qubify, Hire Developers, and FAQ sections.
 */
class MvpDevelopmentController extends Controller
{
    /**
     * Display the MVP Development page management interface
     */
    public function index()
    {
        // Get or create the MVP development page
        $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $whatWeOfferContent = $this->getSectionContent($page->id, $pageType->id, 'what_we_offer');
        $additionalServicesContent = $this->getSectionContent($page->id, $pageType->id, 'additional_services');
        $expertiseContent = $this->getSectionContent($page->id, $pageType->id, 'expertise');
        $techStackContent = $this->getSectionContent($page->id, $pageType->id, 'tech_stack');
        $mvpProcessContent = $this->getSectionContent($page->id, $pageType->id, 'mvp_process');
        $keyBenefitsContent = $this->getSectionContent($page->id, $pageType->id, 'key_benefits');
        $mvpMethodologiesContent = $this->getSectionContent($page->id, $pageType->id, 'mvp_methodologies');
        $developmentTimelineContent = $this->getSectionContent($page->id, $pageType->id, 'development_timeline');
        $mvpProcessActuallyContent = $this->getSectionContent($page->id, $pageType->id, 'mvp_process_actually');
        $whyQubifyContent = $this->getSectionContent($page->id, $pageType->id, 'why_qubify');
        $industriesContent = $this->getSectionContent($page->id, $pageType->id, 'industries');
        $hireDevelopersContent = $this->getSectionContent($page->id, $pageType->id, 'hire_developers');
        $faqContent = $this->getSectionContent($page->id, $pageType->id, 'faq');
       
        return view('dynamicpage::servicespage.mvpDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'whatWeOfferContent',
            'additionalServicesContent',
            'expertiseContent',
            'techStackContent',
            'mvpProcessContent',
            'keyBenefitsContent',
            'mvpMethodologiesContent',
            'whyQubifyContent',
            'hireDevelopersContent',
            'faqContent',
            'mvpProcessActuallyContent','developmentTimelineContent','industriesContent'
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
            'feature_pill_1' => 'required|string|max:50',
            'feature_pill_2' => 'required|string|max:50',
            'feature_pill_3' => 'required|string|max:50',
            'button1_text' => 'required|string|max:100',
            'button2_text' => 'required|string|max:100',
            'button2_link' => 'required|string|max:255',
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
            $page = $this->getOrCreateMvpPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare content data
            $contentData = [
                'title' => $request->hero_title,
                'subtitle' => $request->hero_subtitle,
                'feature_pills' => [
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
                        'link' => $request->button2_link,
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
            'intro_description_1' => 'required|string',
            'intro_description_2' => 'required|string',
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
            $page = $this->getOrCreateMvpPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare content data
            $contentData = [
                'title' => $request->intro_title,
                'description_1' => $request->intro_description_1,
                'description_2' => $request->intro_description_2
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
     * Save What We Offer Section
     */
    public function saveWhatWeOfferSection(Request $request): JsonResponse
    {
        // Dynamically build validation rules for 3 services × 3 features × 3 stats
        $rules = [
            'offer_title' => 'required|string|max:255',
            'offer_subtitle' => 'required|string',
            'is_active' => 'boolean'
        ];
    
        for ($i = 1; $i <= 6; $i++) {   // You have up to 6 services
            $rules["offer{$i}_title"] = 'required|string|max:255';
            $rules["offer{$i}_subtitle"] = 'required|string|max:255';
            $rules["offer{$i}_description"] = 'required|string';
    
            for ($j = 1; $j <= 3; $j++) {   // ✅ Only 3 features + 3 stats
                $rules["offer{$i}_feature{$j}"] = 'required|string|max:100';
                $rules["offer{$i}_stat{$j}_label"] = 'required|string|max:100';
                $rules["offer{$i}_stat{$j}_value"] = 'required|string|max:20';
            }
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            DB::beginTransaction();
          $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
    
            // Prepare services data
            $services = [];
            for ($i = 1; $i <= 6; $i++) {
                $tags = [];
                $benefits = [];
    
                for ($j = 1; $j <= 3; $j++) {   // ✅ Only 3
                    $tags[] = $request->input("offer{$i}_feature{$j}");
                    $benefits[] = [
                        'label' => $request->input("offer{$i}_stat{$j}_label"),
                        'value' => $request->input("offer{$i}_stat{$j}_value")
                    ];
                }
    
                $services[] = [
                    'title' => $request->input("offer{$i}_title"),
                    'subtitle' => $request->input("offer{$i}_subtitle"),
                    'description' => $request->input("offer{$i}_description"),
                    'tags' => $tags,
                    'benefits' => $benefits,
                    'gradient' => $request->input("offer{$i}_gradient")
                ];
            }
    
            $contentData = [
                'title' => $request->offer_title,
                'description' => $request->offer_subtitle,
                'services' => $services
            ];
    
            // Save or update what we offer section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'what_we_offer'
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
                'message' => 'What We Offer section saved successfully!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving What We Offer section: ' . $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Save Additional Services Section
     */

    public function saveAdditionalServicesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'is_active' => 'boolean',
            // Validate 5 services
            'services' => 'required|array|min:5|max:5',
            'services.*.title' => 'required|string|max:255',
            'services.*.description' => 'required|string',
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
            $page = $this->getOrCreateMvpPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');


            $services = collect($request->input('services'))->map(function ($service) {
                return [
                    'title' => $service['title'] ?? null,
                    'description' => $service['description'] ?? null,
                ];
            })->all();

            $contentData = [
                 'is_active' => $request->input('is_active', true),
                'services' => $services,
                'title' => $request->input('section_title'),
                'subtitle' => $request->input('section_subtitle')
            ];

            // Save or update MVP services section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'additional_services'
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
                'message' => 'MVP Services section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving MVP Services section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Industries Section
     */
    public function saveExpertiseSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'expertise_title' => 'required|string|max:255',
            'expertise_description' => 'required|string',
            // 6 Expertise fields
            'expertise1_title' => 'required|string|max:255',
            'expertise1_description' => 'required|string',  
            'expertise2_title' => 'required|string|max:255',
            'expertise2_description' => 'required|string',  
            'expertise3_title' => 'required|string|max:255',
            'expertise3_description' => 'required|string',  
            'expertise4_title' => 'required|string|max:255',
            'expertise4_description' => 'required|string',  
            'expertise5_title' => 'required|string|max:255',
            'expertise5_description' => 'required|string',  
            'expertise6_title' => 'required|string|max:255',
            'expertise6_description' => 'required|string',
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
 $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
    
            // Collect expertise data
            $expertise = [];
            for ($i = 1; $i <= 6; $i++) {
                $expertise[] = [
                    'title' => $request->input("expertise{$i}_title"),
                    'description' => $request->input("expertise{$i}_description"),
                ];
            }
    
            $contentData = [
                'title' => $request->expertise_title,
                'description' => $request->expertise_description,
                'expertise' => $expertise
            ];
    
            // Save or update
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'expertise'
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
                'message' => 'Expertise section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Expertise section: ' . $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Save Tech Stack Section
     */
    public function saveTechStackSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'tech_title' => 'required|string|max:255',
            'tech_description' => 'required|string',
            // 7 Tech Categories
            'tech1_title' => 'required|string|max:255',
            'tech1_description' => 'required|string',
            'tech1_tag1' => 'required|string|max:100',
            'tech1_tag2' => 'required|string|max:100',
            'tech1_tag3' => 'required|string|max:100',
    
            'tech2_title' => 'required|string|max:255',
            'tech2_description' => 'required|string',
            'tech2_tag1' => 'required|string|max:100',
            'tech2_tag2' => 'required|string|max:100',
            'tech2_tag3' => 'required|string|max:100',
    
            'tech3_title' => 'required|string|max:255',
            'tech3_description' => 'required|string',
            'tech3_tag1' => 'required|string|max:100',
            'tech3_tag2' => 'required|string|max:100',
            'tech3_tag3' => 'required|string|max:100',
    
            'tech4_title' => 'required|string|max:255',
            'tech4_description' => 'required|string',
            'tech4_tag1' => 'required|string|max:100',
            'tech4_tag2' => 'required|string|max:100',
            'tech4_tag3' => 'required|string|max:100',
    
            'tech5_title' => 'required|string|max:255',
            'tech5_description' => 'required|string',
            'tech5_tag1' => 'required|string|max:100',
            'tech5_tag2' => 'required|string|max:100',
            'tech5_tag3' => 'required|string|max:100',
    
            'tech6_title' => 'required|string|max:255',
            'tech6_description' => 'required|string',
            'tech6_tag1' => 'required|string|max:100',
            'tech6_tag2' => 'required|string|max:100',
            'tech6_tag3' => 'required|string|max:100',
    
            'tech7_title' => 'required|string|max:255',
            'tech7_description' => 'required|string',
            'tech7_tag1' => 'required|string|max:100',
            'tech7_tag2' => 'required|string|max:100',
            'tech7_tag3' => 'required|string|max:100',
    
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
     $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare categories
            $categories = [];
            for ($i = 1; $i <= 7; $i++) {
                $categories[] = [
                    'icon' => $request->input("tech{$i}_icon"),
                    'title' => $request->input("tech{$i}_title"),
                    'description' => $request->input("tech{$i}_description"),
                    'tags' => [
                        $request->input("tech{$i}_tag1"),
                        $request->input("tech{$i}_tag2"),
                        $request->input("tech{$i}_tag3")
                    ],
                    'gradient' => $request->input("tech{$i}_gradient")
                ];
            }
    
            $contentData = [
                'title' => $request->tech_title,
                'description' => $request->tech_description,
                'categories' => $categories
            ];
    
            // Save or update
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'tech_stack'
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
                'message' => 'Tech Stack section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving Tech Stack section: ' . $e->getMessage()
            ], 500);
        }
    }
    
  
  /**
     * Save MVP Process Section
     */
    public function saveMvpProcessSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'process_title' => 'required|string|max:255',
            'process_description' => 'required|string',
            // 7 Process Steps
            'step1_title' => 'required|string|max:255',
            'step1_description' => 'required|string',
            'step2_title' => 'required|string|max:255',
            'step2_description' => 'required|string',
            'step3_title' => 'required|string|max:255',
            'step3_description' => 'required|string',
            'step4_title' => 'required|string|max:255',
            'step4_description' => 'required|string',
            'step5_title' => 'required|string|max:255',
            'step5_description' => 'required|string',
            'step6_title' => 'required|string|max:255',
            'step6_description' => 'required|string',
            'step7_title' => 'required|string|max:255',
            'step7_description' => 'required|string',
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
 $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare content data
            $steps = [];
            for ($i = 1; $i <= 7; $i++) {
                $steps[] = [
                    'number' => $i,
                    'title' => $request->input("step{$i}_title"),
                    'description' => $request->input("step{$i}_description"),
                ];
            }

            $contentData = [
                'title' => $request->process_title,
                'description' => $request->process_description,
                'steps' => $steps
            ];

            // Save or update MVP process section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'mvp_process'
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
                'message' => 'MVP Process section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving MVP Process section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Key Benefits Section
     */
    public function saveKeyBenefitsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'benefits_title' => 'required|string|max:255',
            'benefits_description' => 'required|string',
            // 6 Benefits
            'benefit1_title' => 'required|string|max:255',
            'benefit1_description' => 'required|string',
            'benefit2_title' => 'required|string|max:255',
            'benefit2_description' => 'required|string',
            'benefit3_title' => 'required|string|max:255',
            'benefit3_description' => 'required|string',
            'benefit4_title' => 'required|string|max:255',
            'benefit4_description' => 'required|string',
            'benefit5_title' => 'required|string|max:255',
            'benefit5_description' => 'required|string',
            'benefit6_title' => 'required|string|max:255',
            'benefit6_description' => 'required|string',
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
 $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare content data
            $benefits = [];
            for ($i = 1; $i <= 6; $i++) {
                $benefits[] = [
                    'icon' => $request->input("benefit{$i}_icon"),
                    'title' => $request->input("benefit{$i}_title"),
                    'description' => $request->input("benefit{$i}_description"),
                    'gradient' => $request->input("benefit{$i}_gradient")
                ];
            }

            $contentData = [
                'title' => $request->benefits_title,
                'description' => $request->benefits_description,
                'benefits' => $benefits
            ];

            // Save or update key benefits section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'key_benefits'
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
                'message' => 'Key Benefits section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Key Benefits section: ' . $e->getMessage()
            ], 500);
        }
    }   
 /**
     * Save MVP Methodologies Section
     */
    public function saveMvpMethodologiesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'methodologies_title' => 'required|string|max:255',
            'methodologies_description' => 'required|string',
            // 4 Methodologies
            'methodology1_title' => 'required|string|max:255',
            'methodology1_description' => 'required|string',
            'methodology2_title' => 'required|string|max:255',
            'methodology2_description' => 'required|string',
            'methodology3_title' => 'required|string|max:255',
            'methodology3_description' => 'required|string',
            'methodology4_title' => 'required|string|max:255',
            'methodology4_description' => 'required|string',
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
     $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            $methodologies = [];
            for ($i = 1; $i <= 4; $i++) {
                $methodologies[] = [
                    'icon' => $request->input("methodology{$i}_icon"),
                    'title' => $request->input("methodology{$i}_title"),
                    'description' => $request->input("methodology{$i}_description"),
                    'gradient' => $request->input("methodology{$i}_gradient")
                ];
            }
    
            $contentData = [
                'title' => $request->methodologies_title,
                'description' => $request->methodologies_description,
                'methodologies' => $methodologies
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'mvp_methodologies'
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
                'message' => 'MVP Methodologies section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving MVP Methodologies section: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveDevelopmentTimelineSection(Request $request): JsonResponse
    {
        $rules = [
            'timeline_title' => 'required|string|max:255',
            'timeline_description' => 'required|string',
        ];
    
        // Add validation rules for 7 steps
        for ($i = 1; $i <= 7; $i++) {
            $rules["step{$i}_title"] = 'required|string|max:255';
            $rules["step{$i}_description"] = 'required|string';
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            DB::beginTransaction();
     $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            $steps = [];
            for ($i = 1; $i <= 7; $i++) {
                $steps[] = [
                    'title' => $request->input("step{$i}_title"),
                    'description' => $request->input("step{$i}_description"),
                ];
            }
    
            $contentData = [
                'title' => $request->timeline_title,
                'description' => $request->timeline_description,
                'steps' => $steps
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'development_timeline'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 10,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Development Timeline section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving Development Timeline section: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveMvpProcessActuallySection(Request $request): JsonResponse
    {
        $rules = [
            'process_title' => 'required|string|max:255',
            'process_description' => 'required|string',
        ];
    
        // Validation for 5 steps
        for ($i = 1; $i <= 5; $i++) {
            $rules["step{$i}_title"] = 'required|string|max:255';
            $rules["step{$i}_description"] = 'required|string';
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            DB::beginTransaction();
     $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            $steps = [];
            for ($i = 1; $i <= 5; $i++) {
                $steps[] = [
                    'title' => $request->input("step{$i}_title"),
                    'description' => $request->input("step{$i}_description"),
                ];
            }
    
            $contentData = [
                'title' => $request->process_title,
                'description' => $request->process_description,
                'steps' => $steps
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'mvp_process_actually'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 11,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'MVP Process Actually section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving MVP Process Actually section: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    /**
     * Save Why Qubify Section
     */
    public function saveWhyQubifySection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'why_qubify_title' => 'required|string|max:255',
            'why_qubify_description' => 'required|string',
            'why_qubify_subtitle' => 'required|string|max:255',
            // 5 Features
            'feature1_title' => 'required|string|max:255',
            'feature1_description' => 'required|string',
            'feature2_title' => 'required|string|max:255',
            'feature2_description' => 'required|string',
            'feature3_title' => 'required|string|max:255',
            'feature3_description' => 'required|string',
            'feature4_title' => 'required|string|max:255',
            'feature4_description' => 'required|string',
            'feature5_title' => 'required|string|max:255',
            'feature5_description' => 'required|string',
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
 $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare content data
            $features = [];
            for ($i = 1; $i <= 5; $i++) {
                $features[] = [
                    'title' => $request->input("feature{$i}_title"),
                    'description' => $request->input("feature{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->why_qubify_title,
                'description' => $request->why_qubify_description,
                'subtitle' => $request->why_qubify_subtitle,
                'features' => $features
            ];

            // Save or update why qubify section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_qubify'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 10,
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

    public function saveIndustriesSection(Request $request): JsonResponse
    {
        $rules = [
            'industries_title' => 'required|string|max:255',
            'industries_description' => 'required|string',
            'is_active' => 'boolean'
        ];
    
        for ($i = 1; $i <= 6; $i++) {
            $rules["industry{$i}_title"] = 'required|string|max:255';
            $rules["industry{$i}_description"] = 'required|string';
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            DB::beginTransaction();
     $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare industries data
            $industries = [];
            for ($i = 1; $i <= 6; $i++) {
                $industries[] = [
                    'title' => $request->input("industry{$i}_title"),
                    'description' => $request->input("industry{$i}_description"),
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
                    'order_by' => 20,
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
                'message' => 'Error saving industries section: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    /**

     * Save Hire Developers Section
     */
    public function saveHireDevelopersSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'hire_title' => 'required|string|max:255',
            'hire_description' => 'required|string',
            'hire_subtitle' => 'required|string|max:255',
    
            // 4 Specializations (only title + tags as a single field)
            'specialization1_title' => 'required|string|max:255',
            'specialization1_tags' => 'required|string',
    
            'specialization2_title' => 'required|string|max:255',
            'specialization2_tags' => 'required|string',
    
            'specialization3_title' => 'required|string|max:255',
            'specialization3_tags' => 'required|string',
    
            'specialization4_title' => 'required|string|max:255',
            'specialization4_tags' => 'required|string',
    
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
 $page = $this->getOrCreateMvpPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
    
            // Prepare content data
            $specializations = [];
            for ($i = 1; $i <= 4; $i++) {
                $tagsString = $request->input("specialization{$i}_tags");
                $tagsArray = array_filter(array_map('trim', explode(',', $tagsString))); // convert to array
    
                $specializations[] = [
                    'title' => $request->input("specialization{$i}_title"),
                    'tags' => $tagsArray
                ];
            }
    
            $contentData = [
                'title' => $request->hire_title,
                'description' => $request->hire_description,
                'subtitle' => $request->hire_subtitle,
                'specializations' => $specializations
            ];
    
            // Save or update hire developers section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'hire_developers'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 11,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Hire Developers section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Error saving Hire Developers section: ' . $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Save FAQ Section
     */
    public function saveFaqSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'faq_title' => 'required|string|max:255',
            'faq_description' => 'required|string',
            // 8 FAQs
            'faq1_question' => 'required|string|max:500',
            'faq1_answer' => 'required|string',
            'faq2_question' => 'required|string|max:500',
            'faq2_answer' => 'required|string',
            'faq3_question' => 'required|string|max:500',
            'faq3_answer' => 'required|string',
            'faq4_question' => 'required|string|max:500',
            'faq4_answer' => 'required|string',
            'faq5_question' => 'required|string|max:500',
            'faq5_answer' => 'required|string',
            'faq6_question' => 'required|string|max:500',
            'faq6_answer' => 'required|string',
            'faq7_question' => 'required|string|max:500',
            'faq7_answer' => 'required|string',
            'faq8_question' => 'required|string|max:500',
            'faq8_answer' => 'required|string',
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
            $page = $this->getOrCreateMvpPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');
            // Prepare content data
            $faqs = [];
            for ($i = 1; $i <= 8; $i++) {
                $faqs[] = [
                    'question' => $request->input("faq{$i}_question"),
                    'answer' => $request->input("faq{$i}_answer")
                ];
            }

            $contentData = [
                'title' => $request->faq_title,
                'description' => $request->faq_description,
                'faqs' => $faqs
            ];

            // Save or update FAQ section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'faq'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 12,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'FAQ section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving FAQ section: ' . $e->getMessage()
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
            $page = $this->getOrCreateMvpPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mvp_development');

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
     * Get or create MVP development page
     */
    private function getOrCreateMvpPage()
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
            ]
        );
    }

    /**
     * Get section content
     */
    // private function getSectionContent($pageId, $sectionName)
    // {
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'mvp_development')->first();
        
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
}
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

class SoftwareDevelopmentController extends Controller
{
    public function index()
    {
        // Get or create the software development page
        $page = $this->getOrCreateSoftwareDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'software-development');
        
        // Get existing content for all sections and extract content_json
        $heroSection = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $heroContent = $heroSection ? $heroSection->content_json : [];
        
        $introSection = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $introContent = $introSection ? $introSection->content_json : [];
        
        $coreServicesSection = $this->getSectionContent($page->id, $pageType->id, 'core_services');
        $coreServicesContent = $coreServicesSection ? $coreServicesSection->content_json : [];
        
        $specializedServicesSection = $this->getSectionContent($page->id, $pageType->id, 'additional_services');
        $specializedServicesContent = $specializedServicesSection ? $specializedServicesSection->content_json : [];

        $servicesSection = $this->getSectionContent($page->id, $pageType->id, 'specialized_services');
        $servicesContent = $servicesSection ? $servicesSection->content_json : [];    
        
        $technologyStackSection = $this->getSectionContent($page->id, $pageType->id, 'technology_stack');
        $technologyStackContent = $technologyStackSection ? $technologyStackSection->content_json : [];
        
        $processSection = $this->getSectionContent($page->id, $pageType->id, 'process');
        $processContent = $processSection ? $processSection->content_json : [];
        
        $methodologiesSection = $this->getSectionContent($page->id, $pageType->id, 'methodologies');
        $methodologiesContent = $methodologiesSection ? $methodologiesSection->content_json : [];
        
        $developmentProcessSection = $this->getSectionContent($page->id, $pageType->id, 'development_steps');
        $developmentProcessContent = $developmentProcessSection ? $developmentProcessSection->content_json : [];
        
        $benefitsSection = $this->getSectionContent($page->id, $pageType->id, 'benefits');
        $benefitsContent = $benefitsSection ? $benefitsSection->content_json : [];
        
        $understandingProcessSection = $this->getSectionContent($page->id, $pageType->id, 'understanding_process');
        $understandingProcessContent = $understandingProcessSection ? $understandingProcessSection->content_json : [];
        
        $whyChooseUsSection = $this->getSectionContent($page->id, $pageType->id, 'why_choose_us');
        $whyChooseUsContent = $whyChooseUsSection ? $whyChooseUsSection->content_json : [];
        
        $whatMakesDifferentSection = $this->getSectionContent($page->id, $pageType->id, 'what_makes_different');
        $whatMakesDifferentContent = $whatMakesDifferentSection ? $whatMakesDifferentSection->content_json : [];
        
        $benefitsCustomSection = $this->getSectionContent($page->id, $pageType->id, 'custom_benefits');
        $benefitsCustomContent = $benefitsCustomSection ? $benefitsCustomSection->content_json : [];
        
        $whyChooseDetailedSection = $this->getSectionContent($page->id, $pageType->id, 'custom_development');
        $whyChooseDetailedContent = $whyChooseDetailedSection ? $whyChooseDetailedSection->content_json : [];
        
        $industriesSection = $this->getSectionContent($page->id, $pageType->id, 'industries');
        $industriesContent = $industriesSection ? $industriesSection->content_json : [];
        
        $onDemandDevelopersSection = $this->getSectionContent($page->id, $pageType->id, 'on_demand_developers');
        $onDemandDevelopersContent = $onDemandDevelopersSection ? $onDemandDevelopersSection->content_json : [];
        
        $faqSection = $this->getSectionContent($page->id, $pageType->id, 'faq');
        $faqContent = $faqSection ? $faqSection->content_json : [];
        $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
        return view('dynamicpage::servicespage.softwareDevelopment', compact(
            'page', 
            'pageType', 
            'seo_data', 
            'heroContent', 
            'introContent', 
            'coreServicesContent',
            'specializedServicesContent',
            'technologyStackContent',
            'processContent',
            'methodologiesContent',
            'developmentProcessContent',
            'benefitsContent',
            'understandingProcessContent',
            'whyChooseUsContent',
            'whatMakesDifferentContent',
            'benefitsCustomContent',
            'whyChooseDetailedContent',
            'industriesContent',
            'onDemandDevelopersContent',
            'faqContent','introSection','heroSection','coreServicesSection','servicesSection','servicesContent','technologyStackSection','processSection','methodologiesSection','developmentProcessSection','benefitsSection','understandingProcessSection','whyChooseUsSection','whatMakesDifferentSection','benefitsCustomSection','whyChooseDetailedSection','industriesSection','onDemandDevelopersSection','faqSection'
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
            'hero_feature1' => 'required|string|max:255',
            'hero_feature2' => 'required|string|max:255',
            'hero_feature3' => 'required|string|max:255',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
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
                        'action' => 'modal',
                        'class' => 'btn btn--primary'
                    ],
                    [
                        'text' => $request->hero_button2_text,
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
        $validator = Validator::make($request->all(), [
            'intro_title' => 'required|string|max:500',
            'intro_description' => 'required|string|max:2000',
            'feature1_title' => 'required|string|max:255',
            'feature1_description' => 'required|string|max:500',
            'feature2_title' => 'required|string|max:255',
            'feature2_description' => 'required|string|max:500',
            'feature3_title' => 'required|string|max:255',
            'feature3_description' => 'required|string|max:500',
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

            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');

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

    /**
     * Save Core Services Section
     */
    public function saveCoreServicesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'core_title' => 'required|string|max:500',
            'core_subtitle' => 'required|string|max:500',
            // Service 1 - Custom Software Development
            'service1_title' => 'required|string|max:255',
            'service1_subtitle' => 'required|string|max:255',
            'service1_description' => 'required|string|max:1000',
            'service1_feature1' => 'required|string|max:255',
            'service1_feature2' => 'required|string|max:255',
            'service1_feature3' => 'required|string|max:255',
            // Service 2 - Enterprise Software Development
            'service2_title' => 'required|string|max:255',
            'service2_subtitle' => 'required|string|max:255',
            'service2_description' => 'required|string|max:1000',
            'service2_feature1' => 'required|string|max:255',
            'service2_feature2' => 'required|string|max:255',
            'service2_feature3' => 'required|string|max:255',
            // Service 3 - Software Product Development
            'service3_title' => 'required|string|max:255',
            'service3_subtitle' => 'required|string|max:255',
            'service3_description' => 'required|string|max:1000',
            'service3_feature1' => 'required|string|max:255',
            'service3_feature2' => 'required|string|max:255',
            'service3_feature3' => 'required|string|max:255',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->core_title,
                'subtitle' => $request->core_subtitle,
                'services' => [
                    [
                        'title' => $request->service1_title,
                        'subtitle' => $request->service1_subtitle,
                        'description' => $request->service1_description,
                        'features' => [
                            $request->service1_feature1,
                            $request->service1_feature2,
                            $request->service1_feature3
                        ],
                        'stats' => [
                            ['label' => $request->service1_stat1_label, 'value' => $request->service1_stat1_value],
                            ['label' => $request->service1_stat2_label, 'value' => $request->service1_stat2_value],
                            ['label' => $request->service1_stat3_label, 'value' => $request->service1_stat3_value]
                        ],
                        'icon' => 'fas fa-code',
                        'color' => 'purple'
                    ],
                    [
                        'title' => $request->service2_title,
                        'subtitle' => $request->service2_subtitle,
                        'description' => $request->service2_description,
                        'features' => [
                            $request->service2_feature1,
                            $request->service2_feature2,
                            $request->service2_feature3
                        ],
                        'stats' => [
                            ['label' => $request->service2_stat1_label, 'value' => $request->service2_stat1_value],
                            ['label' => $request->service2_stat2_label, 'value' => $request->service2_stat2_value],
                            ['label' => $request->service2_stat3_label, 'value' => $request->service2_stat3_value]
                        ],
                        'icon' => 'fas fa-building',
                        'color' => 'blue'
                    ],
                    [
                        'title' => $request->service3_title,
                        'subtitle' => $request->service3_subtitle,
                        'description' => $request->service3_description,
                        'features' => [
                            $request->service3_feature1,
                            $request->service3_feature2,
                            $request->service3_feature3
                        ],
                        'stats' => [
                            ['label' => $request->service3_stat1_label, 'value' => $request->service3_stat1_value],
                            ['label' => $request->service3_stat2_label, 'value' => $request->service3_stat2_value],
                            ['label' => $request->service3_stat3_label, 'value' => $request->service3_stat3_value]
                        ],
                        'icon' => 'fas fa-cube',
                        'color' => 'green'
                    ]
                ]
            ];
     
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'core_services'
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
                'message' => 'Core services section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving core services section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Additional Services Section
     */
    public function saveSpecializedServicesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'specialized_title' => 'required|string|max:500',
            'specialized_subtitle' => 'required|string|max:500',
            // 4 specialized services
            'spec_service1_title' => 'required|string|max:255',
            'spec_service1_description' => 'required|string|max:500',
            'spec_service2_title' => 'required|string|max:255',
            'spec_service2_description' => 'required|string|max:500',
            'spec_service3_title' => 'required|string|max:255',
            'spec_service3_description' => 'required|string|max:500',
            'spec_service4_title' => 'required|string|max:255',
            'spec_service4_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->specialized_title,
                'subtitle' => $request->specialized_subtitle,
                'services' => [
                    [
                        'title' => $request->spec_service1_title,
                        'description' => $request->spec_service1_description
                    ],
                    [
                        'title' => $request->spec_service2_title,
                        'description' => $request->spec_service2_description
                    ],
                    [
                        'title' => $request->spec_service3_title,
                        'description' => $request->spec_service3_description
                    ],
                    [
                        'title' => $request->spec_service4_title,
                        'description' => $request->spec_service4_description
                    ]
                ]
            ];

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
                'message' => 'Specialized services section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving specialized services section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save  Services Section
     */
    public function saveServicesSection(Request $request): JsonResponse
    {
 
        $validator = Validator::make($request->all(), [
            'services_title' => 'required|string|max:500',
            'services_description' => 'required|string|max:1000',
    
            // 6 specialized services
            'service1_title' => 'required|string|max:255',
            'service1_description' => 'required|string|max:1000',
            'service1_tags' => 'nullable|string|max:500',
    
            'service2_title' => 'required|string|max:255',
            'service2_description' => 'required|string|max:1000',
            'service2_tags' => 'nullable|string|max:500',
    
            'service3_title' => 'required|string|max:255',
            'service3_description' => 'required|string|max:1000',
            'service3_tags' => 'nullable|string|max:500',
    
            'service4_title' => 'required|string|max:255',
            'service4_description' => 'required|string|max:1000',
            'service4_tags' => 'nullable|string|max:500',
    
            'service5_title' => 'required|string|max:255',
            'service5_description' => 'required|string|max:1000',
            'service5_tags' => 'nullable|string|max:500',
    
            'service6_title' => 'required|string|max:255',
            'service6_description' => 'required|string|max:1000',
            'service6_tags' => 'nullable|string|max:500',
    
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            // Helper closure to parse tags into array
            $parseTags = function ($tags) {
                return $tags ? array_map('trim', explode(',', $tags)) : [];
            };
    
            $contentData = [
                'title' => $request->services_title,
                'description' => $request->services_description,
                'services' => [
                    [
                        'title' => $request->service1_title,
                        'description' => $request->service1_description,
                        'tags' => $parseTags($request->service1_tags),
                    ],
                    [
                        'title' => $request->service2_title,
                        'description' => $request->service2_description,
                        'tags' => $parseTags($request->service2_tags),
                    ],
                    [
                        'title' => $request->service3_title,
                        'description' => $request->service3_description,
                        'tags' => $parseTags($request->service3_tags),
                    ],
                    [
                        'title' => $request->service4_title,
                        'description' => $request->service4_description,
                        'tags' => $parseTags($request->service4_tags),
                    ],
                    [
                        'title' => $request->service5_title,
                        'description' => $request->service5_description,
                        'tags' => $parseTags($request->service5_tags),
                    ],
                    [
                        'title' => $request->service6_title,
                        'description' => $request->service6_description,
                        'tags' => $parseTags($request->service6_tags),
                    ],
                ]
            ];
      
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'specialized_services'
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
                'message' => 'Specialized services section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving specialized services section: ' . $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Save Technology Stack Section
     */
    public function saveTechnologyStackSection(Request $request): JsonResponse
    {
        // Validation rules
        $rules = [
            'tech_title' => 'required|string|max:500',
            'tech_subtitle' => 'required|string|max:500',
            'is_active' => 'boolean',
        ];

        // Add validation for 10 technology items
        for ($i = 1; $i <= 10; $i++) {
            $rules["tech{$i}_title"] = 'required|string|max:255';
            $rules["tech{$i}_description"] = 'required|string|max:500';
            $rules["tech{$i}_tags"] = 'nullable|string|max:1000'; // comma separated tags
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            // Build technologies array dynamically
            $technologies = [];
            for ($i = 1; $i <= 10; $i++) {
                $tagsInput = $request->input("tech{$i}_tags", '');
                $tagsArray = array_filter(array_map('trim', explode(',', $tagsInput))); // clean tags into array

                $technologies[] = [
                    'title' => $request->input("tech{$i}_title"),
                    'description' => $request->input("tech{$i}_description"),
                    'tags' => $tagsArray,
                ];
            }

            $contentData = [
                'title' => $request->tech_title,
                'subtitle' => $request->tech_subtitle,
                'technologies' => $technologies
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'technology_stack'
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
                'message' => 'Technology Stack section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Technology Stack section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Process Section
     */
    public function saveProcessSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'process_title' => 'required|string|max:500',
            'process_subtitle' => 'required|string|max:500',
            'step1_title' => 'required|string|max:255',
            'step1_description' => 'required|string|max:500',
            'step2_title' => 'required|string|max:255',
            'step2_description' => 'required|string|max:500',
            'step3_title' => 'required|string|max:255',
            'step3_description' => 'required|string|max:500',
            'step4_title' => 'required|string|max:255',
            'step4_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->process_title,
                'subtitle' => $request->process_subtitle,
                'steps' => [
                    [
                        'title' => $request->step1_title,
                        'description' => $request->step1_description
                    ],
                    [
                        'title' => $request->step2_title,
                        'description' => $request->step2_description
                    ],
                    [
                        'title' => $request->step3_title,
                        'description' => $request->step3_description
                    ],
                    [
                        'title' => $request->step4_title,
                        'description' => $request->step4_description
                    ],
                    [
                        'title' => $request->step5_title,
                        'description' => $request->step5_description
                    ],
                    [
                        'title' => $request->step6_title,
                        'description' => $request->step6_description
                    ],
                    [
                        'title' => $request->step7_title,
                        'description' => $request->step7_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'process'
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
                'message' => 'Process section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Process section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Methodologies Section
     */
    public function saveMethodologiesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'methodologies_title' => 'required|string|max:500',
            'methodologies_subtitle' => 'required|string|max:500',
            'methodology1_title' => 'required|string|max:255',
            'methodology1_description' => 'required|string|max:500',
            'methodology2_title' => 'required|string|max:255',
            'methodology2_description' => 'required|string|max:500',
            'methodology3_title' => 'required|string|max:255',
            'methodology3_description' => 'required|string|max:500',
            'methodology4_title' => 'required|string|max:255',
            'methodology4_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->methodologies_title,
                'subtitle' => $request->methodologies_subtitle,
                'items' => [
                    [
                        'title' => $request->methodology1_title,
                        'description' => $request->methodology1_description
                    ],
                    [
                        'title' => $request->methodology2_title,
                        'description' => $request->methodology2_description
                    ],
                    [
                        'title' => $request->methodology3_title,
                        'description' => $request->methodology3_description
                    ],
                    [
                        'title' => $request->methodology4_title,
                        'description' => $request->methodology4_description
                    ]
                ]
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'methodologies'
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
                'message' => 'Methodologies section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Methodologies section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Development Step Section
     */
    public function saveDevelopmentStepSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'development_step_title' => 'required|string|max:500',
            'development_step_subtitle' => 'required|string|max:500',
            'step1_title' => 'required|string|max:255',
            'step1_description' => 'required|string|max:500',
            'step2_title' => 'required|string|max:255',
            'step2_description' => 'required|string|max:500',
            'step3_title' => 'required|string|max:255',
            'step3_description' => 'required|string|max:500',
            'step4_title' => 'required|string|max:255',
            'step4_description' => 'required|string|max:500',
            'step5_title' => 'required|string|max:255',
            'step5_description' => 'required|string|max:500',
            'step6_title' => 'required|string|max:255',
            'step6_description' => 'required|string|max:500',
            'step7_title' => 'required|string|max:255',
            'step7_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->development_step_title,
                'subtitle' => $request->development_step_subtitle,
                'items' => [
                    [
                        'title' => $request->step1_title,
                        'description' => $request->step1_description
                    ],
                    [
                        'title' => $request->step2_title,
                        'description' => $request->step2_description
                    ],
                    [
                        'title' => $request->step3_title,
                        'description' => $request->step3_description
                    ],
                    [
                        'title' => $request->step4_title,
                        'description' => $request->step4_description
                    ],
                    [
                        'title' => $request->step5_title,
                        'description' => $request->step5_description
                    ],
                    [
                        'title' => $request->step6_title,
                        'description' => $request->step6_description
                    ],
                    [
                        'title' => $request->step7_title,
                        'description' => $request->step7_description
                    ]
                ]
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'development_steps'
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
                'message' => 'Development Steps section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Development Steps section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Benefits Section
     */
    public function saveBenefitsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'benefits_title' => 'required|string|max:500',
            'benefits_subtitle' => 'required|string|max:1000',
            'benefit1_title' => 'required|string|max:255',
            'benefit1_description' => 'required|string|max:500',
            'benefit2_title' => 'required|string|max:255',
            'benefit2_description' => 'required|string|max:500',
            'benefit3_title' => 'required|string|max:255',
            'benefit3_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->benefits_title,
                'subtitle' => $request->benefits_subtitle,
                'items' => [
                    [
                        'title' => $request->benefit1_title,
                        'description' => $request->benefit1_description
                    ],
                    [
                        'title' => $request->benefit2_title,
                        'description' => $request->benefit2_description
                    ],
                    [
                        'title' => $request->benefit3_title,
                        'description' => $request->benefit3_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'benefits'
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
     * Save understanding process Section
     */
    public function saveUnderstandingProcessSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'understanding_process_title' => 'required|string|max:500',
            'understanding_process_subtitle' => 'required|string|max:1000',
    
            'understanding_step1_title' => 'required|string|max:255',
            'understanding_step1_description' => 'required|string|max:500',
    
            'understanding_step2_title' => 'required|string|max:255',
            'understanding_step2_description' => 'required|string|max:500',
    
            'understanding_step3_title' => 'required|string|max:255',
            'understanding_step3_description' => 'required|string|max:500',
    
            'understanding_step4_title' => 'required|string|max:255',
            'understanding_step4_description' => 'required|string|max:500',
    
            'understanding_step5_title' => 'required|string|max:255',
            'understanding_step5_description' => 'required|string|max:500',
    
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->understanding_process_title,
                'subtitle' => $request->understanding_process_subtitle,
                'items' => [
                    [
                        'title' => $request->understanding_step1_title,
                        'description' => $request->understanding_step1_description,
                    ],
                    [
                        'title' => $request->understanding_step2_title,
                        'description' => $request->understanding_step2_description,
                    ],
                    [
                        'title' => $request->understanding_step3_title,
                        'description' => $request->understanding_step3_description,
                    ],
                    [
                        'title' => $request->understanding_step4_title,
                        'description' => $request->understanding_step4_description,
                    ],
                    [
                        'title' => $request->understanding_step5_title,
                        'description' => $request->understanding_step5_description,
                    ],
                ]
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'understanding_process'
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
                'message' => 'Understanding Process section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Understanding Process section: ' . $e->getMessage()
            ], 500);
        }
    }
    

    

    /**
     * Save Why Choose Us Section
     */
    public function saveWhyChooseUsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'why_title' => 'required|string|max:500',
            'why_subtitle' => 'required|string|max:500',
            'reason1_title' => 'required|string|max:255',
            'reason1_description' => 'required|string|max:500',
            'reason2_title' => 'required|string|max:255',
            'reason2_description' => 'required|string|max:500',
            'reason3_title' => 'required|string|max:255',
            'reason3_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->why_title,
                'subtitle' => $request->why_subtitle,
                'reasons' => [
                    [
                        'title' => $request->reason1_title,
                        'description' => $request->reason1_description
                    ],
                    [
                        'title' => $request->reason2_title,
                        'description' => $request->reason2_description
                    ],
                    [
                        'title' => $request->reason3_title,
                        'description' => $request->reason3_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_choose_us'
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
                'message' => 'Why Choose Us section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Why Choose Us section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save what makes different Section
     */
    public function saveWhatMakesDifferentSection(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'different_title' => 'required|string|max:500',
            'different_subtitle' => 'required|string|max:500',
            'feature1_title' => 'required|string|max:255',
            'feature1_description' => 'required|string|max:500',
            'feature2_title' => 'required|string|max:255',
            'feature2_description' => 'required|string|max:500',
            'feature3_title' => 'required|string|max:255',
            'feature3_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
    
            $contentData = [
                'title' => $request->different_title,
                'subtitle' => $request->different_subtitle,
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
                ]
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'what_makes_different'
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
                'message' => 'What Makes Us Different section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving What Makes Us Different section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save custom benefits Section
     */
    public function saveCustomBenefitsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'benefit_title' => 'required|string|max:500',
            'benefit_subtitle' => 'required|string|max:500',
            'benefit1_title' => 'required|string|max:255',
            'benefit1_description' => 'required|string|max:500',
            'benefit2_title' => 'required|string|max:255',
            'benefit2_description' => 'required|string|max:500',
            'benefit3_title' => 'required|string|max:255',
            'benefit3_description' => 'required|string|max:500',
            'benefit4_title' => 'required|string|max:255',
            'benefit4_description' => 'required|string|max:500',
            'benefit5_title' => 'required|string|max:255',
            'benefit5_description' => 'required|string|max:500',
            'benefit6_title' => 'required|string|max:255',
            'benefit6_description' => 'required|string|max:500',
    
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

            $page = $this->getOrCreateSoftwareDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->benefit_title,
                'subtitle' => $request->benefit_subtitle,
                'benefits' => [
                    [
                        'title' => $request->benefit1_title,
                        'description' => $request->benefit1_description,
                    ],
                    [
                        'title' => $request->benefit2_title,
                        'description' => $request->benefit2_description,
                    ],
                    [
                        'title' => $request->benefit3_title,
                        'description' => $request->benefit3_description,
                    ],
                    [
                        'title' => $request->benefit4_title,
                        'description' => $request->benefit4_description,
                    ],
                    [
                        'title' => $request->benefit5_title,
                        'description' => $request->benefit5_description,
                    ],
                    [
                        'title' => $request->benefit6_title,
                        'description' => $request->benefit6_description,
                    ],
                ]
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'custom_benefits'
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
                'message' => 'Custom Benefits section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Custom Benefits section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save custom development Section
     */
    public function saveCustomDevelopmentSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'custom_development_title' => 'required|string|max:500',
            'custom_development_subtitle' => 'required|string|max:500',
    
            'custom_development_benefit1_title' => 'required|string|max:255',
            'custom_development_benefit1_description' => 'required|string|max:500',
            'custom_development_benefit2_title' => 'required|string|max:255',
            'custom_development_benefit2_description' => 'required|string|max:500',
            'custom_development_benefit3_title' => 'required|string|max:255',
            'custom_development_benefit3_description' => 'required|string|max:500',
            'custom_development_benefit4_title' => 'required|string|max:255',
            'custom_development_benefit4_description' => 'required|string|max:500',
            'custom_development_benefit5_title' => 'required|string|max:255',
            'custom_development_benefit5_description' => 'required|string|max:500',
            'custom_development_benefit6_title' => 'required|string|max:255',
            'custom_development_benefit6_description' => 'required|string|max:500',
    
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

            $page = $this->getOrCreateSoftwareDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->custom_development_title,
                'subtitle' => $request->custom_development_subtitle,
                'benefits' => [
                    [
                        'title' => $request->custom_development_benefit1_title,
                        'description' => $request->custom_development_benefit1_description,
                    ],
                    [
                        'title' => $request->custom_development_benefit2_title,
                        'description' => $request->custom_development_benefit2_description,
                    ],
                    [
                        'title' => $request->custom_development_benefit3_title,
                        'description' => $request->custom_development_benefit3_description,
                    ],
                    [
                        'title' => $request->custom_development_benefit4_title,
                        'description' => $request->custom_development_benefit4_description,
                    ],
                    [
                        'title' => $request->custom_development_benefit5_title,
                        'description' => $request->custom_development_benefit5_description,
                    ],
                    [
                        'title' => $request->custom_development_benefit6_title,
                        'description' => $request->custom_development_benefit6_description,
                    ],
                ]
            ];
    
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'custom_development'
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
                'message' => 'Custom Development section saved successfully!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Custom Development section: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    
    /**
     * Save Industries Section
     */
    public function saveIndustriesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'industries_title' => 'required|string|max:500',
            'industries_subtitle' => 'required|string|max:500',
            'industry1_title' => 'required|string|max:255',
            'industry1_description' => 'required|string|max:500',
            'industry2_title' => 'required|string|max:255',
            'industry2_description' => 'required|string|max:500',
            'industry3_title' => 'required|string|max:255',
            'industry3_description' => 'required|string|max:500',
            'industry4_title' => 'required|string|max:255',
            'industry4_description' => 'required|string|max:500',
            'industry5_title' => 'required|string|max:255',
            'industry5_description' => 'required|string|max:500',
            'industry6_title' => 'required|string|max:255',
            'industry6_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->industries_title,
                'subtitle' => $request->industries_subtitle,
                'industries' => [
                    [
                        'title' => $request->industry1_title,
                        'description' => $request->industry1_description
                    ],
                    [
                        'title' => $request->industry2_title,
                        'description' => $request->industry2_description
                    ],
                    [
                        'title' => $request->industry3_title,
                        'description' => $request->industry3_description
                    ],
                    [
                        'title' => $request->industry4_title,
                        'description' => $request->industry4_description
                    ],
                    [
                        'title' => $request->industry5_title,
                        'description' => $request->industry5_description
                    ],
                    [
                        'title' => $request->industry6_title,
                        'description' => $request->industry6_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'industries'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 16,
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
     * Save On Demand Developers Section
     */
    public function saveOnDemandDevelopersSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'developers_title' => 'required|string|max:500',
            'developers_subtitle' => 'required|string|max:500',
            'developers_description' => 'required|string|max:1000',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');
            $contentData = [
                'title' => $request->developers_title,
                'subtitle' => $request->developers_subtitle,
                'description' => $request->developers_description
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'on_demand_developers'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 17,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'On Demand Developers section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving On Demand Developers section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save FAQ Section
     */
    public function saveFaqSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'faq_title' => 'required|string|max:500',
            'faq1_question' => 'required|string|max:255',
            'faq1_answer' => 'required|string|max:500',
            'faq2_question' => 'required|string|max:255',
            'faq2_answer' => 'required|string|max:500',
            'faq3_question' => 'required|string|max:255',
            'faq3_answer' => 'required|string|max:500',
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'software-development');


            $contentData = [
                'title' => $request->faq_title,
                'faqs' => [
                    [
                        'question' => $request->faq1_question,
                        'answer' => $request->faq1_answer
                    ],
                    [
                        'question' => $request->faq2_question,
                        'answer' => $request->faq2_answer
                    ],
                    [
                        'question' => $request->faq3_question,
                        'answer' => $request->faq3_answer
                    ],
                    [
                        'question' => $request->faq4_question,
                        'answer' => $request->faq4_answer
                    ],
                    [
                        'question' => $request->faq5_question,
                        'answer' => $request->faq5_answer
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'faq'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 18,
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
            $page = $this->getOrCreateSoftwareDevelopmentPage();
            
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
     * Get or create software development page
     */
    private function getOrCreateSoftwareDevelopmentPage()
    {
        return Page::firstOrCreate(
            ['name' => 'services'],
            ['name' => 'services']
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
     * Get section content
     */
    private function getSectionContent($pageId, $pageTypeId, $sectionName)
    {
        // return DynamicContent::where('page_id', $pageId)
        //                    ->where('section_name', $sectionName)
        //                    ->first();
        return DynamicContent::where('page_id', $pageId)
        ->where('page_type_id',$pageTypeId)
        ->where('section_name', $sectionName)
        ->first();
    }
}
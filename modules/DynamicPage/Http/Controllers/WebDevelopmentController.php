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

class WebDevelopmentController extends Controller
{
    public function index()
    {
        // Get or create the web development page
        $page = $this->getOrCreateWebDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'web-development');
        
        // Get existing content for all sections and extract content_json
        $heroSection = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $heroContent = $heroSection ? $heroSection->content_json : [];
        
        $introSection = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $introContent = $introSection ? $introSection->content_json : [];
        
        $coreServicesSection = $this->getSectionContent($page->id, $pageType->id,'core_services');
        $coreServicesContent = $coreServicesSection ? $coreServicesSection->content_json : [];
        
        $additionalServicesSection = $this->getSectionContent($page->id,$pageType->id, 'additional_services');
        $additionalServicesContent = $additionalServicesSection ? $additionalServicesSection->content_json : [];
        
        $whyChooseUsSection = $this->getSectionContent($page->id,$pageType->id, 'why_choose_us');
        $whyChooseUsContent = $whyChooseUsSection ? $whyChooseUsSection->content_json : [];
        
        $customProcessSection = $this->getSectionContent($page->id,$pageType->id, 'custom_process');
        $customProcessContent = $customProcessSection ? $customProcessSection->content_json : [];
        
        $crossHairSection = $this->getSectionContent($page->id,$pageType->id, 'cross_hair');
        $crossHairContent = $crossHairSection ? $crossHairSection->content_json : [];
        
        $whatIsCustomSection = $this->getSectionContent($page->id,$pageType->id, 'what_is_custom');
        $whatIsCustomContent = $whatIsCustomSection ? $whatIsCustomSection->content_json : [];
        
        $whyNeedCustomSection = $this->getSectionContent($page->id,$pageType->id, 'why_need_custom');
        $whyNeedCustomContent = $whyNeedCustomSection ? $whyNeedCustomSection->content_json : [];
        
        $whatServicesSection = $this->getSectionContent($page->id,$pageType->id, 'what_services');
        $whatServicesContent = $whatServicesSection ? $whatServicesSection->content_json : [];
        
        $faqSection = $this->getSectionContent($page->id,$pageType->id, 'faq');
        $faqContent = $faqSection ? $faqSection->content_json : [];

        // New sections
        $ecommerceDevelopmentSection = $this->getSectionContent($page->id,$pageType->id, 'ecommerce_development');
        $ecommerceDevelopmentContent = $ecommerceDevelopmentSection ? $ecommerceDevelopmentSection->content_json : [];

        $developmentMethodologiesSection = $this->getSectionContent($page->id,$pageType->id, 'development_methodologies');
        $developmentMethodologiesContent = $developmentMethodologiesSection ? $developmentMethodologiesSection->content_json : [];
        
        $devopsDeploymentSection = $this->getSectionContent($page->id,$pageType->id, 'devops_deployment');
        $devopsDeploymentContent = $devopsDeploymentSection ? $devopsDeploymentSection->content_json : [];
        
        $databaseManagementSection = $this->getSectionContent($page->id,$pageType->id, 'database_management');
        $databaseManagementContent = $databaseManagementSection ? $databaseManagementSection->content_json : [];
        
        $securitySection = $this->getSectionContent($page->id,$pageType->id, 'security');
        $securityContent = $securitySection ? $securitySection->content_json : [];
        
        $performanceOptimizationSection = $this->getSectionContent($page->id,$pageType->id, 'performance_optimization');
        $performanceOptimizationContent = $performanceOptimizationSection ? $performanceOptimizationSection->content_json : [];
        
        $qualityControlTestingSection = $this->getSectionContent($page->id,$pageType->id, 'quality_control_testing');
        $qualityControlTestingContent = $qualityControlTestingSection ? $qualityControlTestingSection->content_json : [];
        
        $designingUiUxSection = $this->getSectionContent($page->id,$pageType->id, 'designing_ui_ux');
        $designingUiUxContent = $designingUiUxSection ? $designingUiUxSection->content_json : [];
        $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
        return view('dynamicpage::servicespage.webDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'coreServicesContent',
            'additionalServicesContent',
            'whyChooseUsContent',
            'customProcessContent',
            'crossHairContent',
            'whatIsCustomContent',
            'whyNeedCustomContent',
            'whatServicesContent',
            'faqContent',
            'heroSection',
            'introSection',
            'coreServicesSection',
            'additionalServicesSection',
            'whyChooseUsSection',
            'customProcessSection',
            'crossHairSection',
            'whatIsCustomSection',
            'whyNeedCustomSection',
            'whatServicesContent',
            'whatServicesContent',
            'faqSection',
            // New sections
            'developmentMethodologiesContent',
            'devopsDeploymentContent',
            'databaseManagementContent',
            'securityContent',
            'performanceOptimizationContent',
            'qualityControlTestingContent',
            'designingUiUxContent',
            'developmentMethodologiesSection',
            'devopsDeploymentSection',
            'databaseManagementSection',
            'securitySection',
            'performanceOptimizationSection',
            'qualityControlTestingSection',
            'designingUiUxSection',
            'ecommerceDevelopmentSection',
            'ecommerceDevelopmentContent',
            'pageType',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

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
            // Service 1 - Responsive Website Development
            'service1_title' => 'required|string|max:255',
            'service1_subtitle' => 'required|string|max:255',
            'service1_description' => 'required|string|max:1000',
            'service1_feature1' => 'required|string|max:255',
            'service1_feature2' => 'required|string|max:255',
            'service1_feature3' => 'required|string|max:255',
            // Service 2 - E-Commerce Development
            'service2_title' => 'required|string|max:255',
            'service2_subtitle' => 'required|string|max:255',
            'service2_description' => 'required|string|max:1000',
            'service2_feature1' => 'required|string|max:255',
            'service2_feature2' => 'required|string|max:255',
            'service2_feature3' => 'required|string|max:255',
            // Service 3 - CMS Development
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

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
                        'icon' => 'fas fa-mobile-alt',
                        'color' => 'blue'
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
                        'icon' => 'fas fa-shopping-cart',
                        'color' => 'green'
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
                        'icon' => 'fas fa-cogs',
                        'color' => 'purple'
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
    public function saveAdditionalServicesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'additional_title' => 'required|string|max:500',
            'additional_subtitle' => 'required|string|max:500',
            // 4 additional services
            'add_service1_title' => 'required|string|max:255',
            'add_service1_subtitle' => 'required|string|max:255',
            'add_service1_description' => 'required|string|max:500',
            'add_service2_title' => 'required|string|max:255',
            'add_service2_subtitle' => 'required|string|max:255',
            'add_service2_description' => 'required|string|max:500',
            'add_service3_title' => 'required|string|max:255',
            'add_service3_subtitle' => 'required|string|max:255',
            'add_service3_description' => 'required|string|max:500',
            'add_service4_title' => 'required|string|max:255',
            'add_service4_subtitle' => 'required|string|max:255',
            'add_service4_description' => 'required|string|max:500',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->additional_title,
                'subtitle' => $request->additional_subtitle,
                'services' => [
                    [
                        'title' => $request->add_service1_title,
                        'subtitle' => $request->add_service1_subtitle,
                        'description' => $request->add_service1_description
                    ],
                    [
                        'title' => $request->add_service2_title,
                        'subtitle' => $request->add_service2_subtitle,
                        'description' => $request->add_service2_description
                    ],
                    [
                        'title' => $request->add_service3_title,
                        'subtitle' => $request->add_service3_subtitle,
                        'description' => $request->add_service3_description
                    ],
                    [
                        'title' => $request->add_service4_title,
                        'subtitle' => $request->add_service4_subtitle,
                        'description' => $request->add_service4_description
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
                'message' => 'Additional services section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving additional services section: ' . $e->getMessage()
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
            'reason4_title' => 'required|string|max:255',
            'reason4_description' => 'required|string|max:500',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->why_title,
                'subtitle' => $request->why_subtitle,
                'reasons' => [
                    [
                        'title' => $request->reason1_title,
                        'description' => $request->reason1_description,
                        'icon' => 'fas fa-award'
                    ],
                    [
                        'title' => $request->reason2_title,
                        'description' => $request->reason2_description,
                        'icon' => 'fas fa-chart-line'
                    ],
                    [
                        'title' => $request->reason3_title,
                        'description' => $request->reason3_description,
                        'icon' => 'fas fa-dollar-sign'
                    ],
                    [
                        'title' => $request->reason4_title,
                        'description' => $request->reason4_description,
                        'icon' => 'fas fa-cogs'
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
                    'order_by' => 5,
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
     * Save Custom Process Section
     */
    public function saveCustomProcessSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'process_title' => 'required|string|max:500',
            'process_subtitle' => 'required|string|max:500',
            'process1_title' => 'required|string|max:255',
            'process1_description' => 'required|string|max:500',
            'process2_title' => 'required|string|max:255',
            'process2_description' => 'required|string|max:500',
            'process3_title' => 'required|string|max:255',
            'process3_description' => 'required|string|max:500',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->process_title,
                'subtitle' => $request->process_subtitle,
                'processes' => [
                    [
                        'icon' => $request->process1_icon,
                        'title' => $request->process1_title,
                        'description' => $request->process1_description,
                        'technology' => $request->process1_technology
                    ],
                    [
                        'icon' => $request->process2_icon,
                        'title' => $request->process2_title,
                        'description' => $request->process2_description,
                        'technology' => $request->process2_technology
                    ],
                    [
                        'icon' => $request->process3_icon,
                        'title' => $request->process3_title,
                        'description' => $request->process3_description,
                        'technology' => $request->process3_technology
                    ],
                    [
                        'icon' => $request->process4_icon,
                        'title' => $request->process4_title,
                        'description' => $request->process4_description,
                        'technology' => $request->process4_technology
                    ],
                    [
                        'icon' => $request->process5_icon,
                        'title' => $request->process5_title,
                        'description' => $request->process5_description,
                        'technology' => $request->process5_technology
                    ],
                    [
                        'icon' => $request->process6_icon,
                        'title' => $request->process6_title,
                        'description' => $request->process6_description,
                        'technology' => $request->process6_technology
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'custom_process'
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
                'message' => 'Custom Process section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Custom Process section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Cross Hair Section
     */
    public function saveCrossHairSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'crosshair_title' => 'required|string|max:500',
            'services' => 'required|array|min:1',
            'services.*.title' => 'required|string|max:255',
            'services.*.description' => 'required|string|max:1000',
            'services.*.tags' => 'nullable|string', // will parse comma-separated values
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            // Parse services and tags
            $services = collect($request->services)->map(function ($service) {
                return [
                    'title' => $service['title'],
                    'description' => $service['description'],
                    'tags' => isset($service['tags'])
                        ? array_map('trim', explode(',', $service['tags']))
                        : []
                ];
            })->toArray();

            $contentData = [
                'title' => $request->crosshair_title,
                'services' => $services
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'cross_hair'
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
                'message' => 'Cross Hair section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Cross Hair section: ' . $e->getMessage()
            ], 500);
        }
    }

   

    public function saveWhatIsCustomSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'what_title'       => 'required|string|max:500',
            'what_description' => 'required|string|max:1000',
            'what_subtitle'    => 'required|string|max:500',
            'services'         => 'array|size:6', // Must be exactly 6 services
            'services.*.title' => 'nullable|string|max:255',
            'services.*.description' => 'nullable|string|max:1000',
            'is_active'        => 'boolean'
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            // Collect the content data
            $contentData = [
                'title'       => $request->what_title,
                'description' => $request->what_description,
                'subtitle'    => $request->what_subtitle,
                'services'    => $request->services ?? [] // array of 6 services
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id'       => $page->id,
                    'page_type_id'  => $pageType->id,
                    'section_name'  => 'what_is_custom'
                ],
                [
                    'content_json'  => $contentData,
                    'order_by'      => 8,
                    'is_active'     => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'What Is Custom section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving What Is Custom section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Why Need Custom Section
     */
    public function saveWhyNeedCustomSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'need_title' => 'required|string|max:500',
            'need_description' => 'required|string|max:1000',
            'benefit1_title' => 'required|string|max:255',
            'benefit1_description' => 'required|string|max:500',
            'benefit2_title' => 'required|string|max:255',
            'benefit2_description' => 'required|string|max:500',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->need_title,
                'description' => $request->need_description,
                'benefits' => [
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
                    ],
                    [
                        'title' => $request->benefit4_title,
                        'description' => $request->benefit4_description
                    ],
                    [
                        'title' => $request->benefit5_title,
                        'description' => $request->benefit5_description
                    ],
                    [
                        'title' => $request->benefit6_title,
                        'description' => $request->benefit6_description
                    ],
                    [
                        'title' => $request->benefit7_title,
                        'description' => $request->benefit7_description
                    ],
                    [
                        'title' => $request->benefit8_title,
                        'description' => $request->benefit8_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_need_custom'
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
                'message' => 'Why Need Custom section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Why Need Custom section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save What Services Section
     */
  

    public function saveWhatServicesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            // Main section
            'services_title' => 'required|string|max:500',
            'services_description' => 'required|string|max:1000',

            // Core Services Heading
            'core_services_heading' => 'required|string|max:255',

            // Core Services (6 items)
            'core_service1_title' => 'required|string|max:255',
            'core_service1_description' => 'required|string|max:500',
            'core_service2_title' => 'required|string|max:255',
            'core_service2_description' => 'required|string|max:500',
            'core_service3_title' => 'required|string|max:255',
            'core_service3_description' => 'required|string|max:500',
            'core_service4_title' => 'required|string|max:255',
            'core_service4_description' => 'required|string|max:500',
            'core_service5_title' => 'required|string|max:255',
            'core_service5_description' => 'required|string|max:500',
            'core_service6_title' => 'required|string|max:255',
            'core_service6_description' => 'required|string|max:500',

            // Specialized Services Heading
            'special_services_heading' => 'required|string|max:255',

            // Specialized Services (3 items)
            'special_service1_title' => 'required|string|max:255',
            'special_service1_description' => 'required|string|max:500',
            'special_service2_title' => 'required|string|max:255',
            'special_service2_description' => 'required|string|max:500',
            'special_service3_title' => 'required|string|max:255',
            'special_service3_description' => 'required|string|max:500',

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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            // Build content data
            $contentData = [
                'title' => $request->services_title,
                'description' => $request->services_description,

                'core_services_heading' => $request->core_services_heading,
                'core_services' => [
                    ['title' => $request->core_service1_title, 'description' => $request->core_service1_description],
                    ['title' => $request->core_service2_title, 'description' => $request->core_service2_description],
                    ['title' => $request->core_service3_title, 'description' => $request->core_service3_description],
                    ['title' => $request->core_service4_title, 'description' => $request->core_service4_description],
                    ['title' => $request->core_service5_title, 'description' => $request->core_service5_description],
                    ['title' => $request->core_service6_title, 'description' => $request->core_service6_description],
                ],

                'special_services_heading' => $request->special_services_heading,
                'special_services' => [
                    ['title' => $request->special_service1_title, 'description' => $request->special_service1_description],
                    ['title' => $request->special_service2_title, 'description' => $request->special_service2_description],
                    ['title' => $request->special_service3_title, 'description' => $request->special_service3_description],
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'what_services'
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
                'message' => 'What Services section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving What Services section: ' . $e->getMessage()
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

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
                    'order_by' => 11,
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
     * Save Ecommerce Development Section
     */
    public function saveEcommerceDevelopmentSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'ecommerce_development_title' => 'required|string|max:500',
            // 3 methodologies
            'ecommerceDev1_main_heading' => 'required|string',
            'ecommerceDev1_heading1' => 'required|string',
            'ecommerceDev1_discription1' => 'required|string',
            'ecommerceDev1_technologies' => 'required|string',
            'ecommerceDev1_heading2' => 'required|string',
            'ecommerceDev1_discription2' => 'required|string',
            'ecommerceDev2_main_heading' => 'required|string',
            'ecommerceDev2_heading1' => 'required|string',
            'ecommerceDev2_discription1' => 'required|string',
            'ecommerceDev2_heading2' => 'required|string',
            'ecommerceDev2_discription2' => 'required|string',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->ecommerce_development_title,
                'methodologies' => [
                    [
                        'main_heading'   => $request->ecommerceDev1_main_heading,
                        'heading1'       => $request->ecommerceDev1_heading1,
                        'discription1'   => $request->ecommerceDev1_discription1,
                        'technologies'   => $request->ecommerceDev1_technologies,
                        'heading2'       => $request->ecommerceDev1_heading2,
                        'discription2'   => $request->ecommerceDev1_discription2
                    ],
                    [
                        'main_heading'   => $request->ecommerceDev2_main_heading,
                        'heading1'       => $request->ecommerceDev2_heading1,
                        'discription1'   => $request->ecommerceDev2_discription1,
                        'technologies'   => $request->ecommerceDev2_technologies,
                        'heading2'       => $request->ecommerceDev2_heading2,
                        'discription2'   => $request->ecommerceDev2_discription2
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'ecommerce_development'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 22,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Development Methodologies section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Development Methodologies section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Development Methodologies Section
     */
    public function saveDevelopmentMethodologiesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'methodologies_title' => 'required|string|max:500',
            // 3 methodologies
            'methodology1_title' => 'required|string|max:255',
            'methodology1_description' => 'required|string|max:500',
            'methodology2_title' => 'required|string|max:255',
            'methodology2_description' => 'required|string|max:500',
            'methodology3_title' => 'required|string|max:255',
            'methodology3_description' => 'required|string|max:500',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->methodologies_title,
                'methodologies' => [
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
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'development_methodologies'
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
                'message' => 'Development Methodologies section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Development Methodologies section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save DevOps and Deployment Section
     */
    public function saveDevopsDeploymentSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'devops_title' => 'required|string|max:500',
            // 3 devops services
            'devops1_title' => 'required|string|max:255',
            'devops1_description' => 'required|string|max:500',
            'devops2_title' => 'required|string|max:255',
            'devops2_description' => 'required|string|max:500',
            'devops3_title' => 'required|string|max:255',
            'devops3_description' => 'required|string|max:500',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->devops_title,
                'services' => [
                    [
                        'title' => $request->devops1_title,
                        'description' => $request->devops1_description
                    ],
                    [
                        'title' => $request->devops2_title,
                        'description' => $request->devops2_description
                    ],
                    [
                        'title' => $request->devops3_title,
                        'description' => $request->devops3_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'devops_deployment'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 13,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'DevOps and Deployment section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving DevOps and Deployment section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Database Management Section
     */

    public function saveDatabaseManagementSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'database_title' => 'required|string|max:500',
            'db_service1_title' => 'required|string|max:255',
            'db_service2_title' => 'required|string|max:255',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->database_title,
                'main_services' => []
            ];

            // loop through 2 main services
            for ($i = 1; $i <= 2; $i++) {
                $service = [
                    'title' => $request->input("db_service{$i}_title"),
                    'sections' => []
                ];

                // each service has dynamic number of sections (check based on request keys)
                $j = 1;
                while ($request->has("db_service{$i}_section{$j}_heading")) {
                    $section = [
                        'heading' => $request->input("db_service{$i}_section{$j}_heading"),
                        'description' => $request->input("db_service{$i}_section{$j}_description"),
                    ];

                    // only Service 1, Section 1 has technologies
                    if ($i == 1 && $j == 1) {
                        $section['technologies'] = $request->input("db_service1_section1_technologies");
                    }

                    $service['sections'][] = $section;
                    $j++;
                }

                $contentData['main_services'][] = $service;
            }

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'database_management'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 14,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Database Management section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Database Management section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Security Section
     */

    public function saveSecuritySection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'security_title' => 'required|string|max:500',

            // 2 main services
            'security_service1_title' => 'required|string|max:255',
            'security_service2_title' => 'required|string|max:255',

            // Each service has 3 subsections
            'security_service1_section1_title' => 'required|string|max:255',
            'security_service1_section1_description' => 'required|string|max:500',
            'security_service1_section2_title' => 'required|string|max:255',
            'security_service1_section2_description' => 'required|string|max:500',
            'security_service1_section3_title' => 'required|string|max:255',
            'security_service1_section3_description' => 'required|string|max:500',

            'security_service2_section1_title' => 'required|string|max:255',
            'security_service2_section1_description' => 'required|string|max:500',
            'security_service2_section2_title' => 'required|string|max:255',
            'security_service2_section2_description' => 'required|string|max:500',
            'security_service2_section3_title' => 'required|string|max:255',
            'security_service2_section3_description' => 'required|string|max:500',

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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->security_title,
                'main_services' => [
                    [
                        'title' => $request->security_service1_title,
                        'sections' => [
                            [
                                'title' => $request->security_service1_section1_title,
                                'description' => $request->security_service1_section1_description
                            ],
                            [
                                'title' => $request->security_service1_section2_title,
                                'description' => $request->security_service1_section2_description
                            ],
                            [
                                'title' => $request->security_service1_section3_title,
                                'description' => $request->security_service1_section3_description
                            ],
                        ]
                    ],
                    [
                        'title' => $request->security_service2_title,
                        'sections' => [
                            [
                                'title' => $request->security_service2_section1_title,
                                'description' => $request->security_service2_section1_description
                            ],
                            [
                                'title' => $request->security_service2_section2_title,
                                'description' => $request->security_service2_section2_description
                            ],
                            [
                                'title' => $request->security_service2_section3_title,
                                'description' => $request->security_service2_section3_description
                            ],
                        ]
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'security'
                ],
                [
                    'content_json' => $contentData,
                    'order_by' => 15,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Security section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Security section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Performance Optimization Section
     */

    public function savePerformanceOptimizationSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'performance_title' => 'required|string|max:500',

            // Main Service 1
            'performance_service1_title' => 'required|string|max:255',
            'performance_service1_section1_title' => 'required|string|max:255',
            'performance_service1_section1_description' => 'required|string|max:500',
            'performance_service1_section2_title' => 'nullable|string|max:255',
            'performance_service1_section2_description' => 'nullable|string|max:500',
            'performance_service1_section3_title' => 'nullable|string|max:255',
            'performance_service1_section3_description' => 'nullable|string|max:500',

            // Main Service 2
            'performance_service2_title' => 'required|string|max:255',
            'performance_service2_section1_title' => 'required|string|max:255',
            'performance_service2_section1_description' => 'required|string|max:500',
            'performance_service2_section2_title' => 'nullable|string|max:255',
            'performance_service2_section2_description' => 'nullable|string|max:500',

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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->performance_title,
                'main_services' => [
                    [
                        'title' => $request->performance_service1_title,
                        'sections' => [
                            [
                                'title' => $request->performance_service1_section1_title,
                                'description' => $request->performance_service1_section1_description,
                            ],
                            [
                                'title' => $request->performance_service1_section2_title,
                                'description' => $request->performance_service1_section2_description,
                            ],
                            [
                                'title' => $request->performance_service1_section3_title,
                                'description' => $request->performance_service1_section3_description,
                            ],
                        ]
                    ],
                    [
                        'title' => $request->performance_service2_title,
                        'sections' => [
                            [
                                'title' => $request->performance_service2_section1_title,
                                'description' => $request->performance_service2_section1_description,
                            ],
                            [
                                'title' => $request->performance_service2_section2_title,
                                'description' => $request->performance_service2_section2_description,
                            ],
                        ]
                    ]
                ]
            ];

            // Remove empty sections (if title/description not filled)
            foreach ($contentData['main_services'] as &$service) {
                $service['sections'] = array_values(array_filter($service['sections'], function ($section) {
                    return !empty($section['title']) || !empty($section['description']);
                }));
            }

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'performance_optimization'
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
                'message' => 'Performance Optimization section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Performance Optimization section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Quality Control and Testing Section
     */

    public function saveQualityControlTestingSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'quality_title' => 'required|string|max:500',
            'comprehensive_title' => 'required|string|max:500',
            'robust_title'        => 'required|string|max:500',
            'comprehensive_items' => 'required|array|min:1',
            'robust_items'        => 'required|array|min:1',
            'comprehensive_items.*.subtitle'   => 'required|string|max:255',
            'comprehensive_items.*.description'=> 'required|string|max:500',
            'robust_items.*.subtitle'          => 'required|string|max:255',
            'robust_items.*.description'       => 'required|string|max:500',
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

            $page = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->quality_title,
                'comprehensive' => [
                    'title' => $request->comprehensive_title,
                    'items' => $request->comprehensive_items
                ],
                'robust' => [
                    'title' => $request->robust_title,
                    'items' => $request->robust_items
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'quality_control_testing'
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
                'message' => 'Quality Control and Testing section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Quality Control and Testing section: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Save Designing & UI/UX Section
     */

    public function saveDesigningUiUxSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'design_services'   => 'required|array|min:1',
            'design_services.*.title' => 'required|string|max:255',
            'design_services.*.items' => 'required|array|min:1',
            'design_services.*.items.*.subtitle' => 'required|string|max:255',
            'design_services.*.items.*.description' => 'required|string|max:1000',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $page     = $this->getOrCreateWebDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'web-development');

            $contentData = [
                'title' => $request->design_title,
                'services' => $request->design_services
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id'      => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'designing_ui_ux'
                ],
                [
                    'content_json' => $contentData,
                    'order_by'     => 18,
                    'is_active'    => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Designing & UI/UX section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Designing & UI/UX section: ' . $e->getMessage()
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
            $page = $this->getOrCreateWebDevelopmentPage();
            
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
     * Get or create web development page
     */
    private function getOrCreateWebDevelopmentPage()
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
        return DynamicContent::where('page_id', $pageId)
                           ->where('page_type_id',$pageTypeId)
                           ->where('section_name', $sectionName)
                           ->first();
    }
}
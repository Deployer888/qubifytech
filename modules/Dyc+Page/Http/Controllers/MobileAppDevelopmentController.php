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

class MobileAppDevelopmentController extends Controller
{
    public function index()
    {
        // Get or create the mobile app development page
        $page = $this->getOrCreateMobileAppDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $futureReadyContent = $this->getSectionContent($page->id, $pageType->id, 'future_ready');
        $servicesContent = $this->getSectionContent($page->id, $pageType->id, 'services');
        $additionalServicesContent = $this->getSectionContent($page->id, $pageType->id, 'additional_services');
        $techStackContent = $this->getSectionContent($page->id, $pageType->id, 'tech_stack');
        $industrySolutionsContent = $this->getSectionContent($page->id, $pageType->id, 'industry_solutions');
        $whyChooseUsContent = $this->getSectionContent($page->id, $pageType->id, 'why_choose_us');
        $howWeWorkContent = $this->getSectionContent($page->id, $pageType->id, 'how_we_work');
        $faqContent = $this->getSectionContent($page->id, $pageType->id, 'faq');
       
        return view('dynamicpage::servicespage.mobileAppDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'futureReadyContent',
            'servicesContent',
            'additionalServicesContent',
            'techStackContent',
            'industrySolutionsContent',
            'whyChooseUsContent',
            'howWeWorkContent',
            'faqContent'
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
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
                        'action' => 'modal'
                    ],
                    [
                        'text' => $request->hero_button2_text,
                        'url' => $request->hero_button2_url
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
            'feature4_title' => 'required|string|max:255',
            'feature4_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
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

    /**
     * Save Future Ready Section
     */
    public function saveFutureReadySection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'future_title' => 'required|string|max:500',
            'future_subtitle' => 'required|string|max:500',
            'tech1_title' => 'required|string|max:255',
            'tech1_description' => 'required|string|max:500',
            'tech2_title' => 'required|string|max:255',
            'tech2_description' => 'required|string|max:500',
            'tech3_title' => 'required|string|max:255',
            'tech3_description' => 'required|string|max:500',
            'tech4_title' => 'required|string|max:255',
            'tech4_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
            $contentData = [
                'title' => $request->future_title,
                'subtitle' => $request->future_subtitle,
                'technologies' => [
                    [
                        'title' => $request->tech1_title,
                        'description' => $request->tech1_description
                    ],
                    [
                        'title' => $request->tech2_title,
                        'description' => $request->tech2_description
                    ],
                    [
                        'title' => $request->tech3_title,
                        'description' => $request->tech3_description
                    ],
                    [
                        'title' => $request->tech4_title,
                        'description' => $request->tech4_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'future_ready'
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
                'message' => 'Future Ready section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Future Ready section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Services Section
     */
    public function saveServicesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'services_title' => 'required|string|max:500',
            'services_subtitle' => 'required|string|max:500',
            // Service 1 - iOS
            'service1_title' => 'required|string|max:255',
            'service1_subtitle' => 'required|string|max:255',
            'service1_description' => 'required|string|max:1000',
            'service1_feature1' => 'required|string|max:255',
            'service1_feature2' => 'required|string|max:255',
            'service1_feature3' => 'required|string|max:255',
            'service1_stat1_label' => 'required|string|max:255',
            'service1_stat1_value' => 'required|string|max:255',
            'service1_stat2_label' => 'required|string|max:255',
            'service1_stat2_value' => 'required|string|max:255',
            'service1_stat3_label' => 'required|string|max:255',
            'service1_stat3_value' => 'required|string|max:255',
            // Service 2 - Android
            'service2_title' => 'required|string|max:255',
            'service2_subtitle' => 'required|string|max:255',
            'service2_description' => 'required|string|max:1000',
            'service2_feature1' => 'required|string|max:255',
            'service2_feature2' => 'required|string|max:255',
            'service2_feature3' => 'required|string|max:255',
            'service2_stat1_label' => 'required|string|max:255',
            'service2_stat1_value' => 'required|string|max:255',
            'service2_stat2_label' => 'required|string|max:255',
            'service2_stat2_value' => 'required|string|max:255',
            'service2_stat3_label' => 'required|string|max:255',
            'service2_stat3_value' => 'required|string|max:255',
            // Service 3 - Cross-Platform
            'service3_title' => 'required|string|max:255',
            'service3_subtitle' => 'required|string|max:255',
            'service3_description' => 'required|string|max:1000',
            'service3_feature1' => 'required|string|max:255',
            'service3_feature2' => 'required|string|max:255',
            'service3_feature3' => 'required|string|max:255',
            'service3_stat1_label' => 'required|string|max:255',
            'service3_stat1_value' => 'required|string|max:255',
            'service3_stat2_label' => 'required|string|max:255',
            'service3_stat2_value' => 'required|string|max:255',
            'service3_stat3_label' => 'required|string|max:255',
            'service3_stat3_value' => 'required|string|max:255',
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
            $contentData = [
                'title' => $request->services_title,
                'subtitle' => $request->services_subtitle,
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
                        'icon' => 'apple',
                        'color' => 'gray'
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
                        'icon' => 'android',
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
                        'stats' => [
                            ['label' => $request->service3_stat1_label, 'value' => $request->service3_stat1_value],
                            ['label' => $request->service3_stat2_label, 'value' => $request->service3_stat2_value],
                            ['label' => $request->service3_stat3_label, 'value' => $request->service3_stat3_value]
                        ],
                        'icon' => 'mobile',
                        'color' => 'purple'
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'services'
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
                'message' => 'Services section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Services section: ' . $e->getMessage()
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
            // 6 additional services
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
            'add_service5_title' => 'required|string|max:255',
            'add_service5_subtitle' => 'required|string|max:255',
            'add_service5_description' => 'required|string|max:500',
            'add_service6_title' => 'required|string|max:255',
            'add_service6_subtitle' => 'required|string|max:255',
            'add_service6_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
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
                    ],
                    [
                        'title' => $request->add_service5_title,
                        'subtitle' => $request->add_service5_subtitle,
                        'description' => $request->add_service5_description
                    ],
                    [
                        'title' => $request->add_service6_title,
                        'subtitle' => $request->add_service6_subtitle,
                        'description' => $request->add_service6_description
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
                    'order_by' => 5,
                    'is_active' => $request->boolean('is_active', true)
                ]
            );

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Additional Services section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Additional Services section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Tech Stack Section
     */
    public function saveTechStackSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'tech_title' => 'required|string|max:500',
            'tech_subtitle' => 'required|string|max:500',
            // 7 tech categories
            'tech1_title' => 'required|string|max:255',
            'tech1_description' => 'required|string|max:500',
            'tech1_technologies' => 'required|string',
            'tech2_title' => 'required|string|max:255',
            'tech2_description' => 'required|string|max:500',
            'tech2_technologies' => 'required|string',
            'tech3_title' => 'required|string|max:255',
            'tech3_description' => 'required|string|max:500',
            'tech3_technologies' => 'required|string',
            'tech4_title' => 'required|string|max:255',
            'tech4_description' => 'required|string|max:500',
            'tech4_technologies' => 'required|string',
            'tech5_title' => 'required|string|max:255',
            'tech5_description' => 'required|string|max:500',
            'tech5_technologies' => 'required|string',
            'tech6_title' => 'required|string|max:255',
            'tech6_description' => 'required|string|max:500',
            'tech6_technologies' => 'required|string',
            'tech7_title' => 'required|string|max:255',
            'tech7_description' => 'required|string|max:500',
            'tech7_technologies' => 'required|string',
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
            $contentData = [
                'title' => $request->tech_title,
                'subtitle' => $request->tech_subtitle,
                'categories' => [
                    [
                        'title' => $request->tech1_title,
                        'description' => $request->tech1_description,
                        'technologies' => explode(',', $request->tech1_technologies)
                    ],
                    [
                        'title' => $request->tech2_title,
                        'description' => $request->tech2_description,
                        'technologies' => explode(',', $request->tech2_technologies)
                    ],
                    [
                        'title' => $request->tech3_title,
                        'description' => $request->tech3_description,
                        'technologies' => explode(',', $request->tech3_technologies)
                    ],
                    [
                        'title' => $request->tech4_title,
                        'description' => $request->tech4_description,
                        'technologies' => explode(',', $request->tech4_technologies)
                    ],
                    [
                        'title' => $request->tech5_title,
                        'description' => $request->tech5_description,
                        'technologies' => explode(',', $request->tech5_technologies)
                    ],
                    [
                        'title' => $request->tech6_title,
                        'description' => $request->tech6_description,
                        'technologies' => explode(',', $request->tech6_technologies)
                    ],
                    [
                        'title' => $request->tech7_title,
                        'description' => $request->tech7_description,
                        'technologies' => explode(',', $request->tech7_technologies)
                    ]
                ]
            ];

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
     * Save Industry Solutions Section
     */
    public function saveIndustrySolutionsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'industry_title' => 'required|string|max:500',
            // 6 industry solutions
            'solution1_title' => 'required|string|max:255',
            'solution1_description' => 'required|string|max:500',
            'solution2_title' => 'required|string|max:255',
            'solution2_description' => 'required|string|max:500',
            'solution3_title' => 'required|string|max:255',
            'solution3_description' => 'required|string|max:500',
            'solution4_title' => 'required|string|max:255',
            'solution4_description' => 'required|string|max:500',
            'solution5_title' => 'required|string|max:255',
            'solution5_description' => 'required|string|max:500',
            'solution6_title' => 'required|string|max:255',
            'solution6_description' => 'required|string|max:500',
            'bottom_message' => 'required|string|max:1000',
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
            $contentData = [
                'title' => $request->industry_title,
                'solutions' => [
                    [
                        'title' => $request->solution1_title,
                        'description' => $request->solution1_description
                    ],
                    [
                        'title' => $request->solution2_title,
                        'description' => $request->solution2_description
                    ],
                    [
                        'title' => $request->solution3_title,
                        'description' => $request->solution3_description
                    ],
                    [
                        'title' => $request->solution4_title,
                        'description' => $request->solution4_description
                    ],
                    [
                        'title' => $request->solution5_title,
                        'description' => $request->solution5_description
                    ],
                    [
                        'title' => $request->solution6_title,
                        'description' => $request->solution6_description
                    ]
                ],
                'bottom_message' => $request->bottom_message
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'industry_solutions'
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
                'message' => 'Industry Solutions section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Industry Solutions section: ' . $e->getMessage()
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
            // 4 reasons
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
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
                    ],
                    [
                        'title' => $request->reason4_title,
                        'description' => $request->reason4_description
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
                    'order_by' => 8,
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
     * Save How We Work Section
     */
    public function saveHowWeWorkSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'work_title' => 'required|string|max:500',
            'work_subtitle' => 'required|string|max:500',
            // 7 steps
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');

            $contentData = [
                'title' => $request->work_title,
                'subtitle' => $request->work_subtitle,
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
                    'section_name' => 'how_we_work'
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
                'message' => 'How We Work section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving How We Work section: ' . $e->getMessage()
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
            // 6 FAQs
            'faq1_question' => 'required|string|max:500',
            'faq1_answer' => 'required|string|max:1000',
            'faq2_question' => 'required|string|max:500',
            'faq2_answer' => 'required|string|max:1000',
            'faq3_question' => 'required|string|max:500',
            'faq3_answer' => 'required|string|max:1000',
            'faq4_question' => 'required|string|max:500',
            'faq4_answer' => 'required|string|max:1000',
            'faq5_question' => 'required|string|max:500',
            'faq5_answer' => 'required|string|max:1000',
            'faq6_question' => 'required|string|max:500',
            'faq6_answer' => 'required|string|max:1000',
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');
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
                    ],
                    [
                        'question' => $request->faq6_question,
                        'answer' => $request->faq6_answer
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
                    'order_by' => 10,
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
            $page = $this->getOrCreateMobileAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'mobileappdevelopmentpage');

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
     * Get or create mobile app development page
     */
    private function getOrCreateMobileAppDevelopmentPage()
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
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'mobileappdevelopmentpage')->first();
        
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
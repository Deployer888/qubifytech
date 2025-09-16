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
  
class WebAppDevelopmentController extends Controller
{
    public function index()
    {
        // Get or create the web app development page
        $page = $this->getOrCreateWebAppDevelopmentPage();
        $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
        
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $whoWeServeContent = $this->getSectionContent($page->id ,$pageType->id, 'who_we_serve');
        $webAppsDeliverContent = $this->getSectionContent($page->id, $pageType->id, 'web_apps_deliver');
        $industriesContent = $this->getSectionContent($page->id, $pageType->id, 'industries');
        $servicesContent = $this->getSectionContent($page->id, $pageType->id, 'services');
        $benefitsContent = $this->getSectionContent($page->id, $pageType->id, 'benefits');
        $techStackContent = $this->getSectionContent($page->id, $pageType->id, 'tech_stack');
        $faqContent = $this->getSectionContent($page->id, $pageType->id, 'faq');
        $seo_data = CustomSeo::where('page_id', $pageType->id)->first();
        return view('dynamicpage::servicespage.webAppDevelopment', compact(
            'page', 
            'pageType', 
            'seo_data', 
            'heroContent', 
            'introContent', 
            'whoWeServeContent',
            'webAppsDeliverContent',
            'industriesContent',
            'servicesContent',
            'benefitsContent',
            'techStackContent',
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
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
            'feature5_title' => 'required|string|max:255',
            'feature5_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
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
                    ],
                    [
                        'title' => $request->feature5_title,
                        'description' => $request->feature5_description
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
     * Save Who We Serve Section
     */
    public function saveWhoWeServeSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'who_title' => 'required|string|max:500',
            'who_subtitle' => 'required|string|max:500',
            // Service 1 - Startups
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
            // Service 2 - Businesses
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
            // Service 3 - Enterprises
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
            $contentData = [
                'title' => $request->who_title,
                'subtitle' => $request->who_subtitle,
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
                        'icon' => 'fas fa-rocket',
                        'color' => 'green'
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
                        'icon' => 'fas fa-industry',
                        'color' => 'purple'
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'who_we_serve'
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
                'message' => 'Who We Serve section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Who We Serve section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Web Apps We Deliver Section
     */
    public function saveWebAppsDeliverSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'apps_title' => 'required|string|max:500',
            'apps_subtitle' => 'required|string|max:500',
            // 6 web app types
            'app1_title' => 'required|string|max:255',
            'app1_subtitle' => 'required|string|max:255',
            'app1_description' => 'required|string|max:500',
            'app2_title' => 'required|string|max:255',
            'app2_subtitle' => 'required|string|max:255',
            'app2_description' => 'required|string|max:500',
            'app3_title' => 'required|string|max:255',
            'app3_subtitle' => 'required|string|max:255',
            'app3_description' => 'required|string|max:500',
            'app4_title' => 'required|string|max:255',
            'app4_subtitle' => 'required|string|max:255',
            'app4_description' => 'required|string|max:500',
            'app5_title' => 'required|string|max:255',
            'app5_subtitle' => 'required|string|max:255',
            'app5_description' => 'required|string|max:500',
            'app6_title' => 'required|string|max:255',
            'app6_subtitle' => 'required|string|max:255',
            'app6_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
            $contentData = [
                'title' => $request->apps_title,
                'subtitle' => $request->apps_subtitle,
                'apps' => [
                    [
                        'title' => $request->app1_title,
                        'subtitle' => $request->app1_subtitle,
                        'description' => $request->app1_description
                    ],
                    [
                        'title' => $request->app2_title,
                        'subtitle' => $request->app2_subtitle,
                        'description' => $request->app2_description
                    ],
                    [
                        'title' => $request->app3_title,
                        'subtitle' => $request->app3_subtitle,
                        'description' => $request->app3_description
                    ],
                    [
                        'title' => $request->app4_title,
                        'subtitle' => $request->app4_subtitle,
                        'description' => $request->app4_description
                    ],
                    [
                        'title' => $request->app5_title,
                        'subtitle' => $request->app5_subtitle,
                        'description' => $request->app5_description
                    ],
                    [
                        'title' => $request->app6_title,
                        'subtitle' => $request->app6_subtitle,
                        'description' => $request->app6_description
                    ]
                ]
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'web_apps_deliver'
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
                'message' => 'Web Apps We Deliver section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving Web Apps We Deliver section: ' . $e->getMessage()
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
            // 6 industries
            'industry1_title' => 'required|string|max:255',
            'industry1_description' => 'required|string|max:1000',
            'industry1_feature1' => 'required|string|max:255',
            'industry1_feature2' => 'required|string|max:255',
            'industry1_feature3' => 'required|string|max:255',
            'industry2_title' => 'required|string|max:255',
            'industry2_description' => 'required|string|max:1000',
            'industry2_feature1' => 'required|string|max:255',
            'industry2_feature2' => 'required|string|max:255',
            'industry2_feature3' => 'required|string|max:255',
            'industry3_title' => 'required|string|max:255',
            'industry3_description' => 'required|string|max:1000',
            'industry3_feature1' => 'required|string|max:255',
            'industry3_feature2' => 'required|string|max:255',
            'industry3_feature3' => 'required|string|max:255',
            'industry4_title' => 'required|string|max:255',
            'industry4_description' => 'required|string|max:1000',
            'industry4_feature1' => 'required|string|max:255',
            'industry4_feature2' => 'required|string|max:255',
            'industry4_feature3' => 'required|string|max:255',
            'industry5_title' => 'required|string|max:255',
            'industry5_description' => 'required|string|max:1000',
            'industry5_feature1' => 'required|string|max:255',
            'industry5_feature2' => 'required|string|max:255',
            'industry5_feature3' => 'required|string|max:255',
            'industry6_title' => 'required|string|max:255',
            'industry6_description' => 'required|string|max:1000',
            'industry6_feature1' => 'required|string|max:255',
            'industry6_feature2' => 'required|string|max:255',
            'industry6_feature3' => 'required|string|max:255',
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
            $contentData = [
                'title' => $request->industries_title,
                'subtitle' => $request->industries_subtitle,
                'industries' => [
                    [
                        'title' => $request->industry1_title,
                        'description' => $request->industry1_description,
                        'features' => [
                            $request->industry1_feature1,
                            $request->industry1_feature2,
                            $request->industry1_feature3
                        ]
                    ],
                    [
                        'title' => $request->industry2_title,
                        'description' => $request->industry2_description,
                        'features' => [
                            $request->industry2_feature1,
                            $request->industry2_feature2,
                            $request->industry2_feature3
                        ]
                    ],
                    [
                        'title' => $request->industry3_title,
                        'description' => $request->industry3_description,
                        'features' => [
                            $request->industry3_feature1,
                            $request->industry3_feature2,
                            $request->industry3_feature3
                        ]
                    ],
                    [
                        'title' => $request->industry4_title,
                        'description' => $request->industry4_description,
                        'features' => [
                            $request->industry4_feature1,
                            $request->industry4_feature2,
                            $request->industry4_feature3
                        ]
                    ],
                    [
                        'title' => $request->industry5_title,
                        'description' => $request->industry5_description,
                        'features' => [
                            $request->industry5_feature1,
                            $request->industry5_feature2,
                            $request->industry5_feature3
                        ]
                    ],
                    [
                        'title' => $request->industry6_title,
                        'description' => $request->industry6_description,
                        'features' => [
                            $request->industry6_feature1,
                            $request->industry6_feature2,
                            $request->industry6_feature3
                        ]
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
     * Save Services Section
     */
    public function saveServicesSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'services_title' => 'required|string|max:500',
            'services_subtitle' => 'required|string|max:500',
            // 6 services
            'service1_title' => 'required|string|max:255',
            'service1_description' => 'required|string|max:500',
            'service2_title' => 'required|string|max:255',
            'service2_description' => 'required|string|max:500',
            'service3_title' => 'required|string|max:255',
            'service3_description' => 'required|string|max:500',
            'service4_title' => 'required|string|max:255',
            'service4_description' => 'required|string|max:500',
            'service5_title' => 'required|string|max:255',
            'service5_description' => 'required|string|max:500',
            'service6_title' => 'required|string|max:255',
            'service6_description' => 'required|string|max:500',
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
            $contentData = [
                'title' => $request->services_title,
                'subtitle' => $request->services_subtitle,
                'services' => [
                    [
                        'title' => $request->service1_title,
                        'description' => $request->service1_description
                    ],
                    [
                        'title' => $request->service2_title,
                        'description' => $request->service2_description
                    ],
                    [
                        'title' => $request->service3_title,
                        'description' => $request->service3_description
                    ],
                    [
                        'title' => $request->service4_title,
                        'description' => $request->service4_description
                    ],
                    [
                        'title' => $request->service5_title,
                        'description' => $request->service5_description
                    ],
                    [
                        'title' => $request->service6_title,
                        'description' => $request->service6_description
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
                    'order_by' => 6,
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
     * Save Benefits Section
     */
    public function saveBenefitsSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'benefits_title' => 'required|string|max:500',
            // 5 benefits
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
            $contentData = [
                'title' => $request->benefits_title,
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
     * Save Tech Stack Section
     */
    public function saveTechStackSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'tech_title' => 'required|string|max:500',
            'tech_subtitle' => 'required|string|max:500',
            // 9 tech categories
            'tech1_title' => 'required|string|max:255',
            'tech1_technologies' => 'required|string',
            'tech2_title' => 'required|string|max:255',
            'tech2_technologies' => 'required|string',
            'tech3_title' => 'required|string|max:255',
            'tech3_technologies' => 'required|string',
            'tech4_title' => 'required|string|max:255',
            'tech4_technologies' => 'required|string',
            'tech5_title' => 'required|string|max:255',
            'tech5_technologies' => 'required|string',
            'tech6_title' => 'required|string|max:255',
            'tech6_technologies' => 'required|string',
            'tech7_title' => 'required|string|max:255',
            'tech7_technologies' => 'required|string',
            'tech8_title' => 'required|string|max:255',
            'tech8_technologies' => 'required|string',
            'tech9_title' => 'required|string|max:255',
            'tech9_technologies' => 'required|string',
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
            $contentData = [
                'title' => $request->tech_title,
                'subtitle' => $request->tech_subtitle,
                'categories' => [
                    [
                        'title' => $request->tech1_title,
                        'technologies' => explode(',', $request->tech1_technologies)
                    ],
                    [
                        'title' => $request->tech2_title,
                        'technologies' => explode(',', $request->tech2_technologies)
                    ],
                    [
                        'title' => $request->tech3_title,
                        'technologies' => explode(',', $request->tech3_technologies)
                    ],
                    [
                        'title' => $request->tech4_title,
                        'technologies' => explode(',', $request->tech4_technologies)
                    ],
                    [
                        'title' => $request->tech5_title,
                        'technologies' => explode(',', $request->tech5_technologies)
                    ],
                    [
                        'title' => $request->tech6_title,
                        'technologies' => explode(',', $request->tech6_technologies)
                    ],
                    [
                        'title' => $request->tech7_title,
                        'technologies' => explode(',', $request->tech7_technologies)
                    ],
                    [
                        'title' => $request->tech8_title,
                        'technologies' => explode(',', $request->tech8_technologies)
                    ],
                    [
                        'title' => $request->tech9_title,
                        'technologies' => explode(',', $request->tech9_technologies)
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
                    'order_by' => 8,
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
     * Save FAQ Section
     */
    public function saveFaqSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'faq_title' => 'required|string|max:500',
            // 5 FAQs
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
            $page = $this->getOrCreateWebAppDevelopmentPage();
            $pageType = $this->getOrCreatePageType($page->id, 'webappdevelopmentpage');
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
                    'order_by' => 9,
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
     * Get or create web app development page
     */
    private function getOrCreateWebAppDevelopmentPage()
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
    private function getSectionContent($pageId, $pageTypeId, $sectionName)
    {
        return DynamicContent::where('page_id', $pageId)
        ->where('page_type_id',$pageTypeId)
        ->where('section_name', $sectionName)
        ->first();
    }
    // private function getSectionContent($pageId, $sectionName)
    // {
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'webappdevelopmentpage')->first();
        
    //     if (!$pageType) {
    //         return null;
    //     }

    //     return DynamicContent::where('page_id', $pageId)
    //         ->where('page_type_id', $pageType->id)
    //         ->where('section_name', $sectionName)
    //         ->first();
    // }
}
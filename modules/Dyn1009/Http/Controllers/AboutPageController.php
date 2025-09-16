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

class AboutPageController extends Controller
{
    public function index()
    {
        // Get or create the about page
        $page = $this->getOrCreateAboutPage();
        $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');
        // Get existing content for all sectionsh
        $heroContent = $this->getSectionContent($page->id, 'hero');
        $whoWeAreContent = $this->getSectionContent($page->id, 'who_we_are');
        $whatWeDoContent = $this->getSectionContent($page->id, 'what_we_do');
        $missionVisionContent = $this->getSectionContent($page->id, 'mission_vision');
        $whyQubifyContent = $this->getSectionContent($page->id, 'why_qubify');
        $coCreationContent = $this->getSectionContent($page->id, 'co_creation');
        $footerCtaContent = $this->getSectionContent($page->id, 'footer_cta');
        $seo_data = CustomSeo::where('page_id', $pageType->id)->first();

        return view('dynamicpage::aboutpage.index', compact(
            'page', 
            'pageType', 
            'heroContent', 
            'whoWeAreContent', 
            'whatWeDoContent',
            'missionVisionContent',
            'whyQubifyContent',
            'coCreationContent',
            'footerCtaContent',
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
            'hero_button_text' => 'required|string|max:255',
            'hero_button_icon' => 'required|string|max:255',
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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

            // Prepare content data
            $contentData = [
                'title' => $request->hero_title,
                'subtitle' => $request->hero_subtitle,
                'button' => [
                    'text' => $request->hero_button_text,
                    'icon' => $request->hero_button_icon
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
     * Save Who We Are Section
     */
    public function saveWhoWeAreSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'who_title' => 'required|string|max:255',
            'who_description_1' => 'required|string',
            'who_description_2' => 'required|string',
            'who_feature_icon' => 'required|string|max:255',
            'who_feature_title' => 'required|string|max:255',
            'who_feature_description' => 'required|string|max:500',
            // Statistics
            'stat1_number' => 'required|string|max:10',
            'stat1_label' => 'required|string|max:255',
            'stat2_number' => 'required|string|max:10',
            'stat2_label' => 'required|string|max:255',
            'stat3_number' => 'required|string|max:10',
            'stat3_label' => 'required|string|max:255',
            'stat4_number' => 'required|string|max:10',
            'stat4_label' => 'required|string|max:255',
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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

            // Prepare content data
            $contentData = [
                'title' => $request->who_title,
                'descriptions' => [
                    $request->who_description_1,
                    $request->who_description_2
                ],
                'feature' => [
                    'icon' => $request->who_feature_icon,
                    'title' => $request->who_feature_title,
                    'description' => $request->who_feature_description
                ],
                'statistics' => [
                    [
                        'number' => $request->stat1_number,
                        'label' => $request->stat1_label
                    ],
                    [
                        'number' => $request->stat2_number,
                        'label' => $request->stat2_label
                    ],
                    [
                        'number' => $request->stat3_number,
                        'label' => $request->stat3_label
                    ],
                    [
                        'number' => $request->stat4_number,
                        'label' => $request->stat4_label
                    ]
                ]
            ];

            // Save or update who we are section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'who_we_are'
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
                'message' => 'Who We Are section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Who We Are section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save What We Do Section
     */
    public function saveWhatWeDoSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'what_title' => 'required|string|max:255',
            'what_description' => 'required|string',
            // Service cards (8 services)
            'service1_icon' => 'required|string|max:255',
            'service1_title' => 'required|string|max:255',
            'service1_description' => 'required|string',
            'service2_icon' => 'required|string|max:255',
            'service2_title' => 'required|string|max:255',
            'service2_description' => 'required|string',
            'service3_icon' => 'required|string|max:255',
            'service3_title' => 'required|string|max:255',
            'service3_description' => 'required|string',
            'service4_icon' => 'required|string|max:255',
            'service4_title' => 'required|string|max:255',
            'service4_description' => 'required|string',
            'service5_icon' => 'required|string|max:255',
            'service5_title' => 'required|string|max:255',
            'service5_description' => 'required|string',
            'service6_icon' => 'required|string|max:255',
            'service6_title' => 'required|string|max:255',
            'service6_description' => 'required|string',
            'service7_icon' => 'required|string|max:255',
            'service7_title' => 'required|string|max:255',
            'service7_description' => 'required|string',
            'service8_icon' => 'required|string|max:255',
            'service8_title' => 'required|string|max:255',
            'service8_description' => 'required|string',
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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

            // Prepare content data
            $services = [];
            for ($i = 1; $i <= 8; $i++) {
                $services[] = [
                    'icon' => $request->input("service{$i}_icon"),
                    'title' => $request->input("service{$i}_title"),
                    'description' => $request->input("service{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->what_title,
                'description' => $request->what_description,
                'services' => $services
            ];

            // Save or update what we do section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'what_we_do'
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
                'message' => 'What We Do section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving What We Do section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Mission & Vision Section
     */
    public function saveMissionVisionSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'mission_title' => 'required|string|max:255',
            'mission_description' => 'required|string',
            'mission_icon' => 'required|string|max:255',
            'vision_title' => 'required|string|max:255',
            'vision_description' => 'required|string',
            'vision_icon' => 'required|string|max:255',
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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

            // Prepare content data
            $contentData = [
                'mission' => [
                    'title' => $request->mission_title,
                    'description' => $request->mission_description,
                    'icon' => $request->mission_icon
                ],
                'vision' => [
                    'title' => $request->vision_title,
                    'description' => $request->vision_description,
                    'icon' => $request->vision_icon
                ]
            ];

            // Save or update mission & vision section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'mission_vision'
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
                'message' => 'Mission & Vision section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Mission & Vision section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Why Qubify Section
     */
    public function saveWhyQubifySection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'why_title' => 'required|string|max:255',
            'why_description' => 'required|string',
            // 5 pillars
            'pillar1_icon' => 'required|string|max:255',
            'pillar1_title' => 'required|string|max:255',
            'pillar1_description' => 'required|string',
            'pillar2_icon' => 'required|string|max:255',
            'pillar2_title' => 'required|string|max:255',
            'pillar2_description' => 'required|string',
            'pillar3_icon' => 'required|string|max:255',
            'pillar3_title' => 'required|string|max:255',
            'pillar3_description' => 'required|string',
            'pillar4_icon' => 'required|string|max:255',
            'pillar4_title' => 'required|string|max:255',
            'pillar4_description' => 'required|string',
            'pillar5_icon' => 'required|string|max:255',
            'pillar5_title' => 'required|string|max:255',
            'pillar5_description' => 'required|string',
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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

            // Prepare content data
            $pillars = [];
            for ($i = 1; $i <= 5; $i++) {
                $pillars[] = [
                    'icon' => $request->input("pillar{$i}_icon"),
                    'title' => $request->input("pillar{$i}_title"),
                    'description' => $request->input("pillar{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->why_title,
                'description' => $request->why_description,
                'pillars' => $pillars
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
                    'order_by' => 5,
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

    /**
     * Save Co-Creation Process Section
     */
    public function saveCoCreationSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'cocreation_title' => 'required|string|max:500',
            'cocreation_description' => 'required|string',
            // 3 process steps
            'step1_icon' => 'required|string|max:255',
            'step1_title' => 'required|string|max:255',
            'step1_description' => 'required|string',
            'step2_icon' => 'required|string|max:255',
            'step2_title' => 'required|string|max:255',
            'step2_description' => 'required|string',
            'step3_icon' => 'required|string|max:255',
            'step3_title' => 'required|string|max:255',
            'step3_description' => 'required|string',
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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

            // Prepare content data
            $contentData = [
                'title' => $request->cocreation_title,
                'description' => $request->cocreation_description,
                'steps' => [
                    [
                        'icon' => $request->step1_icon,
                        'title' => $request->step1_title,
                        'description' => $request->step1_description
                    ],
                    [
                        'icon' => $request->step2_icon,
                        'title' => $request->step2_title,
                        'description' => $request->step2_description
                    ],
                    [
                        'icon' => $request->step3_icon,
                        'title' => $request->step3_title,
                        'description' => $request->step3_description
                    ]
                ]
            ];

            // Save or update co-creation section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'co_creation'
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
                'message' => 'Co-Creation Process section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Co-Creation Process section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Footer CTA Section
     */
    public function saveFooterCtaSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'cta_title' => 'required|string|max:500',
            'cta_description' => 'required|string',
            'cta_button1_text' => 'required|string|max:255',
            'cta_button1_icon' => 'required|string|max:255',
            'cta_button2_text' => 'required|string|max:255',
            'cta_button2_icon' => 'required|string|max:255',
            'cta_button2_link' => 'required|string|max:255',
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

            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

            // Prepare content data
            $contentData = [
                'title' => $request->cta_title,
                'description' => $request->cta_description,
                'buttons' => [
                    [
                        'text' => $request->cta_button1_text,
                        'icon' => $request->cta_button1_icon,
                        'action' => 'modal' // Opens contact modal
                    ],
                    [
                        'text' => $request->cta_button2_text,
                        'icon' => $request->cta_button2_icon,
                        'link' => $request->cta_button2_link
                    ]
                ]
            ];

            // Save or update footer cta section
            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'footer_cta'
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
                'message' => 'Footer CTA section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving Footer CTA section: ' . $e->getMessage()
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
            $page = $this->getOrCreateAboutPage();
            $pageType = $this->getOrCreatePageType($page->id, 'aboutpage');

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
     * Get or create about page
     */
    private function getOrCreateAboutPage()
    {
        return Page::firstOrCreate(
            ['name' => 'aboutpage'],
            [
                'name' => 'aboutpage'
            ]
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
    private function getSectionContent($pageId, $sectionName)
    {
        $pageType = PageType::where('page_id', $pageId)->where('type', 'aboutpage')->first();
        
        if (!$pageType) {
            return null;
        }

        return DynamicContent::where('page_id', $pageId)
            ->where('page_type_id', $pageType->id)
            ->where('section_name', $sectionName)
            ->first();
    }
}
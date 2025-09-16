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
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class PosDevelopmentController extends Controller
{
    /**
     * Display the POS Development page management interface
     */
    public function index()
    {
        // Get or create the POS development page
        $page = $this->getOrCreatePosPage();
        $pageType = $this->getOrCreatePageType($page->id, 'pos_development');
        
        // Get existing content for all sections
        $heroContent = $this->getSectionContent($page->id, $pageType->id, 'hero');
        $introContent = $this->getSectionContent($page->id, $pageType->id, 'intro');
        $coreFeaturesContent = $this->getSectionContent($page->id, $pageType->id, 'core_features');
        $advancedToolsContent = $this->getSectionContent($page->id, $pageType->id, 'advanced_tools');
        $adminControlContent = $this->getSectionContent($page->id, $pageType->id, 'admin_control');
        $whyChooseContent = $this->getSectionContent($page->id, $pageType->id, 'why_choose');
        $industriesContent = $this->getSectionContent($page->id, $pageType->id, 'industries');
        $finalCtaContent = $this->getSectionContent($page->id, $pageType->id, 'final_cta');
       
        return view('dynamicpage::solutionspage.posDevelopment', compact(
            'page', 
            'heroContent', 
            'introContent', 
            'coreFeaturesContent',
            'advancedToolsContent',
            'adminControlContent',
            'whyChooseContent',
            'industriesContent',
            'finalCtaContent'
        ));
    }

    /**
     * Get or create the POS development page
     */
    private function getOrCreatePosPage(): Page
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

    private function getSectionContent($pageId, $pageTypeId, $sectionName)
    {
        return DynamicContent::where('page_id', $pageId)
        ->where('page_type_id',$pageTypeId)
        ->where('section_name', $sectionName)
        ->first();
    }
    /**
     * Get section content by page ID and section name
     */
    // private function getSectionContent(int $pageId, string $sectionName): ?DynamicContent
    // {
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'pos_development')->first();
        
    //     if (!$pageType) {
    //         return null;
    //     }

    //     return DynamicContent::where('page_id', $pageId)
    //         ->where('page_type_id', $pageType->id)
    //         ->where('section_name', $sectionName)
    //         ->first();
    // }

    /**
     * Get all sections content for the POS page
     */
    // private function getAllSectionsContent(int $pageId): array
    // {
    //     $pageType = PageType::where('page_id', $pageId)->where('type', 'pos_development')->first();
        
    //     if (!$pageType) {
    //         return [];
    //     }

    //     $contents = DynamicContent::where('page_id', $pageId)
    //         ->where('page_type_id', $pageType->id)
    //         ->orderBy('order_by')
    //         ->get()
    //         ->keyBy('section_name');

    //     return $contents->toArray();
    // }

    /**
     * Save Hero Section
     */
    public function saveHeroSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'hero_title' => 'required|string|max:500',
            'hero_subtitle' => 'required|string|max:1000',
            'hero_feature1' => 'required|string|max:100',
            'hero_feature2' => 'required|string|max:100',
            'hero_feature3' => 'required|string|max:100',
            'hero_button1_text' => 'required|string|max:100',
            'hero_button2_text' => 'required|string|max:100',
            'hero_button2_url' => 'nullable|string|max:255',
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

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

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
                        'action' => 'openContactModal()',
                        'classes' => 'btn-primary'
                    ],
                    [
                        'text' => $request->hero_button2_text,
                        'url' => $request->hero_button2_url ?: route('frontend.index') . '#contact',
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
            Log::error('Error saving POS hero section: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error saving hero section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Intro Section (What is Qubify POS)
     */
    public function saveIntroSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'intro_title' => 'required|string|max:255',
            'intro_subtitle' => 'required|string|max:255',
            'intro_description' => 'required|string|max:1000',
            'intro_secondary_description' => 'required|string|max:1000',
            'intro_feature1' => 'required|string|max:100',
            'intro_feature2' => 'required|string|max:100',
            'intro_feature3' => 'required|string|max:100',
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

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

            $contentData = [
                'title' => $request->intro_title,
                'subtitle' => $request->intro_subtitle,
                'description' => $request->intro_description,
                'secondary_description' => $request->intro_secondary_description,
                'features' => [
                    $request->intro_feature1,
                    $request->intro_feature2,
                    $request->intro_feature3
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
                'message' => 'What is Qubify POS section saved successfully!'
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

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

            // Build capabilities array
            $capabilities = [];
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= 3) {
                    // Build features array
                    $features = [];
                    for ($j = 1; $j <= 3; $j++) {
                        $features[] = $request->input("capability{$i}_feature{$j}");
                    }

                    // Build statistics array
                    $stats = [];
                    for ($k = 1; $k <= 3; $k++) {
                        $stats[] = [
                            'label' => $request->input("capability{$i}_stat{$k}_label"),
                            'value' => $request->input("capability{$i}_stat{$k}_value")
                        ];
                    }
                }

                    $capabilities[] = [
                        'title' => $request->input("capability{$i}_title"),
                        'subtitle' => $request->input("capability{$i}_subtitle"),
                        'description' => $request->input("capability{$i}_description"),
                        'features' => $features,
                        'stats' => $stats
                    ];
                
            }

            $contentData = [
                'title' => $request->core_title,
                'description' => $request->core_description,
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

    /**
     * Save Advanced Tools Section
     */
    public function saveAdvancedToolsSection(Request $request): JsonResponse
    {
        $validationRules = [
            'advanced_title' => 'required|string|max:255',
            'is_active' => 'boolean'
        ];

        // Add validation rules for all 6 tools
        for ($i = 1; $i <= 6; $i++) {
            $validationRules = array_merge($validationRules, [
                "tool{$i}_title" => 'required|string|max:255',
                "tool{$i}_description" => 'required|string|max:500'
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

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

            $tools = [];
            for ($i = 1; $i <= 6; $i++) {
                $tools[] = [
                    'title' => $request->input("tool{$i}_title"),
                    'description' => $request->input("tool{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->advanced_title,
                'tools' => $tools
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'advanced_tools'
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
                'message' => 'Advanced Tools section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error saving Advanced Tools section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Admin Control Center Section
     */
    public function saveAdminControlSection(Request $request): JsonResponse
    {

        try {
            DB::beginTransaction();

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

            $features = [];
            for ($i = 1; $i <= 6; $i++) {
                // Build tags array
                $tags = [];
                for ($j = 1; $j <= 3; $j++) {
                    $tags[] = $request->input("feature{$i}_tag{$j}");
                }

                $features[] = [
                    'title' => $request->input("feature{$i}_title"),
                    'description' => $request->input("feature{$i}_description"),
                    'tags' => $tags
                ];
            }

            $contentData = [
                'title' => $request->admin_title,
                'description' => $request->admin_description,
                'features' => $features
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'admin_control'
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
                'message' => 'Admin Control Center section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error saving Admin Control Center section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Why Choose Section
     */
    public function saveWhyChooseSection(Request $request): JsonResponse
    {
        $validationRules = [
            'why_title' => 'required|string|max:255',
            'is_active' => 'boolean'
        ];

        // Add validation rules for all 4 reasons
        for ($i = 1; $i <= 4; $i++) {
            $validationRules = array_merge($validationRules, [
                "reason{$i}_title" => 'required|string|max:255',
                "reason{$i}_description" => 'required|string|max:500'
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

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

            $reasons = [];
            for ($i = 1; $i <= 4; $i++) {
                $reasons[] = [
                    'title' => $request->input("reason{$i}_title"),
                    'description' => $request->input("reason{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->why_title,
                'reasons' => $reasons
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'why_choose'
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
                'message' => 'Why Choose section saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error saving Why Choose section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save Industries Section
     */
    public function saveIndustriesSection(Request $request): JsonResponse
    {
        $validationRules = [
            'industries_title' => 'required|string|max:255',
            'industries_description' => 'required|string|max:500',
            'is_active' => 'boolean'
        ];

        // Add validation rules for all 6 industries
        for ($i = 1; $i <= 6; $i++) {
            $validationRules = array_merge($validationRules, [
                "industry{$i}_title" => 'required|string|max:255',
                "industry{$i}_description" => 'required|string|max:500',
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

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

            $industries = [];
            for ($i = 1; $i <= 6; $i++) {
                $industries[] = [
                    'title' => $request->input("industry{$i}_title"),
                    'description' => $request->input("industry{$i}_description")
                ];
            }

            $contentData = [
                'title' => $request->industries_title,
                'description' => $request->industries_description,
                'industries' => $industries
            ];

            DynamicContent::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => 'industries'
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
     * Save Final CTA Section
     */
    public function saveFinalCtaSection(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'cta_title' => 'required|string|max:255',
            'cta_description' => 'required|string|max:500',
            'cta_feature1' => 'required|string|max:100',
            'cta_feature2' => 'required|string|max:100',
            'cta_feature3' => 'required|string|max:100',
            'cta_button1_text' => 'required|string|max:100',
            'cta_button2_text' => 'required|string|max:100',
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

            $page = $this->getOrCreatePosPage();
            $pageType = $this->getOrCreatePageType($page->id, 'pos_development');

            $contentData = [
                'title' => $request->cta_title,
                'description' => $request->cta_description,
                'features' => [
                    $request->cta_feature1,
                    $request->cta_feature2,
                    $request->cta_feature3
                ],
                'buttons' => [
                    [
                        'text' => $request->cta_button1_text,
                        'classes' => 'btn-primary'
                    ],
                    [
                        'text' => $request->cta_button2_text,
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
                    'order_by' => 8,
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
            $page = $this->getOrCreatePosPage();
            
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
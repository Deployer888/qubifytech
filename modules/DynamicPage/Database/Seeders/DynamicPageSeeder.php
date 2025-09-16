<?php

namespace Modules\DynamicPage\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\DynamicPage\Entities\Page;
use Modules\DynamicPage\Entities\PageType;
use Modules\DynamicPage\Entities\DynamicContent;

class DynamicPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Homepage
        $page = Page::firstOrCreate(
            ['name' => 'Homepage'],
            ['name' => 'Homepage']
        );

        // Create Page Type
        $pageType = PageType::firstOrCreate(
            ['page_id' => $page->id, 'type' => 'homepage'],
            ['page_id' => $page->id, 'type' => 'homepage']
        );

        // Create Hero Section
        DynamicContent::firstOrCreate(
            [
                'page_id' => $page->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'hero'
            ],
            [
                'content_json' => [
                    'badge' => [
                        'icon' => 'fas fa-rocket',
                        'text' => 'A Leading Software Development Company'
                    ],
                    'title' => 'AI-Driven Software Development Company',
                    'description' => 'We design AI-powered software and cutting-edge solutions that help global enterprises and tech startups build faster, smarter, and more efficiently. Making an advanced and better future.',
                    'sub_description' => 'From idea to execution, Qubify is your engine for next-gen innovation.',
                    'cta' => [
                        'icon' => 'fas fa-rocket',
                        'text' => 'Start Your Project',
                        'link' => 'javascript:void(0)'
                    ],
                    'statistics' => [
                        [
                            'number' => '500',
                            'suffix' => '+',
                            'label' => 'Successful Projects'
                        ],
                        [
                            'number' => '50',
                            'suffix' => '+',
                            'label' => 'Enterprise Clients'
                        ],
                        [
                            'number' => '99',
                            'suffix' => '%',
                            'label' => 'Project Success Rate'
                        ]
                    ]
                ],
                'order_by' => 1,
                'is_active' => true
            ]
        );

        // Create About Section
        DynamicContent::firstOrCreate(
            [
                'page_id' => $page->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'about'
            ],
            [
                'content_json' => [
                    'title' => 'Why Qubify?',
                    'pillars' => [
                        [
                            'icon' => 'fas fa-shield-alt',
                            'title' => 'Built for Visionaries, Trusted by Leaders',
                            'description' => 'At Qubify, we don\'t just build software — we engineer transformative digital systems with security, scalability, and strategic growth baked in from day one.'
                        ],
                        [
                            'icon' => 'fas fa-graduation-cap',
                            'title' => 'Enterprise-Grade Security Architecture',
                            'description' => 'Modern businesses demand more than encryption. We develop secure, scalable platforms with future-ready smart contracts and decentralized infrastructure—ensuring your systems are safe, efficient, and built to grow.'
                        ],
                        [
                            'icon' => 'fas fa-cogs',
                            'title' => 'Accelerated Operational Intelligence',
                            'description' => 'We turn raw data into strategic action. Our AI-driven platforms uncover insights that help you scale faster, enhance customer journeys, and streamline internal operations—all in real time.'
                        ],
                        [
                            'icon' => 'fas fa-handshake',
                            'title' => 'We Take Every Project Serious',
                            'description' => 'We\'re not a volume shop—we\'re a partner. Each project gets direct C-suite oversight, access to top 1% tech talent, and tailored strategies to go from zero to market dominance with precision.'
                        ]
                    ]
                ],
                'order_by' => 2,
                'is_active' => true
            ]
        );

        // Create Services Section
        DynamicContent::firstOrCreate(
            [
                'page_id' => $page->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'services'
            ],
            [
                'content_json' => [
                    'title' => 'Our Capabilities – Solutions Portfolio',
                    'subtitle' => 'Scalable. Future-Ready.',
                    'description' => 'We engineer digital systems that do more than just work — they accelerate transformation. From AI to blockchain, every solution we deliver is crafted to solve real problems with long-term impact.',
                    'services' => [
                        'ai' => [
                            'title' => 'Enterprise AI Solutions — Built for Scale',
                            'subtitle' => 'Architect intelligent infrastructure that doesn\'t just analyze — it learns, adapts, and unlocks value at every level.',
                            'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=600&h=400&fit=crop&crop=center',
                            'image_alt' => 'AI Dashboard',
                            'button_text' => '🟣 Explore AI Solutions',
                            'content' => "What we help you build:\n\n• AI systems that enhance human decision-making\n• Platforms that convert data into actionable insight\n• Solutions that are secure, scalable, and performance-optimized\n• Predictive tools that identify patterns before problems arise"
                        ],
                        'mobile' => [
                            'title' => 'Mobile App Development — Designed for Growth',
                            'subtitle' => 'Create high-performance mobile experiences that delight users and scale with your business.',
                            'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&h=400&fit=crop&crop=center',
                            'image_alt' => 'Mobile Development',
                            'button_text' => '🟣 View Mobile Projects',
                            'content' => "Create high-performance mobile experiences that delight users and scale with your business.\n\n• Custom iOS and Android apps with intuitive UX and native performance\n• Cross-platform solutions using React Native or Flutter\n• Real-time features, API integrations, and offline-ready functionality\n• Scalable backend infrastructure to support millions of users"
                        ],
                        'web' => [
                            'title' => 'Modern Web Platforms — Engineered for Performance',
                            'subtitle' => 'We craft custom web applications that don\'t just look great — they drive engagement, streamline workflows, and scale with your business.',
                            'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop&crop=center',
                            'image_alt' => 'Web Development',
                            'button_text' => '🟣 Explore Web Development',
                            'content' => "We craft custom web applications that don't just look great — they drive engagement, streamline workflows, and scale with your business.\n\n• Responsive, high-performance web platforms tailored to your use case\n• Scalable backend systems powered by clean, modular code\n• Seamless user interfaces that drive conversion and retention\n• Integrations with CRMs, APIs, and third-party platforms"
                        ],
                        'mvp' => [
                            'title' => 'MVP Development – Go to Market Fast',
                            'subtitle' => 'Building your product\'s first version doesn\'t mean compromising on quality — it means focusing on what matters.',
                            'image' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&h=400&fit=crop&crop=center',
                            'image_alt' => 'MVP Development',
                            'button_text' => '🟣 Start Your MVP Journey',
                            'content' => "Building your product's first version doesn't mean compromising on quality — it means focusing on what matters.\n\n• A lean, scalable core product — built fast, built right\n• User-focused design that solves real pain points\n• Agile release cycles for testing, feedback, and iteration\n• A future-proof tech stack ready to grow with your vision"
                        ],
                        'design' => [
                            'title' => 'UI/UX Design That Feels as Good as It Looks',
                            'subtitle' => 'At Qubify, we design interfaces that do more than function — they connect.',
                            'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&h=400&fit=crop&crop=center',
                            'image_alt' => 'UI/UX Design',
                            'button_text' => '🟣 Explore Design Services',
                            'content' => "At Qubify, we design interfaces that do more than function — they connect.\n\n• Intuitive user flows that reduce friction and boost retention\n• Responsive design systems for web, mobile, and beyond\n• Research-backed wireframes and interaction prototypes\n• Visual experiences tailored to real user behavior"
                        ]
                    ]
                ],
                'order_by' => 3,
                'is_active' => true
            ]
        );

        // Create Solutions Section
        DynamicContent::firstOrCreate(
            [
                'page_id' => $page->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'solutions'
            ],
            [
                'content_json' => [
                    'title' => 'Ready-to-Use Tech Solutions',
                    'subtitle' => 'Pre-built Platforms. Custom Results. Zero Code Hassle.',
                    'description' => 'Qubify delivers business-ready digital architectures that reduce dev time, eliminate unnecessary complexity, and let you launch faster than ever — no deep tech team required.',
                    'solutions' => [
                        [
                            'icon' => '🔋',
                            'title' => '70% Ready Code Architecture',
                            'description' => 'Start with a strong, scalable foundation already wired with essential features and workflows.'
                        ],
                        [
                            'icon' => '🧩',
                            'title' => 'Customized for Your Business',
                            'description' => 'We tailor every solution to fit your brand, logic, and unique market positioning.'
                        ],
                        [
                            'icon' => '⚡',
                            'title' => 'Launch MVP in 2-3 Days',
                            'description' => 'Go live with a fully functional MVP in as little as 48 hours — faster than any traditional dev cycle.'
                        ]
                    ]
                ],
                'order_by' => 4,
                'is_active' => true
            ]
        );

        // Create placeholder sections
        $sections = [
            ['name' => 'portfolio', 'order' => 5],
            ['name' => 'testimonials', 'order' => 6],
            ['name' => 'cta', 'order' => 7],
            ['name' => 'contact', 'order' => 8]
        ];

        foreach ($sections as $section) {
            DynamicContent::firstOrCreate(
                [
                    'page_id' => $page->id,
                    'page_type_id' => $pageType->id,
                    'section_name' => $section['name']
                ],
                [
                    'content_json' => [
                        'title' => ucfirst($section['name']) . ' Section',
                        'description' => 'This section is ready for configuration.'
                    ],
                    'order_by' => $section['order'],
                    'is_active' => true
                ]
            );
        }
    }
}
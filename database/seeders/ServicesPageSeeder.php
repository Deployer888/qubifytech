<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\DynamicPage\Entities\Page;
use Modules\DynamicPage\Entities\PageType;
use Modules\DynamicPage\Entities\DynamicContent;

class ServicesPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the services page
        $servicesPage = Page::firstOrCreate(['name' => 'services']);

        // Create page type for services
        $pageType = PageType::firstOrCreate([
            'page_id' => $servicesPage->id,
            'type' => 'web_development_services'
        ]);

        // Hero Section Content
        DynamicContent::updateOrCreate(
            [
                'page_id' => $servicesPage->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'hero'
            ],
            [
                'content_json' => [
                    'title' => 'Custom Web <span class="holographic">Development</span> Services',
                    'subtitle' => 'You define the vision; we craft the solution. Leveraging our expertise in web technologies and agile development, we create high-performing, scalable, and responsive websites, web apps, and portals tailored to your goals.',
                    'features' => [
                        'Fully Responsive Design',
                        'E-commerce Ready',
                        'SEO Optimized',
                        'Mobile First'
                    ],
                    'primary_button' => '🚀 Start Your Project',
                    'secondary_button' => '💬 Get Free Consultation'
                ],
                'order_by' => 1,
                'is_active' => true
            ]
        );

        // Intro Section Content
        DynamicContent::updateOrCreate(
            [
                'page_id' => $servicesPage->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'intro'
            ],
            [
                'content_json' => [
                    'title' => 'We Deliver Highly Customized and <br><span class="bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">Fully Integrated</span> Web Development Services',
                    'description' => 'We provide completely integrated and personalized custom web development services as per your business requirements. Our solutions are built to tackle problems such as scalability and efficiency using the latest technologies.',
                    'cards' => [
                        [
                            'title' => 'Scalable Solutions',
                            'description' => 'Build websites and web applications that grow with your business using modern frameworks and technologies',
                            'color' => 'from-blue-500 to-blue-600',
                            'icon' => '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'
                        ],
                        [
                            'title' => 'E-commerce Excellence',
                            'description' => 'Custom e-commerce websites with great features and easy-to-control backend for smooth online store management',
                            'color' => 'from-green-500 to-green-600',
                            'icon' => '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>'
                        ],
                        [
                            'title' => 'Brand Alignment',
                            'description' => 'Dependable scalable platforms that match your brand guidelines and help your business grow effectively',
                            'color' => 'from-purple-500 to-purple-600',
                            'icon' => '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>'
                        ]
                    ]
                ],
                'order_by' => 2,
                'is_active' => true
            ]
        );

        // Core Services Section Content
        DynamicContent::updateOrCreate(
            [
                'page_id' => $servicesPage->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'core_services'
            ],
            [
                'content_json' => [
                    'title' => 'Our Custom Web <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Development Services</span>',
                    'subtitle' => 'Comprehensive web development solutions tailored to your business needs',
                    'services' => [
                        [
                            'title' => 'Responsive Website Development',
                            'tagline' => 'Perfect on Every Device',
                            'description' => 'Our custom web development services ensure your website looks great and works well on all devices. With adaptive grids and modern frameworks, we improve user experience, engagement, and search rankings for seamless conversions.',
                            'color' => 'from-blue-500 to-blue-600',
                            'icon' => '<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
                            'features' => ['Adaptive Grids', 'Modern Frameworks', 'SEO Optimized'],
                            'stats_title' => 'Device Compatibility',
                            'stats' => [
                                ['label' => 'Desktop', 'value' => '100%'],
                                ['label' => 'Mobile', 'value' => '100%'],
                                ['label' => 'Tablet', 'value' => '100%']
                            ]
                        ],
                        [
                            'title' => 'E-Commerce Development',
                            'tagline' => 'Boost Your Online Sales',
                            'description' => 'Get more sales online now with our custom e-commerce web development services. We include secure functionalities like shopping carts and encrypted checkouts to keep transactions safe and boost your online store\'s profits.',
                            'color' => 'from-green-500 to-green-600',
                            'icon' => '<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>',
                            'features' => ['Secure Payments', 'Shopping Cart', 'Inventory Management'],
                            'stats_title' => 'Sales Performance',
                            'stats' => [
                                ['label' => 'Conversion Rate', 'value' => '+45%'],
                                ['label' => 'Revenue Growth', 'value' => '+78%'],
                                ['label' => 'User Engagement', 'value' => '+62%']
                            ]
                        ],
                        [
                            'title' => 'CMS Development',
                            'tagline' => 'Manage Content Efficiently',
                            'description' => 'Our custom CMS development services help in managing your content efficiently. We use content management systems like WordPress or Drupal that can be adapted to your needs, so you can update your website without needing to know code.',
                            'color' => 'from-purple-500 to-purple-600',
                            'icon' => '<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>',
                            'features' => ['WordPress', 'Drupal', 'Custom CMS'],
                            'stats_title' => 'Content Management',
                            'stats' => [
                                ['label' => 'Easy Updates', 'value' => '✓'],
                                ['label' => 'No Coding', 'value' => '✓'],
                                ['label' => 'SEO Ready', 'value' => '✓']
                            ]
                        ]
                    ]
                ],
                'order_by' => 3,
                'is_active' => true
            ]
        );

        // Additional Services Section Content
        DynamicContent::updateOrCreate(
            [
                'page_id' => $servicesPage->id,
                'page_type_id' => $pageType->id,
                'section_name' => 'additional_services'
            ],
            [
                'content_json' => [
                    'title' => 'Additional <span class="text-blue-600">Services</span>',
                    'subtitle' => 'Comprehensive solutions to enhance your web presence',
                    'services' => [
                        [
                            'title' => 'Magento Web Development',
                            'tagline' => 'Advanced E-commerce Solutions',
                            'description' => 'Use Magento with our custom web development services for advanced e-commerce solutions. We deploy Magento CMS to develop a custom-built online store suitable for your business needs.',
                            'icon_bg' => 'bg-indigo-100',
                            'icon' => '<svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
                        ],
                        [
                            'title' => 'Marketing Automation',
                            'tagline' => 'AI-Powered Marketing',
                            'description' => 'Make your marketing easier with our custom web development services with marketing automation. We use artificial intelligence to get things done automatically and run campaigns.',
                            'icon_bg' => 'bg-teal-100',
                            'icon' => '<svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>'
                        ],
                        [
                            'title' => 'Website Security Audits',
                            'tagline' => 'Comprehensive Security',
                            'description' => 'Let our custom web development services keep your website safe with our web security audits. We find problems and then introduce strong actions in place to protect your site.',
                            'icon_bg' => 'bg-orange-100',
                            'icon' => '<svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>'
                        ],
                        [
                            'title' => 'Website Maintenance',
                            'tagline' => 'Ongoing Support',
                            'description' => 'Keep your website flawlessly optimal with our website maintenance support. We provide constant updates, bug fixes, and performance improvements to keep your website up and running.',
                            'icon_bg' => 'bg-pink-100',
                            'icon' => '<svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>'
                        ]
                    ]
                ],
                'order_by' => 4,
                'is_active' => true
            ]
        );
    }
}
<?php

use Illuminate\Support\Facades\Route;
use Modules\DynamicPage\Http\Controllers\HomePageController;
use Modules\DynamicPage\Http\Controllers\AboutPageController;
use Modules\DynamicPage\Http\Controllers\ContactPageController;
use Modules\DynamicPage\Http\Controllers\ServicesPageController;
use Modules\DynamicPage\Http\Controllers\WebDevelopmentController;
use Modules\DynamicPage\Http\Controllers\SoftwareDevelopmentController;
use Modules\DynamicPage\Http\Controllers\WebAppDevelopmentController;
use Modules\DynamicPage\Http\Controllers\MobileAppDevelopmentController;
use Modules\DynamicPage\Http\Controllers\MvpDevelopmentController;
use Modules\DynamicPage\Http\Controllers\HrmsDevelopmentController;
use Modules\DynamicPage\Http\Controllers\CrmDevelopmentController;
use Modules\DynamicPage\Http\Controllers\VmsDevelopmentController;
use Modules\DynamicPage\Http\Controllers\HisDevelopmentController;
use Modules\DynamicPage\Http\Controllers\PosDevelopmentController;
use Modules\DynamicPage\Http\Controllers\VpsDevelopmentController;
use Modules\DynamicPage\Http\Controllers\VtsDevelopmentController;
use Modules\DynamicPage\Http\Controllers\OnDemandDevelopmentController;
use Modules\DynamicPage\Http\Controllers\CompanyPolicyController;
use Modules\DynamicPage\Http\Controllers\SolutionController;
use Modules\DynamicPage\Http\Controllers\SeoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin/homepage')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [HomePageController::class, 'index'])->name('homepage.index');
    
    // Section save routes
    Route::post('/save-hero', [HomePageController::class, 'saveHeroSection'])->name('homepage.save-hero');
    Route::post('/save-about', [HomePageController::class, 'saveAboutSection'])->name('homepage.save-about');
    Route::post('/save-services', [HomePageController::class, 'saveServicesSection'])->name('homepage.save-services');
    Route::post('/save-solutions', [HomePageController::class, 'saveSolutionsSection'])->name('homepage.save-solutions');
    Route::post('/save-portfolio', [HomePageController::class, 'savePortfolioSection'])->name('homepage.save-portfolio');
    Route::post('/save-testimonials', [HomePageController::class, 'saveTestimonialsSection'])->name('homepage.save-testimonials');
    Route::post('/save-cta', [HomePageController::class, 'saveCtaSection'])->name('homepage.save-cta');
    Route::post('/save-contact', [HomePageController::class, 'saveContactSection'])->name('homepage.save-contact');
    
    // Section management routes
    Route::post('/toggle-section', [HomePageController::class, 'toggleSection'])->name('homepage.toggle-section');
    Route::post('/update-order', [HomePageController::class, 'updateSectionOrder'])->name('homepage.update-order');
});

Route::prefix('admin/aboutpage')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [AboutPageController::class, 'index'])->name('aboutpage.index');
    
    // Section save routes
    Route::post('/save-hero', [AboutPageController::class, 'saveHeroSection'])->name('aboutpage.save-hero');
    Route::post('/save-who-we-are', [AboutPageController::class, 'saveWhoWeAreSection'])->name('aboutpage.save-who-we-are');
    Route::post('/save-what-we-do', [AboutPageController::class, 'saveWhatWeDoSection'])->name('aboutpage.save-what-we-do');
    Route::post('/save-mission-vision', [AboutPageController::class, 'saveMissionVisionSection'])->name('aboutpage.save-mission-vision');
    Route::post('/save-why-qubify', [AboutPageController::class, 'saveWhyQubifySection'])->name('aboutpage.save-why-qubify');
    Route::post('/save-co-creation', [AboutPageController::class, 'saveCoCreationSection'])->name('aboutpage.save-co-creation');
    Route::post('/save-footer-cta', [AboutPageController::class, 'saveFooterCtaSection'])->name('aboutpage.save-footer-cta');
    
    // Section management routes
    Route::post('/toggle-section', [AboutPageController::class, 'toggleSection'])->name('aboutpage.toggle-section');
});

Route::prefix('admin')->middleware(['auth', 'web'])->group(function () {
    Route::get('/terms-conditions', [CompanyPolicyController::class, 'index'])->name('companyPolicy.index');
    Route::get('/privacy-policy', [CompanyPolicyController::class, 'policy'])->name('companyPolicy.policy');
    Route::post('/terms-section', [CompanyPolicyController::class, 'termsSection'])->name('companyPolicy.terms-section');
    Route::post('/policy-section', [CompanyPolicyController::class, 'policySection'])->name('companyPolicy.policy-section');
    // Section save routes
    
    // Section management routes
    Route::post('/toggle-section', [AboutPageController::class, 'toggleSection'])->name('aboutpage.toggle-section');
});

Route::prefix('admin/contactpage')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [ContactPageController::class, 'index'])->name('contactpage.index');
    
    // Section save routes
    Route::post('/save-hero', [ContactPageController::class, 'saveHeroSection'])->name('contactpage.save-hero');
    Route::post('/save-features', [ContactPageController::class, 'saveFeaturesSection'])->name('contactpage.save-features');
    Route::post('/save-form', [ContactPageController::class, 'saveFormSection'])->name('contactpage.save-form');
    Route::post('/save-office', [ContactPageController::class, 'saveOfficeSection'])->name('contactpage.save-office');
    
    // Section management routes
    Route::post('/toggle-section', [ContactPageController::class, 'toggleSection'])->name('contactpage.toggle-section');
});

Route::prefix('admin/servicespage')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [ServicesPageController::class, 'index'])->name('servicespage.index');
    
    // Section save routes
    Route::post('/save-hero', [ServicesPageController::class, 'saveHeroSection'])->name('servicespage.save-hero');
    Route::post('/save-services-header', [ServicesPageController::class, 'saveServicesHeaderSection'])->name('servicespage.save-services-header');
    Route::post('/save-service/{sectionName}', [ServicesPageController::class, 'saveServiceCardSection'])->name('servicespage.save-service');
    Route::post('/save-why-qubify', [ServicesPageController::class, 'saveWhyQubifySection'])->name('servicespage.save-why-qubify');
    Route::post('/save-technologies', [ServicesPageController::class, 'saveTechnologiesSection'])->name('servicespage.save-technologies');
    Route::post('/save-cta', [ServicesPageController::class, 'saveCtaSection'])->name('servicespage.save-cta');
    
    // Section management routes
    Route::post('/toggle-section', [ServicesPageController::class, 'toggleSection'])->name('servicespage.toggle-section');
});

Route::prefix('admin/service/web-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [WebDevelopmentController::class, 'index'])->name('service.webDevelopment.index');
    
    // Section save routes
    Route::post('/save-hero', [WebDevelopmentController::class, 'saveHeroSection'])->name('service.webDevelopment.save-hero');
    Route::post('/save-intro', [WebDevelopmentController::class, 'saveIntroSection'])->name('service.webDevelopment.save-intro');
    Route::post('/save-core-services', [WebDevelopmentController::class, 'saveCoreServicesSection'])->name('service.webDevelopment.save-core-services');
    Route::post('/save-additional-services', [WebDevelopmentController::class, 'saveAdditionalServicesSection'])->name('service.webDevelopment.save-additional-services');
    Route::post('/save-why-choose-us', [WebDevelopmentController::class, 'saveWhyChooseUsSection'])->name('service.webDevelopment.save-why-choose-us');
    Route::post('/save-custom-process', [WebDevelopmentController::class, 'saveCustomProcessSection'])->name('service.webDevelopment.save-custom-process');
    Route::post('/save-cross-hair', [WebDevelopmentController::class, 'saveCrossHairSection'])->name('service.webDevelopment.save-cross-hair');
    Route::post('/save-what-is-custom', [WebDevelopmentController::class, 'saveWhatIsCustomSection'])->name('service.webDevelopment.save-what-is-custom');
    Route::post('/save-why-need-custom', [WebDevelopmentController::class, 'saveWhyNeedCustomSection'])->name('service.webDevelopment.save-why-need-custom');
    Route::post('/save-what-services', [WebDevelopmentController::class, 'saveWhatServicesSection'])->name('service.webDevelopment.save-what-services');
    Route::post('/save-faq', [WebDevelopmentController::class, 'saveFaqSection'])->name('service.webDevelopment.save-faq');
    
    // New sections routes
    Route::post('/save-ecommerce-development', [WebDevelopmentController::class, 'saveEcommerceDevelopmentSection'])->name('service.webDevelopment.save-ecommerce-development');
    Route::post('/save-development-methodologies', [WebDevelopmentController::class, 'saveDevelopmentMethodologiesSection'])->name('service.webDevelopment.save-development-methodologies');
    Route::post('/save-devops-deployment', [WebDevelopmentController::class, 'saveDevopsDeploymentSection'])->name('service.webDevelopment.save-devops-deployment');
    Route::post('/save-database-management', [WebDevelopmentController::class, 'saveDatabaseManagementSection'])->name('service.webDevelopment.save-database-management');
    Route::post('/save-security', [WebDevelopmentController::class, 'saveSecuritySection'])->name('service.webDevelopment.save-security');
    Route::post('/save-performance-optimization', [WebDevelopmentController::class, 'savePerformanceOptimizationSection'])->name('service.webDevelopment.save-performance-optimization');
    Route::post('/save-quality-control-testing', [WebDevelopmentController::class, 'saveQualityControlTestingSection'])->name('service.webDevelopment.save-quality-control-testing');
    Route::post('/save-designing-ui-ux', [WebDevelopmentController::class, 'saveDesigningUiUxSection'])->name('service.webDevelopment.save-designing-ui-ux');
    
    // Section management routes
    Route::post('/toggle-section', [WebDevelopmentController::class, 'toggleSection'])->name('service.webDevelopment.toggle-section');
});

Route::prefix('admin/service/software-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [SoftwareDevelopmentController::class, 'index'])->name('service.softwareDevelopment.index');
    
    // Section save routes
    Route::post('/save-hero', [SoftwareDevelopmentController::class, 'saveHeroSection'])->name('service.softwareDevelopment.save-hero');
    Route::post('/save-intro', [SoftwareDevelopmentController::class, 'saveIntroSection'])->name('service.softwareDevelopment.save-intro');
    Route::post('/save-core-services', [SoftwareDevelopmentController::class, 'saveCoreServicesSection'])->name('service.softwareDevelopment.save-core-services');
    Route::post('/save-specialized-services', [SoftwareDevelopmentController::class, 'saveSpecializedServicesSection'])->name('service.softwareDevelopment.save-specialized-services');
    Route::post('/save-technology-stack', [SoftwareDevelopmentController::class, 'saveTechnologyStackSection'])->name('service.softwareDevelopment.save-technology-stack');
    Route::post('/save-process', [SoftwareDevelopmentController::class, 'saveProcessSection'])->name('service.softwareDevelopment.save-process');
    Route::post('/save-why-choose-us', [SoftwareDevelopmentController::class, 'saveWhyChooseUsSection'])->name('service.softwareDevelopment.save-why-choose-us');
    Route::post('/save-industries', [SoftwareDevelopmentController::class, 'saveIndustriesSection'])->name('service.softwareDevelopment.save-industries');
    Route::post('/save-on-demand-developers', [SoftwareDevelopmentController::class, 'saveOnDemandDevelopersSection'])->name('service.softwareDevelopment.save-on-demand-developers');
    Route::post('/save-faq', [SoftwareDevelopmentController::class, 'saveFaqSection'])->name('service.softwareDevelopment.save-faq');
    Route::post('/save-services', [SoftwareDevelopmentController::class, 'saveServicesSection'])->name('service.softwareDevelopment.save-services');
    Route::post('/save-methodologies', [SoftwareDevelopmentController::class, 'saveMethodologiesSection'])->name('service.softwareDevelopment.save-methodologies');
    Route::post('/save-developmentStep', [SoftwareDevelopmentController::class, 'saveDevelopmentStepSection'])->name('service.softwareDevelopment.save-developmentStep');
    Route::post('/save-benefits', [SoftwareDevelopmentController::class, 'saveBenefitsSection'])->name('service.softwareDevelopment.save-benefits');
    Route::post('/save-understanding-process', [SoftwareDevelopmentController::class, 'saveUnderstandingProcessSection'])->name('service.softwareDevelopment.save-understanding-process');
    Route::post('/save-what-makes-different', [SoftwareDevelopmentController::class, 'saveWhatMakesDifferentSection'])->name('service.softwareDevelopment.save-what-makes-different');
    Route::post('/save-custom-benefits', [SoftwareDevelopmentController::class, 'saveCustomBenefitsSection'])->name('service.softwareDevelopment.save-custom-benefits');
    Route::post('/save-custom-development', [SoftwareDevelopmentController::class, 'saveCustomDevelopmentSection'])->name('service.softwareDevelopment.save-custom-development');
    
    // Section management routes
    Route::post('/toggle-section', [SoftwareDevelopmentController::class, 'toggleSection'])->name('service.softwareDevelopment.toggle-section');
});

Route::prefix('admin/service/web-app-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [WebAppDevelopmentController::class, 'index'])->name('service.webAppDevelopment.index');
    
    // Section save routes
    Route::post('/save-hero', [WebAppDevelopmentController::class, 'saveHeroSection'])->name('service.webAppDevelopment.save-hero');
    Route::post('/save-intro', [WebAppDevelopmentController::class, 'saveIntroSection'])->name('service.webAppDevelopment.save-intro');
    Route::post('/save-who-we-serve', [WebAppDevelopmentController::class, 'saveWhoWeServeSection'])->name('service.webAppDevelopment.save-who-we-serve');
    Route::post('/save-web-apps-deliver', [WebAppDevelopmentController::class, 'saveWebAppsDeliverSection'])->name('service.webAppDevelopment.save-web-apps-deliver');
    Route::post('/save-industries', [WebAppDevelopmentController::class, 'saveIndustriesSection'])->name('service.webAppDevelopment.save-industries');
    Route::post('/save-services', [WebAppDevelopmentController::class, 'saveServicesSection'])->name('service.webAppDevelopment.save-services');
    Route::post('/save-benefits', [WebAppDevelopmentController::class, 'saveBenefitsSection'])->name('service.webAppDevelopment.save-benefits');
    Route::post('/save-tech-stack', [WebAppDevelopmentController::class, 'saveTechStackSection'])->name('service.webAppDevelopment.save-tech-stack');
    Route::post('/save-faq', [WebAppDevelopmentController::class, 'saveFaqSection'])->name('service.webAppDevelopment.save-faq');
    
    // Section management routes
    Route::post('/toggle-section', [WebAppDevelopmentController::class, 'toggleSection'])->name('service.webAppDevelopment.toggle-section');
});

Route::prefix('admin/service/mobile-app-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [MobileAppDevelopmentController::class, 'index'])->name('service.mobileAppDevelopment.index');
    
    // Section save routes
    Route::post('/save-hero', [MobileAppDevelopmentController::class, 'saveHeroSection'])->name('service.mobileAppDevelopment.save-hero');
    Route::post('/save-intro', [MobileAppDevelopmentController::class, 'saveIntroSection'])->name('service.mobileAppDevelopment.save-intro');
    Route::post('/save-future-ready', [MobileAppDevelopmentController::class, 'saveFutureReadySection'])->name('service.mobileAppDevelopment.save-future-ready');
    Route::post('/save-services', [MobileAppDevelopmentController::class, 'saveServicesSection'])->name('service.mobileAppDevelopment.save-services');
    Route::post('/save-additional-services', [MobileAppDevelopmentController::class, 'saveAdditionalServicesSection'])->name('service.mobileAppDevelopment.save-additional-services');
    Route::post('/save-tech-stack', [MobileAppDevelopmentController::class, 'saveTechStackSection'])->name('service.mobileAppDevelopment.save-tech-stack');
    Route::post('/save-industry-solutions', [MobileAppDevelopmentController::class, 'saveIndustrySolutionsSection'])->name('service.mobileAppDevelopment.save-industry-solutions');
    Route::post('/save-why-choose-us', [MobileAppDevelopmentController::class, 'saveWhyChooseUsSection'])->name('service.mobileAppDevelopment.save-why-choose-us');
    Route::post('/save-how-we-work', [MobileAppDevelopmentController::class, 'saveHowWeWorkSection'])->name('service.mobileAppDevelopment.save-how-we-work');
    Route::post('/save-faq', [MobileAppDevelopmentController::class, 'saveFaqSection'])->name('service.mobileAppDevelopment.save-faq');
    
    // Section management routes
    Route::post('/toggle-section', [MobileAppDevelopmentController::class, 'toggleSection'])->name('service.mobileAppDevelopment.toggle-section');
});

Route::prefix('admin/service/mvp-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [MvpDevelopmentController::class, 'index'])->name('admin.mvp-development.index');
    
    // Section save routes
    Route::post('/save-hero', [MvpDevelopmentController::class, 'saveHeroSection'])->name('admin.mvp-development.save-hero');
    Route::post('/save-intro', [MvpDevelopmentController::class, 'saveIntroSection'])->name('admin.mvp-development.save-intro');
    Route::post('/save-what-we-offer', [MvpDevelopmentController::class, 'saveWhatWeOfferSection'])->name('admin.mvp-development.save-what-we-offer');
    Route::post('/save-additional-services', [MvpDevelopmentController::class, 'saveAdditionalServicesSection'])->name('admin.mvp-development.save-additional-services');
    Route::post('/save-expertise', [MvpDevelopmentController::class, 'saveExpertiseSection'])->name('admin.mvp-development.save-expertise');
    Route::post('/save-tech-stack', [MvpDevelopmentController::class, 'saveTechStackSection'])->name('admin.mvp-development.save-tech-stack');
    Route::post('/save-mvp-process', [MvpDevelopmentController::class, 'saveMvpProcessSection'])->name('admin.mvp-development.save-mvp-process');
    Route::post('/save-key-benefits', [MvpDevelopmentController::class, 'saveKeyBenefitsSection'])->name('admin.mvp-development.save-key-benefits');
    Route::post('/save-mvp-methodologies', [MvpDevelopmentController::class, 'saveMvpMethodologiesSection'])->name('admin.mvp-development.save-mvp-methodologies');
    Route::post('/save-development-timeline', [MvpDevelopmentController::class, 'saveDevelopmentTimelineSection'])->name('admin.mvp-development.save-development-timeline');
    Route::post('/save-mvp-process-actually', [MvpDevelopmentController::class, 'saveMvpProcessActuallySection'])->name('admin.mvp-development.save-mvp-process-actually');
    Route::post('/save-why-qubify', [MvpDevelopmentController::class, 'saveWhyQubifySection'])->name('admin.mvp-development.save-why-qubify');
    Route::post('/save-industries', [MvpDevelopmentController::class, 'saveIndustriesSection'])->name('admin.mvp-development.save-industries');
    Route::post('/save-hire-developers', [MvpDevelopmentController::class, 'saveHireDevelopersSection'])->name('admin.mvp-development.save-hire-developers');
    Route::post('/save-faq', [MvpDevelopmentController::class, 'saveFaqSection'])->name('admin.mvp-development.save-faq');
    
    // Section management routes
    Route::post('/toggle-section', [MvpDevelopmentController::class, 'toggleSection'])->name('admin.mvp-development.toggle-section');
});

Route::prefix('admin/solutions')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [SolutionController::class, 'index'])->name('admin.solution-development.index');

    Route::post('/save-hero', [SolutionController::class, 'saveHeroSection'])->name('admin.solutions.save-hero');
    Route::post('/save-solutions-header', [SolutionController::class, 'saveSolutionsHeaderSection'])->name('admin.solutions.save-solutions-header');
    Route::post('/save-solutions-items', [SolutionController::class, 'saveSolutionsItemsSection'])->name('admin.solutions.save-solutions-items');
    Route::post('/save-why-qubify', [SolutionController::class, 'saveWhyQubifySection'])->name('admin.solutions.save-why-qubify');
    Route::post('/save-industries', [SolutionController::class, 'saveIndustriesSection'])->name('admin.solutions.save-industries');
    Route::post('/save-cta', [SolutionController::class, 'saveCtaSection'])->name('admin.solutions.save-cta');
    Route::post('/toggle-section', [SolutionController::class, 'toggleSection'])->name('admin.solutions.toggle-section');
    
});

Route::prefix('admin/solutions/hrms-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [HrmsDevelopmentController::class, 'index'])->name('admin.hrms-development.index');
    
    // Section save routes
    Route::post('/save-hero', [HrmsDevelopmentController::class, 'saveHeroSection'])->name('admin.hrms-development.save-hero');
    Route::post('/save-intro', [HrmsDevelopmentController::class, 'saveIntroSection'])->name('admin.hrms-development.save-intro');
    Route::post('/save-core-features', [HrmsDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.hrms-development.save-core-features');
    Route::post('/save-benefits', [HrmsDevelopmentController::class, 'saveBenefitsSection'])->name('admin.hrms-development.save-benefits');
    Route::post('/save-use-cases', [HrmsDevelopmentController::class, 'saveUseCasesSection'])->name('admin.hrms-development.save-use-cases');
    Route::post('/save-testimonials', [HrmsDevelopmentController::class, 'saveTestimonialsSection'])->name('admin.hrms-development.save-testimonials');
    Route::post('/save-final-cta', [HrmsDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.hrms-development.save-final-cta');
    
    // Section management routes
    Route::post('/toggle-section', [HrmsDevelopmentController::class, 'toggleSection'])->name('admin.hrms-development.toggle-section');
});

Route::prefix('admin/solutions/crm-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [CrmDevelopmentController::class, 'index'])->name('admin.crm-development.index');
    
    // Section save routes
    Route::post('/save-hero', [CrmDevelopmentController::class, 'saveHeroSection'])->name('admin.crm-development.save-hero');
    Route::post('/save-intro', [CrmDevelopmentController::class, 'saveIntroSection'])->name('admin.crm-development.save-intro');
    Route::post('/save-core-features', [CrmDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.crm-development.save-core-features');
    Route::post('/save-why-trust', [CrmDevelopmentController::class, 'saveWhyTrustSection'])->name('admin.crm-development.save-why-trust');
    Route::post('/save-use-cases', [CrmDevelopmentController::class, 'saveUseCasesSection'])->name('admin.crm-development.save-use-cases');
    Route::post('/save-testimonials', [CrmDevelopmentController::class, 'saveTestimonialsSection'])->name('admin.crm-development.save-testimonials');
    Route::post('/save-final-cta', [CrmDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.crm-development.save-final-cta');
    
    // Section management routes
    Route::post('/toggle-section', [CrmDevelopmentController::class, 'toggleSection'])->name('admin.crm-development.toggle-section');
});

Route::prefix('admin/solutions/vms-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [VmsDevelopmentController::class, 'index'])->name('admin.vms-development.index');
    
    // Section save routes
    Route::post('/save-hero', [VmsDevelopmentController::class, 'saveHeroSection'])->name('admin.vms-development.save-hero');
    Route::post('/save-intro', [VmsDevelopmentController::class, 'saveIntroSection'])->name('admin.vms-development.save-intro');
    Route::post('/save-key-benefits', [VmsDevelopmentController::class, 'saveKeyBenefitsSection'])->name('admin.vms-development.save-key-benefits');
    Route::post('/save-core-features', [VmsDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.vms-development.save-core-features');
    Route::post('/save-real-security', [VmsDevelopmentController::class, 'saveRealSecuritySection'])->name('admin.vms-development.save-real-security');
    Route::post('/save-why-trust', [VmsDevelopmentController::class, 'saveWhyTrustSection'])->name('admin.vms-development.save-why-trust');
    Route::post('/save-testimonials', [VmsDevelopmentController::class, 'saveTestimonialsSection'])->name('admin.vms-development.save-testimonials');
    Route::post('/save-final-cta', [VmsDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.vms-development.save-final-cta');
    
    // Section management routes
    Route::post('/toggle-section', [VmsDevelopmentController::class, 'toggleSection'])->name('admin.vms-development.toggle-section');
});

Route::prefix('admin/solutions/his-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [HisDevelopmentController::class, 'index'])->name('admin.his-development.index');
    
    // Section save routes
    Route::post('/save-hero', [HisDevelopmentController::class, 'saveHeroSection'])->name('admin.his-development.save-hero');
    Route::post('/save-intro', [HisDevelopmentController::class, 'saveIntroSection'])->name('admin.his-development.save-intro');
    Route::post('/save-why-choose', [HisDevelopmentController::class, 'saveWhyChooseSection'])->name('admin.his-development.save-why-choose');
    Route::post('/save-core-features', [HisDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.his-development.save-core-features');
    Route::post('/save-why-trust', [HisDevelopmentController::class, 'saveWhyTrustSection'])->name('admin.his-development.save-why-trust');
    Route::post('/save-use-cases', [HisDevelopmentController::class, 'saveUseCasesSection'])->name('admin.his-development.save-use-cases');
    Route::post('/save-testimonials', [HisDevelopmentController::class, 'saveTestimonialsSection'])->name('admin.his-development.save-testimonials');
    Route::post('/save-final-cta', [HisDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.his-development.save-final-cta');
    
    // Section management routes
    Route::post('/toggle-section', [HisDevelopmentController::class, 'toggleSection'])->name('admin.his-development.toggle-section');
});

Route::prefix('admin/solutions/pos-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [PosDevelopmentController::class, 'index'])->name('admin.pos-development.index');
    
    // Section save routes
    Route::post('/save-hero', [PosDevelopmentController::class, 'saveHeroSection'])->name('admin.pos-development.save-hero');
    Route::post('/save-intro', [PosDevelopmentController::class, 'saveIntroSection'])->name('admin.pos-development.save-intro');
    Route::post('/save-core-features', [PosDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.pos-development.save-core-features');
    Route::post('/save-advanced-tools', [PosDevelopmentController::class, 'saveAdvancedToolsSection'])->name('admin.pos-development.save-advanced-tools');
    Route::post('/save-admin-control', [PosDevelopmentController::class, 'saveAdminControlSection'])->name('admin.pos-development.save-admin-control');
    Route::post('/save-why-choose', [PosDevelopmentController::class, 'saveWhyChooseSection'])->name('admin.pos-development.save-why-choose');
    Route::post('/save-industries', [PosDevelopmentController::class, 'saveIndustriesSection'])->name('admin.pos-development.save-industries');
    Route::post('/save-final-cta', [PosDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.pos-development.save-final-cta');
    
    // Section management routes
    Route::post('/toggle-section', [PosDevelopmentController::class, 'toggleSection'])->name('admin.pos-development.toggle-section');
});

Route::prefix('admin/solutions/vps-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [VpsDevelopmentController::class, 'index'])->name('admin.vps-development.index');
    
    // Section save routes
    Route::post('/save-hero', [VpsDevelopmentController::class, 'saveHeroSection'])->name('admin.vps-development.save-hero');
    Route::post('/save-intro', [VpsDevelopmentController::class, 'saveIntroSection'])->name('admin.vps-development.save-intro');
    Route::post('/save-core-features', [VpsDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.vps-development.save-core-features');
    Route::post('/save-hardware-integration', [VpsDevelopmentController::class, 'saveHardwareIntegrationSection'])->name('admin.vps-development.save-hardware-integration');
    Route::post('/save-industries', [VpsDevelopmentController::class, 'saveIndustriesSection'])->name('admin.vps-development.save-industries');
    Route::post('/save-scalability', [VpsDevelopmentController::class, 'saveScalabilitySection'])->name('admin.vps-development.save-scalability');
    Route::post('/save-testimonials', [VpsDevelopmentController::class, 'saveTestimonialsSection'])->name('admin.vps-development.save-testimonials');
    Route::post('/save-final-cta', [VpsDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.vps-development.save-final-cta');
    
    
    // Section management routes
    Route::post('/toggle-section', [VpsDevelopmentController::class, 'toggleSection'])->name('admin.vps-development.toggle-section');
});

Route::prefix('admin/solutions/vts-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [VtsDevelopmentController::class, 'index'])->name('admin.vts-development.index');
    
    // Section save routes
    Route::post('/save-hero', [VtsDevelopmentController::class, 'saveHeroSection'])->name('admin.vts-development.save-hero');
    Route::post('/save-intro', [VtsDevelopmentController::class, 'saveIntroSection'])->name('admin.vts-development.save-intro');
    Route::post('/save-core-features', [VtsDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.vts-development.save-core-features');
    Route::post('/save-additional-features', [VtsDevelopmentController::class, 'saveAdditionalFeaturesSection'])->name('admin.vts-development.save-additional-features');
    Route::post('/save-hardware-integration', [VtsDevelopmentController::class, 'saveHardwareIntegrationSection'])->name('admin.vts-development.save-hardware-integration');
    Route::post('/save-use-cases', [VtsDevelopmentController::class, 'saveUseCasesSection'])->name('admin.vts-development.save-use-cases');
    Route::post('/save-benefits', [VtsDevelopmentController::class, 'saveBenefitsSection'])->name('admin.vts-development.save-benefits');
    Route::post('/save-testimonials', [VtsDevelopmentController::class, 'saveTestimonialsSection'])->name('admin.vts-development.save-testimonials');
    Route::post('/save-final-cta', [VtsDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.vts-development.save-final-cta');
    
    // Section management routes
    Route::post('/toggle-section', [VtsDevelopmentController::class, 'toggleSection'])->name('admin.vts-development.toggle-section');
});

Route::prefix('admin/solutions/on-demand-development')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [OnDemandDevelopmentController::class, 'index'])->name('admin.on-demand-development.index');
    
    // Section save routes
    Route::post('/save-hero', [OnDemandDevelopmentController::class, 'saveHeroSection'])->name('admin.on-demand-development.save-hero');
    Route::post('/save-intro', [OnDemandDevelopmentController::class, 'saveIntroSection'])->name('admin.on-demand-development.save-intro');
    Route::post('/save-core-features', [OnDemandDevelopmentController::class, 'saveCoreFeaturesSection'])->name('admin.on-demand-development.save-core-features');
    Route::post('/save-additional-features', [OnDemandDevelopmentController::class, 'saveAdditionalFeaturesSection'])->name('admin.on-demand-development.save-additional-features');
    Route::post('/save-use-cases', [OnDemandDevelopmentController::class, 'saveUseCasesSection'])->name('admin.on-demand-development.save-use-cases');
    Route::post('/save-highlights', [OnDemandDevelopmentController::class, 'saveHighlightsSection'])->name('admin.on-demand-development.save-highlights');
    Route::post('/save-testimonials', [OnDemandDevelopmentController::class, 'saveTestimonialsSection'])->name('admin.on-demand-development.save-testimonials');
    Route::post('/save-final-cta', [OnDemandDevelopmentController::class, 'saveFinalCtaSection'])->name('admin.on-demand-development.save-final-cta');
    
    // Section management routes
    Route::post('/toggle-section', [OnDemandDevelopmentController::class, 'toggleSection'])->name('admin.on-demand-development.toggle-section');
});

Route::prefix('admin/seo')->middleware(['auth', 'web'])->group(function () {
    Route::get('/', [SeoController::class, 'index'])->name('admin.seo.index');
    // In your routes/web.php or routes/admin.php
     Route::get('/seo/get-page-data', [SeoController::class, 'getPageData'])->name('admin.seo.get-page-data');
      Route::post('/seo/save-page-data', [SeoController::class, 'savePageData'])->name('admin.seo.save-page-data');
});
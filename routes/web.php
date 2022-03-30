<?php

use Illuminate\Support\Facades\Route;

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

//Frontend controller
// user route
Route::get('/user/login', [
    'uses'  => 'FrontendController@userLogin',
    'as'    => 'userLogin'
]);

Route::post('/user/loginConfirm', [
    'uses'  => 'FrontendController@userLoginConfirm',
    'as'    => 'userLoginConfirm'
]);
Route::get('/user/signup', [
    'uses'  => 'FrontendController@userSignUp',
    'as'    => 'userSignUp'
]);

Route::post('/user/signupConfirm', [
    'uses'  => 'FrontendController@userSignupConfirm',
    'as'    => 'userSignupConfirm'
]);
Route::get('/user/verify/{mail}/{randCode}', [
    'uses'  => 'FrontendController@verifyMail',
    'as'    => 'verifyMail'
]);
Route::get('/user/resend/verify/{mail}', [
    'uses'  => 'FrontendController@resendVerify',
    'as'    => 'resendVerify'
]);
Route::get('/user/forgotPass', [
    'uses'  => 'FrontendController@userForgotPass',
    'as'    => 'userForgotPass'
]);

Route::post('/user/verify/sendVerify', [
    'uses'  => 'FrontendController@userSendVerify',
    'as'    => 'userSendVerify'
]);

//CRM admin route

//admin route
Route::get('/admin/login', [
    'uses'  => 'FrontendController@adminLogin',
    'as'    => 'adminLogin'
]);

Route::post('/admin/loginConfirm', [
    'uses'  => 'FrontendController@loginConfirm',
    'as'    => 'loginConfirm'
]);

Route::post('/admin/signupConfirm', [
    'uses'  => 'FrontendController@signupConfirm',
    'as'    => 'signupConfirm'
]);

Route::get('/', [
    'uses'  => 'FrontendController@homepage',
    'as'    => 'homepage'
]);

Route::get('/pricing', [
    'uses'  => 'FrontendController@pricing',
    'as'    => 'pricing'
]);

Route::get('/feature', [
    'uses'  => 'FrontendController@feature',
    'as'    => 'feature'
]);

Route::get('/welcome', function () {
    return view('welcome');
});

//Super Admin Panel
Route::get('/crmAdmin/index', [
    'uses'  => 'CrmAdminController@home',
    'as'    => 'crmAdmin'
]);
 
Route::post('/crmAdmin/logout',[
    'uses'  => 'FrontendController@crmLogout',
    'as'    => 'crmLogout'
 ]);

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\SuperAdminController::class, 'lang']);

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\SuperAdminController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\SuperAdminController::class, 'updatePassword'])->name('updatePassword');

Route::get('/superAdmin/index', [
    'uses'  => 'SuperAdminController@root',
    'as'    => 'superAdmin'
]);

Route::get('/superAdmin/currencyList', [
    'uses'  => 'SuperAdminViewController@currencyList',
    'as'    => 'currencyList'
]);

Route::get('/superAdmin/newCurrency', [
    'uses'  => 'SuperAdminViewController@newCurrency',
    'as'    => 'newCurrency'
]);
Route::post('/superAdmin/saveCurrency', [
    'uses'  => 'SuperAdminController@saveCurrency',
    'as'    => 'saveCurrency'
]);

Route::get('/superAdmin/editCurrency/{id}', [
    'uses'  => 'SuperAdminViewController@editCurrency',
    'as'    => 'editCurrency'
]);

Route::post('/superAdmin/updateCurrency', [
    'uses'  => 'SuperAdminController@updateCurrency',
    'as'    => 'updateCurrency'
]);

Route::get('/superAdmin/delCurrency/{id}', [
    'uses'  => 'SuperAdminViewController@delCurrency',
    'as'    => 'delCurrency'
]);
//End currency

Route::get('/superAdmin/companyList', [
    'uses'  => 'SuperAdminViewController@companyList',
    'as'    => 'companyList'
]);

Route::get('/superAdmin/newCompany', [
    'uses'  => 'SuperAdminViewController@newCompany',
    'as'    => 'newCompany'
]);

Route::post('/superAdmin/saveCompany', [
    'uses'  => 'SuperAdminController@saveCompany',
    'as'    => 'saveCompany'
]);

Route::get('/superAdmin/editCompany/{id}', [
    'uses'  => 'SuperAdminViewController@editCompany',
    'as'    => 'editCompany'
]);

Route::post('/superAdmin/updateCompany', [
    'uses'  => 'SuperAdminController@updateCompany',
    'as'    => 'updateCompany'
]);

Route::post('/superAdmin/updateCompLogo', [
    'uses'  => 'SuperAdminController@updateCompLogo',
    'as'    => 'updateCompLogo'
]);

Route::post('/superAdmin/updateCompPass', [
    'uses'  => 'SuperAdminController@updateCompPass',
    'as'    => 'updateCompPass'
]);

Route::get('/superAdmin/delCompany/{id}', [
    'uses'  => 'SuperAdminViewController@delCompany',
    'as'    => 'delCompany'
]);
//End company

Route::get('/superAdmin/productList', [
    'uses'  => 'SuperAdminViewController@productList',
    'as'    => 'productList'
]);

Route::get('/superAdmin/newProduct', [
    'uses'  => 'SuperAdminViewController@newProduct',
    'as'    => 'newProduct'
]);

Route::post('/superAdmin/saveProduct', [
    'uses'  => 'SuperAdminController@saveProduct',
    'as'    => 'saveProduct'
]);

Route::get('/superAdmin/editProduct/{id}', [
    'uses'  => 'SuperAdminViewController@editProduct',
    'as'    => 'editProduct'
]);

Route::post('/superAdmin/updateProduct', [
    'uses'  => 'SuperAdminController@updateProduct',
    'as'    => 'updateProduct'
]);

Route::post('/superAdmin/updateProLogo', [
    'uses'  => 'SuperAdminController@updateProLogo',
    'as'    => 'updateProLogo'
]);

Route::get('/superAdmin/delProduct/{id}', [
    'uses'  => 'SuperAdminViewController@delProduct',
    'as'    => 'delProduct'
]);
//End company

Route::get('/superAdmin/manageLanguage', [
    'uses'  => 'SuperAdminViewController@languageList',
    'as'    => 'languageList'
]);

Route::get('/superAdmin/newLanguage', [
    'uses'  => 'SuperAdminViewController@newLanguage',
    'as'    => 'newLanguage'
]);
Route::post('/superAdmin/saveLanguage', [
    'uses'  => 'SuperAdminController@saveLanguage',
    'as'    => 'saveLanguage'
]);

Route::get('/superAdmin/editLanguage/{id}', [
    'uses'  => 'SuperAdminViewController@editLanguage',
    'as'    => 'editLanguage'
]);

Route::post('/superAdmin/updateLanguage', [
    'uses'  => 'SuperAdminController@updateLanguage',
    'as'    => 'updateLanguage'
]);

Route::get('/superAdmin/delLanguage/{id}', [
    'uses'  => 'SuperAdminViewController@delLanguage',
    'as'    => 'delLanguage'
]);
//End language route

//Online Credential
Route::get('/superAdmin/paymentCredentials/onlineCredential', [
    'uses'  => 'SuperAdminViewController@onlineCredential',
    'as'    => 'onlineCredential'
]);

Route::post('/superAdmin/saveOnlineCredential', [
    'uses'  => 'SuperAdminController@saveOnlineCredential',
    'as'    => 'saveOnlineCredential'
]);

//Offline Credential
Route::get('/superAdmin/paymentCredentials/offlineCredential', [
    'uses'  => 'SuperAdminViewController@offlineCredential',
    'as'    => 'offlineCredential'
]);

Route::post('/superAdmin/saveOfflineCredential', [
    'uses'  => 'SuperAdminController@saveOfflineCredential',
    'as'    => 'saveOfflineCredential'
]);
//End payment credentials route


//Pages routes
Route::get('/superAdmin/pages/defaultPage', [
    'uses'  => 'SuperAdminViewController@defaultPage',
    'as'    => 'defaultPage'
]);

Route::post('/superAdmin/pages/savePage', [
    'uses'  => 'SuperAdminController@savePage',
    'as'    => 'savePage'
]);

Route::get('/superAdmin/pages/editPage/{id}', [
    'uses'  => 'SuperAdminViewController@editPage',
    'as'    => 'editPage'
]);

Route::post('/superAdmin/pages/updatePage', [
    'uses'  => 'SuperAdminController@updatePage',
    'as'    => 'updatePage'
]);

Route::get('/superAdmin/pages/delPage/{id}', [
    'uses'  => 'SuperAdminViewController@delPage',
    'as'    => 'delPage'
]);

Route::get('/superAdmin/pages/layouts', [
    'uses'  => 'SuperAdminViewController@layouts',
    'as'    => 'layouts'
]);

Route::post('/superAdmin/pages/saveLayout', [
    'uses'  => 'SuperAdminController@saveLayout',
    'as'    => 'saveLayout'
]);

// default pricing page 
Route::get('/superAdmin/pricingPage/list', [
    'uses'  => 'PricingPageController@pricingSection',
    'as'    => 'pricingSection'
]);

Route::post('/superAdmin/pricingPage/sectionEight/save', [
    'uses'  => 'PricingPageController@savePricingService',
    'as'    => 'savePricingService'
]);

Route::get('/superAdmin/pricingPage/edit/serviceBox/{id}', [
    'uses'  => 'PricingPageController@editPricingBox',
    'as'    => 'editPricingBox'
]);
Route::get('/superAdmin/pricingPage/delete/serviceBox/{id}', [
    'uses'  => 'PricingPageController@delPricingBox',
    'as'    => 'delPricingBox'
]);

Route::post('/superAdmin/pricingPage/serviceBox/save', [
    'uses'  => 'PricingPageController@savePricingBox',
    'as'    => 'savePricingBox'
]);

Route::post('/superAdmin/pricingPage/serviceBox/update', [
    'uses'  => 'PricingPageController@updatePricingBox',
    'as'    => 'updatePricingBox'
]);

Route::post('/superAdmin/pricingPage/startNow/save', [
    'uses'  => 'PricingPageController@savePricingStartNow',
    'as'    => 'savePricingStartNow'
]);

Route::post('/superAdmin/pricingPage/FAQSection/save', [
    'uses'  => 'PricingPageController@savePricingFaqSection',
    'as'    => 'savePricingFaqSection'
]);

Route::post('/superAdmin/pricingPage/createAccount/save', [
    'uses'  => 'PricingPageController@savePricingCreatedNow',
    'as'    => 'savePricingCreatedNow'
]);
// default feature page routes
Route::get('/superAdmin/featurePage/list', [
    'uses'  => 'FeaturePageController@featureSection',
    'as'    => 'featureSection'
]);

Route::post('/superAdmin/featurePage/pageDetails/save', [
    'uses'  => 'FeaturePageController@saveFeaturePageSection',
    'as'    => 'saveFeaturePageSection'
]);

Route::post('/superAdmin/featurePage/service/save', [
    'uses'  => 'FeaturePageController@saveFeatureService',
    'as'    => 'saveFeatureService'
]);

Route::get('/superAdmin/featurePage/edit/serviceBox/{id}', [
    'uses'  => 'FeaturePageController@editFeatureBox',
    'as'    => 'editFeatureBox'
]);
Route::get('/superAdmin/featurePage/delete/serviceBox/{id}', [
    'uses'  => 'FeaturePageController@delFeatureBox',
    'as'    => 'delFeatureBox'
]);

Route::post('/superAdmin/featurePage/serviceBox/save', [
    'uses'  => 'FeaturePageController@saveFeatureBox',
    'as'    => 'saveFeatureBox'
]);

Route::post('/superAdmin/featurePage/serviceBox/update', [
    'uses'  => 'FeaturePageController@updateFeatureBox',
    'as'    => 'updateFeatureBox'
]);
Route::post('/superAdmin/featurePage/sectionThree/save', [
    'uses'  => 'FeaturePageController@saveFeatureSection3',
    'as'    => 'saveFeatureSection3'
]);

Route::get('/superAdmin/featurePage/edit/thirdBox/{id}', [
    'uses'  => 'FeaturePageController@editFeatureThirdBox',
    'as'    => 'editFeatureThirdBox'
]);
Route::get('/superAdmin/featurePage/delete/thirdBox/{id}', [
    'uses'  => 'FeaturePageController@delFeatureThirdBox',
    'as'    => 'delFeatureThirdBox'
]);

Route::post('/superAdmin/featurePage/thirdBox/save', [
    'uses'  => 'FeaturePageController@saveFeatureThirdBox',
    'as'    => 'saveFeatureThirdBox'
]);

Route::post('/superAdmin/featurePage/thirdBox/update', [
    'uses'  => 'FeaturePageController@updateFeatureThirdBox',
    'as'    => 'updateFeatureThirdBox'
]);

Route::post('/superAdmin/featurePage/sectionFour/save', [
    'uses'  => 'FeaturePageController@saveFeatureSection4',
    'as'    => 'saveFeatureSection4'
]);

Route::post('/superAdmin/featurePage/sectionFive/save', [
    'uses'  => 'FeaturePageController@saveFeatureSection5',
    'as'    => 'saveFeatureSection5'
]);
Route::get('/superAdmin/featurePage/edit/videoBox/{id}', [
    'uses'  => 'FeaturePageController@editFeatureVideoBox',
    'as'    => 'editFeatureVideoBox'
]);
Route::get('/superAdmin/featurePage/delete/videoBox/{id}', [
    'uses'  => 'FeaturePageController@delFeatureVideoBox',
    'as'    => 'delFeatureVideoBox'
]);

Route::post('/superAdmin/featurePage/videoBox/save', [
    'uses'  => 'FeaturePageController@saveFeatureVideoBox',
    'as'    => 'saveFeatureVideoBox'
]);

Route::post('/superAdmin/featurePage/videoBox/update', [
    'uses'  => 'FeaturePageController@updateFeatureVideoBox',
    'as'    => 'updateFeatureVideoBox'
]);

Route::post('/superAdmin/featurePage/startNow/save', [
    'uses'  => 'FeaturePageController@saveFeatureStartNow',
    'as'    => 'saveFeatureStartNow'
]);

Route::post('/superAdmin/featurePage/FAQSection/save', [
    'uses'  => 'FeaturePageController@saveFeatureFaqSection',
    'as'    => 'saveFeatureFaqSection'
]);

Route::post('/superAdmin/featurePage/createAccount/save', [
    'uses'  => 'FeaturePageController@saveFeatureCreatedNow',
    'as'    => 'saveFeatureCreatedNow'
]);

//default homePages routes
Route::get('/superAdmin/homePage/list', [
    'uses'  => 'HomePageController@homeSection',
    'as'    => 'homeSection'
]);

Route::post('/superAdmin/homePage/sectionOne/save', [
    'uses'  => 'HomePageController@saveHomeSection1',
    'as'    => 'saveHomeSection1'
]);

Route::post('/superAdmin/homePage/sectionTwo/save', [
    'uses'  => 'HomePageController@saveHomeSection2',
    'as'    => 'saveHomeSection2'
]);

Route::post('/superAdmin/homePage/sectionThree/save', [
    'uses'  => 'HomePageController@saveHomeSection3',
    'as'    => 'saveHomeSection3'
]);

Route::post('/superAdmin/homePage/sectionFour/save', [
    'uses'  => 'HomePageController@saveHomeSection4',
    'as'    => 'saveHomeSection4'
]);
Route::get('/superAdmin/homePage/edit/section4Box/{id}', [
    'uses'  => 'HomePageController@editSB4',
    'as'    => 'editSB4'
]);
Route::get('/superAdmin/homePage/delete/section4Box/{id}', [
    'uses'  => 'HomePageController@delSB4',
    'as'    => 'delSB4'
]);

Route::post('/superAdmin/homePage/section4Box/save', [
    'uses'  => 'HomePageController@saveSection4Box',
    'as'    => 'saveSection4Box'
]);

Route::post('/superAdmin/homePage/section4Box/update', [
    'uses'  => 'HomePageController@updateSection4Box',
    'as'    => 'updateSection4Box'
]);

Route::post('/superAdmin/homePage/sectionFive/save', [
    'uses'  => 'HomePageController@saveHomeSection5',
    'as'    => 'saveHomeSection5'
]);

Route::post('/superAdmin/homePage/sectionSix/save', [
    'uses'  => 'HomePageController@saveHomeSection6',
    'as'    => 'saveHomeSection6'
]);

Route::get('/superAdmin/homePage/edit/sixthBox/{id}', [
    'uses'  => 'HomePageController@editSixthBox',
    'as'    => 'editSixthBox'
]);
Route::get('/superAdmin/homePage/delete/sixthBox/{id}', [
    'uses'  => 'HomePageController@delSixthBox',
    'as'    => 'delSixthBox'
]);

Route::post('/superAdmin/homePage/sixthBox/save', [
    'uses'  => 'HomePageController@saveSixthBox',
    'as'    => 'saveSixthBox'
]);

Route::post('/superAdmin/homePage/sixthBox/update', [
    'uses'  => 'HomePageController@updateSixthBox',
    'as'    => 'updateSixthBox'
]);

Route::post('/superAdmin/homePage/sectionSeven/save', [
    'uses'  => 'HomePageController@saveHomeSection7',
    'as'    => 'saveHomeSection7'
]);

Route::post('/superAdmin/homePage/sectionEight/save', [
    'uses'  => 'HomePageController@saveHomeSection8',
    'as'    => 'saveHomeSection8'
]);

Route::get('/superAdmin/homePage/edit/serviceBox/{id}', [
    'uses'  => 'HomePageController@editServiceBox',
    'as'    => 'editServiceBox'
]);
Route::get('/superAdmin/homePage/delete/serviceBox/{id}', [
    'uses'  => 'HomePageController@delServiceBox',
    'as'    => 'delServiceBox'
]);

Route::post('/superAdmin/homePage/serviceBox/save', [
    'uses'  => 'HomePageController@saveServiceBox',
    'as'    => 'saveServiceBox'
]);

Route::post('/superAdmin/homePage/serviceBox/update', [
    'uses'  => 'HomePageController@updateServiceBox',
    'as'    => 'updateServiceBox'
]);

Route::post('/superAdmin/homePage/sectionNine/save', [
    'uses'  => 'HomePageController@saveHomeSection9',
    'as'    => 'saveHomeSection9'
]);

Route::get('/superAdmin/homePage/edit/clientBox/{id}', [
    'uses'  => 'HomePageController@editClientBox',
    'as'    => 'editClientBox'
]);
Route::get('/superAdmin/homePage/delete/clientBox/{id}', [
    'uses'  => 'HomePageController@delClientBox',
    'as'    => 'delClientBox'
]);

Route::post('/superAdmin/homePage/clientBox/save', [
    'uses'  => 'HomePageController@saveClientBox',
    'as'    => 'saveClientBox'
]);

Route::post('/superAdmin/homePage/clientBox/update', [
    'uses'  => 'HomePageController@updateClientBox',
    'as'    => 'updateClientBox'
]);

Route::post('/superAdmin/homePage/oportunity/save', [
    'uses'  => 'HomePageController@saveOportunity',
    'as'    => 'saveOportunity'
]);

Route::get('/superAdmin/homePage/edit/oportunity/{id}', [
    'uses'  => 'HomePageController@editOportunity',
    'as'    => 'editOportunity'
]);
Route::get('/superAdmin/homePage/delete/oportunity/{id}', [
    'uses'  => 'HomePageController@delOportunity',
    'as'    => 'delOportunity'
]);

Route::post('/superAdmin/homePage/oportunity/update', [
    'uses'  => 'HomePageController@updateOportunity',
    'as'    => 'updateOportunity'
]);

Route::get('/superAdmin/homePage/statusChange/{id}', [
    'uses'  => 'HomePageController@changeHomeStatus',
    'as'    => 'changeHomeStatus'
]);
// Section 10 end

Route::get('/superAdmin/homePage/edit/statistic/{id}', [
    'uses'  => 'HomePageController@editStatistic',
    'as'    => 'editStatistic'
]);
Route::get('/superAdmin/homePage/delete/statistic/{id}', [
    'uses'  => 'HomePageController@delStatistic',
    'as'    => 'delStatistic'
]);

Route::post('/superAdmin/homePage/statistic/update', [
    'uses'  => 'HomePageController@updateStatistic',
    'as'    => 'updateStatistic'
]);

Route::get('/superAdmin/homePage/statusChange/{id}', [
    'uses'  => 'HomePageController@changeHomeStatus',
    'as'    => 'changeHomeStatus'
]);


//FAQ routes
Route::get('/superAdmin/faqList', [
    'uses'  => 'SuperAdminViewController@faqList',
    'as'    => 'faqList'
]);

Route::post('/superAdmin/faq/saveFaq', [
    'uses'  => 'SuperAdminController@saveFaq',
    'as'    => 'saveFaq'
]);

Route::get('/superAdmin/pages/editFaq/{id}', [
    'uses'  => 'SuperAdminViewController@editFaq',
    'as'    => 'editFaq'
]);

Route::post('/superAdmin/pages/updateFaq', [
    'uses'  => 'SuperAdminController@updateFaq',
    'as'    => 'updateFaq'
]);

Route::get('/superAdmin/pages/delFaq/{id}', [
    'uses'  => 'SuperAdminViewController@delFaq',
    'as'    => 'delFaq'
]);

//Sited meta
Route::get('/superAdmin/siteMeta', [
    'uses'  => 'SuperAdminViewController@faqList',
    'as'    => 'siteMeta'
]);
//Email Setup
Route::get('/superAdmin/mailSetup', [
    'uses'  => 'SuperAdminViewController@mailSetup',
    'as'    => 'mailSetup'
]);

Route::post('/superAdmin/mailSetup/saveMail', [
    'uses'  => 'SuperAdminController@saveMail',
    'as'    => 'saveMail'
]);

Route::post('/superAdmin/mailSetup/saveSmtp', [
    'uses'  => 'SuperAdminController@saveSmtp',
    'as'    => 'saveSmtp'
]);

//general settings for the admin & frontend
Route::get('/superAdmin/generalSettings', [
    'uses'  => 'SuperAdminViewController@generalSettings',
    'as'    => 'generalSettings'
]);

Route::post('/superAdmin/pages/generalSettings/save', [
    'uses'  => 'SuperAdminController@saveGeneralSettings',
    'as'    => 'saveGeneralSettings'
]);

Route::post('/superAdmin/pages/generalSettings/frontendLogo/update', [
    'uses'  => 'SuperAdminController@updateFrontLogo',
    'as'    => 'updateFrontLogo'
]);

Route::post('/superAdmin/pages/generalSettings/backendLogo/update', [
    'uses'  => 'SuperAdminController@updateGenLogo',
    'as'    => 'updateGenLogo'
]);

Route::post('/superAdmin/pages/generalSettings/favicon/update', [
    'uses'  => 'SuperAdminController@updateFavicon',
    'as'    => 'updateFavicon'
]);


//admin panel control routes
Route::get('/superAdmin/admin/profile', [
    'uses'  => 'SuperAdminViewController@adminProfile',
    'as'    => 'adminProfile'
]);
Route::post('/superAdmin/admin/saveProfile',[
    'uses'  => 'SuperAdminController@saveProfile',
    'as'    => 'saveAdminProfile'
]);
Route::post('/superAdmin/admin/avatarUpdate',[
    'uses'  => 'SuperAdminController@avatarUpdate',
    'as'    => 'updateAdminAvatar'
]);
Route::post('/superAdmin/admin/adminLogout',[
    'uses'  => 'SuperAdminController@adminLogout',
    'as'    => 'adminLogout'
]);



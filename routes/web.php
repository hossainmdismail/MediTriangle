<?php

use App\Models\DoctorModel;
use App\Http\Controllers\VisaType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\VideoConsultant;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BannnerController;
use App\Http\Controllers\EmbassyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AdminVisaController;
use App\Http\Controllers\FrontAjaxController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\FindDoctorController;
use App\Http\Controllers\PdfDownlodController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\AdminMedicineController;
use App\Http\Controllers\HealthCardController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Models\HealthCard;
use Symfony\Component\HttpKernel\Controller\ContainerControllerResolver;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


//Download PDF
Route::get('/appointment/pdf/download/{id}',[PdfDownlodController::class, 'appointment_pdf'])->name('appointment.pdf');

//Cache Clear
Route::get('/clear/cache',[CacheController::class, 'clearCache'])->name('clear.Cache');



//Front End Routes Free Access

Route::get('/',[UserController::class, 'home'])->name('home');

//User Security
Route::get('/login',[FrontEndController::class, 'loginLink'])->name('login');
Route::post('/login/access',[FrontEndController::class, 'loginAccess'])->name('access.login');
Route::get('/register',[FrontEndController::class, 'registerLink'])->name('user.register');
Route::post('/register/access',[FrontEndController::class, 'registerAccess'])->name('user.access.register');
Route::get('/forget/user', [FrontEndController::class, 'reset'])->name('reset');
Route::post('/profile/forget/password/checkup',[ProfileController::class, 'forgetCheckup'])->name('profile.forget.pass.checkup');
Route::get('/profile/forget/password/verify/{token}',[ProfileController::class, 'forgetVerify'])->name('profile.forget.pass.verify');
Route::post('/profile/forget/password/change/confirme',[ProfileController::class, 'forgetVerifyChangeConfirme'])->name('profile.forget.pass.change.confirme');



Route::group(['middleware' => 'auth'],function(){
    //Profile
    Route::get('/profile',[ProfileController::class, 'link'])->name('profile');
    Route::post('/profile/update',[ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password/reset',[ProfileController::class, 'password'])->name('profile.password.reset');
    Route::get('/profile/order',[ProfileController::class, 'linkOrder'])->name('profile.order');

    // Security
    // Route::get('/profile/forget/password',[ProfileController::class, 'forget'])->name('profile.forget.pass');
    // // Route::get('/profile/forget/password/checkup/verify',[ProfileController::class, 'forgetCheckupVerify'])->name('profile.forget.pass.checkup.verify');
    // Route::post('/profile/forget/password/verify/confirme',[ProfileController::class, 'forgetVerifyConfirme'])->name('profile.forget.pass.verify.confirme');
    // Route::get('/profile/forget/password/change',[ProfileController::class, 'forgetVerifyChange'])->name('profile.forget.pass.change');
});

//Appoinment
Route::get('/appoinment',[FrontEndController::class, 'appoinmentLink'])->name('link.appoinment');
Route::post('/appoinment/store',[AppoinmentController::class, 'appoinmentStore'])->name('store.appoinment');
Route::get('/appoinment/store/done',[AppoinmentController::class, 'appoinmentStoreDone'])->name('store.appoinment.done');
//front AJAX Request
Route::post('/ajax/state',[FrontAjaxController::class, 'state'])->name('ajax.state');
Route::post('/ajax/department',[FrontAjaxController::class, 'department'])->name('ajax.department');
Route::post('/ajax/hospital',[FrontAjaxController::class, 'hospital'])->name('ajax.hospital');
Route::post('/ajax/doctor',[FrontAjaxController::class, 'doctor'])->name('ajax.doctor');
Route::post('/ajax/doctor/info',[FrontAjaxController::class, 'doctorInfo'])->name('ajax.doctor.info');


//Medicine
// Route::get('/medicine',[MedicineController::class, 'link'])->name('link.medicine');
// Route::post('/medicine/store',[MedicineController::class, 'store'])->name('store.medicine');

//thank you
Route::get('/thank-you',[FrontEndController::class, 'thankyou'])->name('thank.you');

//health card
Route::get('/health-card',[FrontEndController::class, 'index'])->name('health.card');
Route::POST('/health-card/store',[FrontEndController::class, 'healthCardStore'])->name('health.card.store');

// Route::post('/medicine/store',[MedicineController::class, 'store'])->name('store.medicine');

//Video Consultant
Route::get('/consultant',[VideoConsultant::class, 'link'])->name('video.consultant.link');
Route::get('/consultant/take/{id}',[VideoConsultant::class, 'take'])->name('video.consultant.take');
Route::post('/consultant/store',[VideoConsultant::class, 'store'])->name('video.consultant.store');

// Visa
Route::get('/visa',[VisaController::class, 'visaLink'])->name('link.visa');
Route::post('/visa/store',[VisaController::class, 'visaStore'])->name('store.visa');
Route::post('/visa/store/profile',[VisaController::class, 'visaStoreProfile'])->name('store.visa.profile');



//Find Doctor
Route::get('/doctor/find/{department?}',[FindDoctorController::class, 'link'])->name('doctor.find');


//contact
Route::get('/contact',[FrontEndController::class, 'contact'])->name('contact');
//healthcard terms and conditions
Route::get('/health-card-terms-and-conditions',[FrontEndController::class, 'hctc'])->name('hctc');
// terms and conditions
Route::get('/terms-and-conditions',[FrontEndController::class, 'terms'])->name('terms');
//privacy policy
Route::get('/about-us',[FrontEndController::class, 'aboutus'])->name('aboutus');
//privacy policy
Route::get('/privacy-policy',[FrontEndController::class, 'privacypolicy'])->name('privacypolicy');


// ========= SSLCOMMERZ Start ========= //
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// ========= SSLCOMMERZ END ========= //








// =========== Admin Middleware ======== //
//Back End Authentication Routes
Route::group(['prefix' => 'admin'],function(){
    Route::get('/login', [AdminController::class, 'loginLink'])->name('login.link');
    Route::post('/login/confirmation', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('/md_admin/register', [AdminController::class, 'register_2'])->name('register.2');
Route::post('/md_admin/register/confirmation', [AdminController::class, 'register'])->name('register2');


Route::group(['middleware' => 'admin_model'],function(){


    Route::get('/admin/register', [AdminController::class, 'registerLink'])->name('register.link');
    Route::post('/admin/register/confirmation', [AdminController::class, 'register'])->name('register');
    //Add User

    Route::get('/dashboard',[AdminDashboard::class, 'dashboard'])->name('admin.dashboard');

    //===Order Confirmation
    //Appointment
    Route::get('/user/data/appointment',[AdminDashboard::class, 'appointment'])->name('user.data.appointment');
    Route::get('/user/appointment/watch/{id}',[AdminDashboard::class, 'appointmentWatch'])->name('appointment.watch');
    Route::post('/user/data/appointment/confirmation',[AdminDashboard::class, 'appointmentConfirmation'])->name('user.data.appointment.confirmation');

    Route::get('/user/videoInvitaion',[AdminDashboard::class, 'videoInvitaion'])->name('user.data.videoInvitaion');

    //Video Invitation
    Route::get('/user/videoInvitaion',[AdminVideoController::class, 'video'])->name('user.data.videoInvitaion');
    Route::get('/user/videoInvitaion/watch/{id}',[AdminVideoController::class, 'videoWatch'])->name('videoInvitaion.watch');
    Route::post('/user/data/videoInvitaion/confirmation',[AdminVideoController::class, 'videoConfirmation'])->name('user.data.videoInvitaion.confirmation');

    //Visa Invitation
    Route::get('/user/visaInvitaion',[AdminVisaController::class, 'visa'])->name('user.data.visaInvitaion');
    Route::get('/user/visaInvitaion/watch/{id}',[AdminVisaController::class, 'visaWatch'])->name('visaInvitaion.watch');
    Route::post('/user/data/visaInvitaion/confirmation',[AdminVisaController::class, 'visaConfirmation'])->name('user.data.visaInvitaion.confirmation');

    //health card
    Route::get('/user/health-card/application',[HealthCardController::class, 'healthCardData'])->name('health.card.data');
    Route::get('/user/health-card/application/edit/{id}',[HealthCardController::class, 'healthCardDataEdit'])->name('health.card.edit');
    Route::post('/user/health-card/application/update',[HealthCardController::class, 'healthCardDataUpdate'])->name('health.card.update');

    //Order Medicine Manage
    Route::get('/medicine/link',[AdminMedicineController::class, 'link'])->name('admin.medicine.link');
    Route::get('/medicine/watch/{id}',[AdminMedicineController::class, 'medicineWatch'])->name('medicine.watch');

    //Owner
    Route::group(['prefix' => 'owner'],function(){
        Route::get('/',[OwnerController::class, 'ownerLink'])->name('owner.link');
        Route::post('/store',[OwnerController::class, 'ownerStore'])->name('owner.store');
        //Update
        Route::get('/edit/{id}',[OwnerController::class, 'ownerEdit'])->name('owner.edit');
        Route::post('/update',[OwnerController::class, 'ownerUpdate'])->name('owner.update');
        //Delete
        Route::get('/delete/{id}',[OwnerController::class, 'delete'])->name('owner.delete');
    });

    //Doctors
    Route::group(['prefix' => 'doctor'],function(){
        Route::get('/',[DoctorController::class, 'doctorLink'])->name('doctor.link');
        Route::post('/store',[DoctorController::class, 'doctorStore'])->name('doctor.store');
        // manage link
        Route::get('/manage',[DoctorController::class, 'doctorManage'])->name('doctor.manage');
        //Update
        Route::get('/edit/{id}',[DoctorController::class, 'doctorEdit'])->name('doctor.edit');
        Route::post('/update',[DoctorController::class, 'doctorUpdate'])->name('doctor.update');
        //Delete
        Route::get('/delete/{id}',[DoctorController::class, 'delete'])->name('doctor.delete');
        // ajax
        Route::post('/doctor/ajax',[DoctorController::class, 'doctorAjax'])->name('d.doctor.ajax');
    });

    //Database
    Route::group(['prefix' => 'database'],function(){
        //Country
        Route::get('/country',[DatabaseController::class, 'country'])->name('d.country');
        Route::post('/country/store',[DatabaseController::class, 'countryStore'])->name('d.country.store');
        Route::get('/country/delete/{id}',[DatabaseController::class, 'countryDelete'])->name('country.delete');
        Route::post('/country/update',[DatabaseController::class, 'countryUpdate'])->name('d.country.update');
        //State
        Route::get('/state',[DatabaseController::class, 'state'])->name('d.state');
        Route::post('/state/store',[DatabaseController::class, 'stateStore'])->name('d.state.store');
        Route::get('/state/delete/{id}',[DatabaseController::class, 'stateDelete'])->name('state.delete');
        Route::post('/state/update',[DatabaseController::class, 'stateUpdate'])->name('d.state.update');
        //Hospital
        Route::get('/hospital',[DatabaseController::class, 'hospital'])->name('d.hospital');
        Route::post('/hospital/store',[DatabaseController::class, 'hospitalStore'])->name('d.hospital.store');
        Route::post('/hospital/ajax',[DatabaseController::class, 'hospitalAjax'])->name('d.hospital.ajax');
        Route::get('/hospital/delete/{id}',[DatabaseController::class, 'hospitalDelete'])->name('hospital.delete');
        Route::post('/hospital/update',[DatabaseController::class, 'hospitalUpdate'])->name('d.hospital.update');

        //Health card
        Route::resource('/health-card',HealthCardController::class);


        //department
        Route::get('/department',[DatabaseController::class, 'department'])->name('d.department');
        Route::post('/department/store',[DatabaseController::class, 'departmentStore'])->name('d.department.store');
        Route::post('/department/ajax',[DatabaseController::class, 'departmentAjax'])->name('d.department.ajax');
        Route::get('/department/delete/{id}',[DatabaseController::class, 'departmentDelete'])->name('department.delete');
        Route::post('/department/update',[DatabaseController::class, 'departmentUpdate'])->name('d.department.update');

        //Speciality
        Route::get('/speciality',[DatabaseController::class, 'speciality'])->name('d.speciality');
        Route::post('/speciality/store',[DatabaseController::class, 'specialityStore'])->name('d.speciality.store');
        Route::get('/speciality/delete/{id}',[DatabaseController::class, 'specialityDelete'])->name('d.speciality.delete');

        //Social Media
        Route::get('/social',[SocialMediaController::class, 'social'])->name('d.social');
        Route::post('/social/store',[SocialMediaController::class, 'socialStore'])->name('d.social.store');
        Route::get('/social/delete/{id}',[SocialMediaController::class, 'socialDelete'])->name('social.delete');
        Route::post('/social/edit',[SocialMediaController::class, 'socialEdit'])->name('social.edit');
        Route::post('/social/update',[SocialMediaController::class, 'socialUpdate'])->name('d.social.update');
        //Services
        Route::get('/service',[ServiceController::class, 'service'])->name('d.service');
        Route::post('/service/store',[ServiceController::class, 'serviceStore'])->name('d.service.store');
        Route::get('/service/delete/{id}',[ServiceController::class, 'serviceDelete'])->name('service.delete');
        Route::post('/service/edit',[ServiceController::class, 'serviceEdit'])->name('service.edit');

        //About us
        Route::get('/about',[AboutUsController::class, 'about'])->name('d.about');
        Route::post('/about/store',[AboutUsController::class, 'aboutStore'])->name('d.about.store');
        Route::get('/about/delete/{id}',[AboutUsController::class, 'aboutDelete'])->name('about.delete');
        Route::post('/about/edit',[AboutUsController::class, 'aboutEdit'])->name('about.edit');

        //Banner
        Route::get('/banner',[BannnerController::class, 'banner'])->name('d.banner');
        Route::post('/banner/store',[BannnerController::class, 'bannerStore'])->name('d.banner.store');
        Route::get('/banner/delete/{id}',[BannnerController::class, 'bannerDelete'])->name('banner.delete');
        Route::post('/banner/edit',[BannnerController::class, 'bannerEdit'])->name('banner.edit');

    });
    //Role
    Route::get('role/link',[RoleController::class, 'index'])->name('role.link');
    Route::post('permission/store',[RoleController::class, 'permissionStore'])->name('permission.store');
    Route::post('role/store',[RoleController::class, 'roleStore'])->name('role.store');
    Route::post('assign/store',[RoleController::class, 'assignStore'])->name('assign.store');
    Route::get('remove/role/{user_id}',[RoleController::class, 'removeRole'])->name('remove.role');
    Route::get('delete/role/{role_id}',[RoleController::class, 'deleteRole'])->name('delete.role');
    // Route::resource('/embassy', EmbassyController::class);
    Route::resources([
        'embassy'  => EmbassyController::class,
        'visatype' => VisaType::class,
    ]);

});

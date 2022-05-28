<?php

use App\SmLanguagePhrase;
use App\SmModule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Modules\MenuManage\Entities\Sidebar;
use Modules\RolePermission\Entities\InfixModuleInfo;
use Modules\RolePermission\Entities\InfixModuleStudentParentInfo;
use SpondonIt\Rpclient\RaudhahPay;

if (config('app.app_sync')) {
    Route::get('/', 'LandingController@index')->name('/');
}

if (moduleStatusCheck('Saas')) {
    Route::group(['middleware' => ['subdomain'], 'domain' => '{subdomain}.' . config('app.short_url')], function ($routes) {
        require ('tenant.php');
    });

    Route::group(['middleware' => ['subdomain'], 'domain' => '{subdomain}'], function ($routes) {
        require ('tenant.php');
    });
}

Route::group(['middleware' => ['subdomain']], function ($routes) {
    require ('tenant.php');
});


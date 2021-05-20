<?php

namespace App\Core;

use Route\Route;

class Main {

    public function start()
    {
        
        Route::get('test', 'App\Controllers\TestController@index');
        Route::get('/', 'App\Controllers\HomeController@index')->name('home');
        Route::get('/post/:id', 'App\Controllers\HomeController@show');


        /* ************* ADMIN ****************** */
        Route::get('/dashboard', 'App\Controllers\AdminController@index')->name("admin.dashboard");
        
        Route::get('/equipes-admin-coach', 'App\Controllers\AdminController@coachs')->name('admin.coach');
        Route::get('/equipes-admin-show-coach/{id}', 'App\Controllers\AdminController@showCoach');
        Route::post('/equipes-admin-update-coach/{id}', 'App\Controllers\AdminController@updateCoach');
        Route::post('/equipes-admin-create-coach', 'App\Controllers\AdminController@createCoach');
        Route::get('/equipes-admin-delete-coach/{id}', 'App\Controllers\AdminController@deleteCoach')->name("delete.coach");

        Route::get('/equipes-admin-player', 'App\Controllers\TeamController@index')->name("admin.team");
        Route::post('/equipes-admin-create-player', 'App\Controllers\TeamController@createPlayer')->name("create-player");
        Route::get('/equipes-admin-show-player/{id}', 'App\Controllers\TeamController@showPlayer')->name("show-player");
        Route::post('/equipes-admin-update-player/{id}', 'App\Controllers\TeamController@updatePlayer')->name("update-player");
        Route::get('/equipes-admin-delete-player/{id}', 'App\Controllers\TeamController@deletePlayer')->name("delete.player");

        /* ************* ACTUALITE ***************** */
        Route::post('/admin-create-actualite', 'App\Controllers\AdminController@createActualite')->name("create-actualite");
        Route::get('/admin-show-actualite/{id}', 'App\Controllers\AdminController@showActualite')->name("show-actualite");
        Route::post('/admin-update-actualite/{id}', 'App\Controllers\AdminController@updateActualite')->name("update-actualite");
        Route::get('/admin-delete-actualite/{id}', 'App\Controllers\AdminController@deleteActualite')->name("delete.actualite");

        /* ************* SETTING  ****************** */
        Route::get('/profil', 'App\Controllers\SettingController@index');

        /* ************* CONNEXION ****************** */
        Route::get('/profil', 'App\Controllers\SettingController@index')->name('profil');
        Route::post('/edit-profil','App\Controllers\SettingController@edit');
        Route::get('/connexion', 'App\Controllers\ConnexionController@index')->name('login');
        Route::post('/connexionLogin', 'App\Controllers\ConnexionController@requestTraitement');
        Route::get('/deconnexion', 'App\Controllers\ConnexionController@logout' )->name('logout');
    

        Route::get('/pnm/rouster', 'App\Controllers\TeamController@showTeamOne')->name('pnm');
        Route::get('/equipes/{id}', 'App\Controllers\TeamController@showOtherTeam')->name('autres');
        Route::get('pnm-calendar', 'App\Controllers\TeamController@calandarPnm')->name('pnm--calandar');

        Route::get('/club/about', 'App\Controllers\ClubController@aboutPage')->name('about');
        Route::get("/club/formation-E-marque", "App\Controllers\ClubController@e_marqueFormation")->name('e_marque');
        Route::get('/club/surclassement', 'App\Controllers\ClubController@upgradingPlayer')->name('surclassement');
        Route::get('/club/arbitre', 'App\Controllers\ClubController@allReferee')->name('referee');
        Route::get('/club/fete-au-club', 'App\Controllers\ClubController@clubParty')->name('party');

        

        Route::post("/club-admin-create-partner", "App\Controllers\ClubController@createPartner");
        Route::post('/club-admin-update-partner/{id}', 'App\Controllers\ClubController@updatePartner');
        Route::get("/club-admin-show-partner/{id}", "App\Controllers\ClubController@showPartner");
        Route::get('/club-admin-delete-partner/{id}', 'App\Controllers\ClubController@deletePartner');
        Route::get('/club-admin-partner', 'App\Controllers\ClubController@index')->name('admin.partner');

        // verification des match 
        Route::run();
    }
}
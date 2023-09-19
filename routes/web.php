<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\PermanencierController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PermissionIndisponibiliteController;
use App\Http\Controllers\IndisponibiliteController;
use App\Http\Controllers\PrisonController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SpaController;
use App\Http\Controllers\NonRejoinController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CompagnieController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MaladeController;
use App\Http\Controllers\MoyenMissionController;
use App\Http\Controllers\EvenementMissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Permanence\ServiceController;
use App\Http\Controllers\Permanence\PostegardeController;
use App\Http\Controllers\Permanence\EvenController;
use App\Http\Controllers\Permanence\MoyenposteController;
use App\Http\Controllers\Permanence\VisitController;

use App\Http\Controllers\AMO\ArmeController;
use App\Http\Controllers\AMO\MunitionController;
use App\Http\Controllers\AMO\OptiqueController;
use App\Http\Controllers\Auto\MotoController;
use App\Http\Controllers\PdfgenerateController;
use App\Http\Controllers\Bon\BonController;
use App\Http\Controllers\Dotation\DotationController;




use App\Http\Controllers\Auto\VehiculeController;



use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// start groupe Admin Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

//------------------------------------------------------------------



//------------------------------------------------------------------



}); // end groupe Admin Middleware




// start groupe gestionnaire Middleware
Route::middleware(['auth', 'roles:gestionnaire'])->group(function () {
    Route::get('/gestionnaire/dashboard', [GestionnaireController::class, 'GestionnaireDashboard'])->name('gestionnaire.dashboard');
    Route::get('/gestionnaire/logout', [GestionnaireController::class, 'GestionnaireLogout'])->name('gestionnaire.logout');
    Route::get('/gestionnaire/profile', [GestionnaireController::class, 'GestionnaireProfile'])->name('gestionnaire.profile');
    Route::post('/gestionnaire/profile/store', [GestionnaireController::class, 'GestionnaireProfileStore'])->name('gestionnaire.profile.store');
    Route::get('/gestionnaire/change/password', [GestionnaireController::class, 'GestionnaireChangePassword'])->name('gestionnaire.change.password');
    Route::post('/gestionnaire/update/password', [GestionnaireController::class, 'GestionnaireUpdatePassword'])->name('gestionnaire.update.password');


});


// end groupe gestionnaire Middleware ->middleware('permission:all.armes')

// start groupe Personnel Middleware
Route::middleware(['auth', 'roles:personnel'])->group(function () {
    Route::get('/personnel/dashboard', [PersonnelController::class, 'PersonnelDashboard'])->name('personnel.dashboard');
    Route::get('/personnel/logout', [PersonnelController::class, 'PersonnelLogout'])->name('personnel.logout');
    Route::get('/personnel/profile', [PersonnelController::class, 'PersonnelProfile'])->name('personnel.profile');
    Route::post('/personnel/profile/store', [PersonnelController::class, 'PersonnelProfileStore'])->name('personnel.profile.store');
    Route::get('/personnel/change/password', [PersonnelController::class, 'PersonnelChangePassword'])->name('personnel.change.password');
    Route::post('/personnel/update/password', [PersonnelController::class, 'PersonnelUpdatePassword'])->name('personnel.update.password');



});
// end groupe personnel Middleware


// Toutes Liste Personnel
Route::controller(PersonnelController::class)->group(function(){
    Route::get('/all/personnel','AllPersonnel')->name('all.personnel');
    Route::get('/add/personnel','AddPersonnel')->name('add.personnel');
    Route::post('/store/personnel','StorePersonnel')->name('store.personnel') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/personnel/{id}','UpdatePersonnel')->name('update.personnel');
    Route::get('/delete/personnel/{id}','DeletePersonnel')->name('delete.personnel');
});

// Toutes Liste Grade
Route::controller(GradeController::class)->group(function(){
  Route::get('/all/grade','AllGrade')->name('all.grade');
  Route::post('/store/grade','StoreGrade')->name('store.grade') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/grade/{id}','UpdateGrade')->name('update.grade');
  Route::get('/delete/grade/{id}','DeleteGrade')->name('delete.grade');
});


// Toutes Liste Categorie
Route::controller(CategorieController::class)->group(function(){
    Route::get('/all/categorie','AllCategorie')->name('all.categorie');
    Route::get('/add/categorie','AddCategorie')->name('add.categorie');
    Route::post('/store/categorie','StoreCategorie')->name('store.categorie') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/categorie/{id}','UpdateCategorie')->name('update.categorie');
    Route::get('/delete/categorie/{id}','DeleteCategorie')->name('delete.categorie');
});

// Toutes Liste Groupe
Route::controller(GroupeController::class)->group(function(){
    Route::get('/all/groupe','AllGroupe')->name('all.groupe');
    Route::get('/add/groupe','AddGroupe')->name('add.groupe');
    Route::post('/store/groupe','StoreGroupe')->name('store.groupe') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/groupe/{id}','UpdateGroupe')->name('update.groupe');
    Route::get('/delete/groupe/{id}','DeleteGroupe')->name('delete.groupe');
});

// Toutes Liste Section
Route::controller(SectionController::class)->group(function(){
    Route::get('/all/section','AllSection')->name('all.section');
    Route::get('/add/section','AddSection')->name('add.section');
    Route::post('/store/section','StoreSection')->name('store.section') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/section/{id}','UpdateSection')->name('update.section');
    Route::get('/delete/section/{id}','DeleteSection')->name('delete.section');
});


// Toutes Liste Compagnie
Route::controller(CompagnieController::class)->group(function(){
    Route::get('/all/compagnie','AllCompagnie')->name('all.compagnie');
    Route::get('/add/compagnie','AddSection')->name('add.compagnie');
    Route::post('/store/compagnie','StoreCompagnie')->name('store.compagnie') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/compagnie/{id}','UpdateCompagnie')->name('updatecompagnie');
     Route::get('/delete/compagnie/{id}','DeleteCompagnie')->name('delete.compagnie');
});


// Toutes Liste Mission
Route::controller(MissionController::class)->group(function(){
    Route::get('/all/mission','AllMission')->name('all.mission');
    Route::get('/add/mission','AddMission')->name('add.mission');
    Route::post('/store/mission','StoreMission')->name('store.mission') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/mission/{id}','UpdateMission')->name('update.mission');
    Route::get('/delete/mission/{id}','DeleteMission')->name('delete.mission');
});



// Toutes Liste Stage
Route::controller(StageController::class)->group(function(){
  Route::get('/all/stage','AllStage')->name('all.stage');
  Route::get('/add/stage','AddStage')->name('add.stage');
  Route::post('/store/stage','StoreStage')->name('store.stage') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/stage/{id}','UpdateStage')->name('update.stage');
  Route::get('/delete/stage/{id}','DeleteStage')->name('delete.stage');
});



// Toutes Liste Malade
Route::controller(MaladeController::class)->group(function(){
  Route::get('/all/malade','AllMalade')->name('all.malade');
  Route::get('/add/malade','AddMalade')->name('add.malade');
  Route::post('/store/malade','StoreMalade')->name('store.malade') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/malade/{id}','UpdateMalade')->name('update.malade');
  Route::get('/delete/malade/{id}','DeleteMalade')->name('delete.malade');
});

// Toutes Liste nonRejoin
Route::controller(NonRejoinController::class)->group(function(){
  Route::get('/all/nonRejoin','AllNonRejoin')->name('all.nonRejoin');
  Route::get('/add/nonRejoin','AddNonRejoin')->name('add.nonRejoin');
  Route::post('/store/nonRejoin','StoreNonRejoin')->name('store.nonRejoin') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/nonRejoin/{id}','UpdateNonRejoin')->name('update.nonRejoin');
  Route::get('/delete/nonRejoin/{id}','DeleteNonRejoin')->name('delete.nonRejoin');
});


// Toutes Liste Spa
Route::controller(SpaController::class)->group(function(){
  Route::get('/all/spa','AllSpa')->name('all.spa');
  Route::get('/add/spa','AddSpa')->name('add.spa');
  Route::post('/store/spa','StoreSpa')->name('store.spa') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/spa/{id}','UpdateSpa')->name('update.spa');
  Route::get('/delete/spa/{id}','DeleteSpa')->name('delete.spa');
});

// Toutes Liste prison
Route::controller(PrisonController::class)->group(function(){
  Route::get('/all/prison','AllPrison')->name('all.prison');
  Route::get('/add/prison','AddPrison')->name('add.prison');
  Route::post('/store/prison','StorePrison')->name('store.prison') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/prison/{id}','UpdatePrison')->name('update.prison');
  Route::get('/delete/prison/{id}','DeletePrison')->name('delete.prison');
});


// Toutes Liste PermissionIndisponibilite
Route::controller(PermissionIndisponibiliteController::class)->group(function(){
  Route::get('/all/permissionIndisponibilite','AllPermissionIndisponibilite')->name('all.permissionIndisponibilite');
  Route::get('/add/permissionIndisponibilite','AddNonPermissionIndisponibilite')->name('add.permissionIndisponibilite');
  Route::post('/store/permissionIndisponibilite','StorePermissionIndisponibilite')->name('store.permissionIndisponibilite') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/permissionIndisponibilite/{id}','UpdatePermissionIndisponibilite')->name('update.permissionIndisponibilite');
  Route::get('/delete/permissionIndisponibilite/{id}','DeletePermissionIndisponibilite')->name('delete.permissionIndisponibilite');
});


// Toutes Liste Indisponibilite
Route::controller(IndisponibiliteController::class)->group(function(){
  Route::get('/all/indisponibilite','AllIndisponibilite')->name('all.indisponibilite');
  Route::get('/add/indisponibilite','AddIndisponibilite')->name('add.indisponibilite');
  Route::post('/store/indisponibilite','StoreIndisponibilite')->name('store.indisponibilite') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/indisponibilite/{id}','UpdateIndisponibilite')->name('update.indisponibilite');
  Route::get('/delete/indisponibilite/{id}','DeleteIndisponibilite')->name('delete.indisponibilite');
});


// Toutes Liste Fonction
Route::controller(FonctionController::class)->group(function(){
  Route::get('/all/fonction','AllFonction')->name('all.fonction');
  Route::get('/add/fonction','AddFonction')->name('add.fonction');
  Route::post('/store/fonction','StoreFonction')->name('store.fonction') ;
    // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
  Route::post('/update/fonction/{id}','UpdateFonction')->name('update.fonction');
  Route::get('/delete/fonction/{id}','DeleteFonction')->name('delete.fonction');
});



// Toutes Liste Moyen Mission
Route::controller(MoyenMissionController::class)->group(function(){
    Route::get('/all/moyenMission','AllMoyenMission')->name('all.moyenMission');
    Route::get('/add/moyenMission','AddMoyenMission')->name('add.moyenMission');
    Route::post('/store/moyenMission','StoreMoyenMission')->name('store.moyenMission') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/moyenMission/{id}','UpdateMoyenMission')->name('update.moyenMission');
    Route::get('/delete/moyenMission/{id}','DeleteMoyenMission')->name('delete.moyenMission');
});



// Toutes Liste Evenement Mission
Route::controller(EvenementMissionController::class)->group(function(){
    Route::get('/all/evenementMission','AllEvenementMission')->name('all.evenementMission');
    Route::get('/add/evenementMission','AddEvenementMission')->name('add.evenementMission');
    Route::post('/store/evenementMission','StoreEvenementMission')->name('store.evenementMission') ;
      // Route::get('/edit/personnel/{id}','EditPersonnel')->name('edit.personnel');
    Route::post('/update/evenementMission/{id}','UpdateEvenementMission')->name('update.evenementMission');
     Route::get('/delete/evenementMission/{id}','DeleteEvenementMission')->name('delete.evenementMission');
});







// start groupe permanencier Middleware
 Route::middleware(['auth', 'roles:permanencier'])->group(function () {
    Route::get('/permanencier/dashboard', [PermanencierController::class, 'PermanencierDashboard'])->name('permanencier.dashboard');
    Route::get('/permanencier/logout', [PermanencierController::class, 'PermanencierLogout'])->name('permanencier.logout');
    Route::get('/permanencier/profile', [PermanencierController::class, 'PermanencierProfile'])->name('permanencier.profile');
    Route::post('/permanencier/profile/store', [PermanencierController::class, 'PermanencierProfileStore'])->name('permanencier.profile.store');
    Route::get('/permanencier/change/password', [PermanencierController::class, 'PermanencierChangePassword'])->name('permanencier.change.password');
    Route::post('/permanencier/update/password', [PermanencierController::class, 'PermanencierUpdatePassword'])->name('permanencier.update.password');


});

//service group


    Route::get('/all/service', [ServiceController::class, 'AllService'])->name('all.service');
    Route::post('/store/service', [ServiceController::class, 'StoreService'])->name('store.service');
    Route::post('/update/service/{id}', [ServiceController::class, 'UpdateService'])->name('update.service');
    Route::get('/delete/service/{id}', [ServiceController::class, 'DeleteService'])->name('delete.service');



// end service group



//poste garde group


    Route::get('/all/poste', [PostegardeController::class, 'AllPoste'])->name('all.poste');
    Route::post('/store/poste', [PostegardeController::class, 'StorePoste'])->name('store.poste');
    Route::post('/update/poste/{id}', [PostegardeController::class, 'UpdatePoste'])->name('update.poste');
    Route::get('/delete/poste/{id}', [PostegardeController::class, 'DeletePoste'])->name('delete.poste');



// end garde group


    Route::get('/all/even', [EvenController::class, 'AllEven'])->name('all.even');
    Route::post('/store/even', [EvenController::class, 'StoreEven'])->name('store.even');
    Route::post('/update/even/{id}', [EvenController::class, 'UpdateEven'])->name('update.even');
    Route::get('/delete/even/{id}', [EvenController::class, 'DeleteEven'])->name('delete.even');



// end evenenment group





    Route::get('/all/visit', [VisitController::class, 'AllVisit'])->name('all.visit');
    Route::post('/store/visit', [VisitController::class, 'StoreVisit'])->name('store.visit');
    Route::post('/update/visit/{id}', [VisitController::class, 'UpdateVisit'])->name('update.visit');
    Route::get('/delete/visit/{id}', [VisitController::class, 'DeleteVisit'])->name('delete.visit');



// end visiteur group


    Route::get('/all/moyen', [MoyenposteController::class, 'AllMoyen'])->name('all.moyen');
    Route::post('/store/moyen', [MoyenposteController::class, 'StoreMoyen'])->name('store.moyen');
    Route::post('/update/moyen/{id}', [MoyenposteController::class, 'UpdateMoyen'])->name('update.moyen');
    Route::get('/delete/moyen/{id}', [MoyenposteController::class, 'DeleteMoyen'])->name('delete.moyen');



// end evenenment group

// end groupe permanencier Middleware



Route::middleware(['auth', 'roles:admin'])->group(function () {



    // admin create users
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/admin','AllAdmin')->name('all.admin');
        Route::get('/add/admin','AddAdmin')->name('add.admin');
        Route::post('/store/admin','StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}','EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}','UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete.admin');
    });


    // Permission All Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission');
        Route::get('/add/permission','AddPermission')->name('add.permission');
        Route::post('/store/permission','StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::post('/update/permission','UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');
        Route::get('/import/permission','ImportPermission')->name('import.permission');
        Route::get('/export','Export')->name('export');
        Route::post('/import','Import')->name('import');
    });


     // Roles All Route
     Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRole')->name('all.roles');
        Route::get('/add/roles','AddRole')->name('add.roles');
        Route::post('/store/roles','StoreRole')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRole')->name('edit.roles');
        Route::post('/update/roles','UpdateRole')->name('update.roles');
        Route::get('/delete/roles/{id}','DeleteRole')->name('delete.roles');

        // Roles of permission All Route
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store','RolesPermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}','AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles');


    });



}); // end groupe Admin Middleware





// Route::get('/generate-pdf','PdfgenrateController@generatePDF');
Route::get('/generate-pdf',    [PdfgenerateController::class, 'generatePDF'])->name('pdf');

Route::get('/telecharger-pdf',  [ArmeController::class, 'telechargerPdf'])->name('telecharger');


Route::get('/telecharger-pdf/{id}',  [BonController::class, 'telechargerPdf'])->name('telecharger.pdf');

// Route::get('/telecharger-pdf/{id}', 'BonController@telechargerPdf')->name('telecharger.pdf');


Route::controller(BonController::class)->group(function(){
    // Route::get('/all/munition','AllMunition')->name('all.munition')->middleware('permission:store.arme');
    Route::get('/all/bon','AllBon')->name('all.bon');
    Route::post('/store/bon','StoreBon')->name('store.bon');
    // Route::get('/edit/munition/{id}','EditMunition')->name('edit.munition')->middleware('permission:store.arme');
    Route::post('/update/bon/{id}','UpdateBon')->name('update.bon');
    Route::get('/delete/bon/{id}','DeleteBon')->name('delete.bon');

});





Route::controller(ArmeController::class)->group(function(){
    Route::get('/all/arme','AllArme')->name('all.arme')->middleware('permission:all.arme');

    Route::get('/liste/arme','ListeArme')->name('liste.arme');

    Route::get('/add/arme','AddArme')->name('add.arme');
    Route::post('/store/arme','StoreArme')->name('store.arme')->middleware('permission:store.arme');
    Route::get('/edit/arme/{id}','EditArme')->name('edit.arme')->middleware('permission:store.arme');
    Route::post('/update/arme','UpdateArme')->name('update.arme')->middleware('permission:store.arme');
    Route::get('/delete/arme/{id}','DeleteArme')->name('delete.arme')->middleware('permission:store.arme');

    Route::get('/all/typearme','AllTypeArme')->name('all.typearme')->middleware('permission:store.arme');
    Route::get('/add/typearme','AddTypeArme')->name('add.typearme')->middleware('permission:store.arme');
    Route::post('/store/typearme','StoreTypeArme')->name('store.typearme')->middleware('permission:store.arme');
    Route::get('/edit/typearme/{id}','EditTypeArme')->name('edit.typearme')->middleware('permission:store.arme');
    Route::post('/update/typearme','UpdateTypeArme')->name('update.typearme')->middleware('permission:store.arme');
    Route::get('/delete/typearme/{id}','DeleteTypeArme')->name('delete.typearme')->middleware('permission:store.arme');

});

Route::controller(DotationController::class)->group(function(){
    Route::get('/all/dotation','AllDotation')->name('all.dotation');
    // Route::get('/add/munition','AddMunition')->name('add.munition')->middleware('permission:store.arme');
    // Route::post('/store/munition','StoreMunition')->name('store.munition')->middleware('permission:store.arme');
    // Route::get('/edit/munition/{id}','EditMunition')->name('edit.munition')->middleware('permission:store.arme');
    // Route::post('/update/munition','UpdateMunition')->name('update.munition')->middleware('permission:store.arme');
    // Route::get('/delete/munition/{id}','DeleteMunition')->name('delete.munition')->middleware('permission:store.arme');

});


Route::controller(MunitionController::class)->group(function(){
    Route::get('/all/munition','AllMunition')->name('all.munition')->middleware('permission:store.arme');
    Route::get('/add/munition','AddMunition')->name('add.munition')->middleware('permission:store.arme');
    Route::post('/store/munition','StoreMunition')->name('store.munition')->middleware('permission:store.arme');
    Route::get('/edit/munition/{id}','EditMunition')->name('edit.munition')->middleware('permission:store.arme');
    Route::post('/update/munition','UpdateMunition')->name('update.munition')->middleware('permission:store.arme');
    Route::get('/delete/munition/{id}','DeleteMunition')->name('delete.munition')->middleware('permission:store.arme');

});

Route::controller(OptiqueController::class)->group(function(){
    Route::get('/all/optique','AllOptique')->name('all.optique')->middleware('permission:store.arme');
    Route::get('/add/optique','AddOptique')->name('add.optique')->middleware('permission:store.arme');
    Route::post('/store/optique','StoreOptique')->name('store.optique')->middleware('permission:store.arme');
    Route::get('/edit/optique/{id}','EditOptique')->name('edit.optique')->middleware('permission:store.arme');
    Route::post('/update/optique','UpdateOptique')->name('update.optique')->middleware('permission:store.arme');
    Route::get('/delete/optique/{id}','DeleteOptique')->name('delete.optique')->middleware('permission:store.arme');

});

// Routes moto
Route::controller(MotoController::class)->group(function(){
    Route::get('/all/moto','AllMoto')->name('all.moto')->middleware('permission:store.arme');
    Route::get('/add/moto','AddMoto')->name('add.moto')->middleware('permission:store.arme');
    Route::post('/store/moto','StoreMoto')->name('store.moto')->middleware('permission:store.arme');
    Route::get('/edit/moto/{id}','EditMoto')->name('edit.moto')->middleware('permission:store.arme');
    Route::post('/update/moto','UpdateMoto')->name('update.moto')->middleware('permission:store.arme');
    Route::get('/delete/moto/{id}','DeleteMoto')->name('delete.moto')->middleware('permission:store.arme');

});

// Routes vehicule
Route::controller(VehiculeController::class)->group(function(){
    Route::get('/all/vehicule','AllVehicule')->name('all.vehicule')->middleware('permission:store.arme');
    Route::get('/add/vehicule','AddVehicule')->name('add.vehicule')->middleware('permission:store.arme');
    Route::post('/store/vehicule','StoreVehicule')->name('store.vehicule')->middleware('permission:store.arme');
    Route::get('/edit/vehicule/{id}','EditVehicule')->name('edit.vehicule')->middleware('permission:store.arme');
    Route::post('/update/vehicule','UpdateVehicule')->name('update.vehicule')->middleware('permission:store.arme');
    Route::get('/delete/vehicule/{id}','DeleteVehicule')->name('delete.vehicule')->middleware('permission:store.arme');

});

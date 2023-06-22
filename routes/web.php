<?php
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

use App\Http\Controllers\GraphController;

Route::get('/', function () {
    return view('accueil');
});

 Route::get('/welcome', function () {
     return view('welcome');
 });

 Route::get('/test-db', function () {
    return view('test-db');
});

Route::get('/test-db', function () {
    $scenarios = DB::table('scenario')->get();
    return view('test-db', ['scenarios' => $scenarios]);
});

Route::get('/inter1proj', function () {
    return view('inter1proj');
})->name('inter1proj');

Route::get('/inter2proj', function () {
    return view('inter2proj');
})->name('inter2proj');

// Route::get('/graph', function () {
//     return view('graph');
// })->name('graph');

// Route::get('/graph/{idtest}', function ($idtest) {
//     return view('graph');
// })->name('graph');

// Route::get('/api/graph-data', function () {
//     return response()->file(public_path('api.php'));
// });

Route::post('/save-scenario', 'ScenarioController@save')->name('saveScenario');

Route::post('/save-param', 'ParamController@save')->name('saveParam');

Route::get('/chxscenario', 'ScenarioController@index')->name('chxscenario');

Route::get('/listetest/{idscenario}', 'TestController@index')->name('listetest');

Route::get('/graph/{idtest}', 'GraphController@show')->name('graph');


//Route::get('/graph/{idtest}', [GraphController::class, 'show'])->name('graph');
//Route::get('/api/graph-data/{idtest}', [GraphController::class, 'getGraphData'])->name('api.graph.data');
Route::get('/api/{idtest}', [GraphController::class, 'getGraphData'])->name('api');

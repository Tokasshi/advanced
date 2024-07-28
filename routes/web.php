<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;


Route:: get('cv', [ExampleController::class, 'cv'] );

//////////////////////////.....................TASK FIVE............................///////////////////////////////
//view classes index
Route::get('classes', [ClassController::class,'index']);
//go to edit data form 
Route::get('classes/{id}', [ClassController::class,'edit'])->name('edit.class');

//////////////////////////////.................TASK FOUR...................................///////////////////////////////////
Route::get('class/create', [ClassController::class,'create']);
Route::POST('classes', [ClassController::class,'store'])->name('classes.store');



////////////////......TASK THREE............//////////////
//view contact us page
Route::get('contactus', [ExampleController::class, 'contactus']); 
//request and extract data inserted in contact us form
Route:: post('data', [ExampleController::class, 'data' ] )->name('data');
//login nour way 
//first view login page
Route:: get('login', [ExampleController::class, 'login' ] );
//request data 
Route::post('log',[ExampleController::class, 'recieve'])->name('log');

///////////////////.................TASK FOUR..............................//////////////////////







/////////////////////////////........SESSIONS...........//////////////////////

Route:: get('welcome', function() {
    return 'welcome to laravel';
})->name('w');


Route::get('/', function () {
    return view('welcome');
});

Route::get('w', function () {
    return 'Hello summoner';
});

// Route :: get('cars/{id?}', function($id=0){
//  return 'car number is' . $id;
// })-> where([
//     'id' => '[0-9]+'
// ]);

//if age is optional .......?...... $age=0
Route::get('user/{name}/{age?}', function ($name, $age = 0) {
    if ($age == 0) {
        return 'username is ' . $name;
    } else {
        return 'username is ' . $name . ' and your age is ' . $age . ' years';
    }
})->where([
    'name' => '[a-zA-Z]+',
    'age' => '[0-9]+',
]);
// specific options only
Route::get('ki/{name}', function ($name) {
    return 'username is ' . $name;
})->whereIn('name', ['Toka', 'Omar']);

// Route:: get ('user/{name}/{age}', function($name, $age){
//     return "Username is " . $name . " and age is " . $age;
// })-> whereAlpha('name')->whereNumber('age');

// Route:: get('car/{name}', function($name) {
//     return "name is " . $name;
// })->whereIn('name', ['Nour', 'Toka', 'Siro']);





Route::prefix('company')->group(function () {
    Route::get('', function () {
        return 'Company Index';
    });

    Route::get('IT', function () {
        return 'Company IT';
    });

    Route::get('users', function () {
        return 'Company Users';
    });
});

////////.........TASK TWO.............////////////////////
Route::prefix('accounts')->group(function () {
    Route::get('', function () {
        return 'Accounts Index';
    });

    Route::get('admin', function () {
        return 'Accounts Admin';
    });

    Route::get('user', function () {
        return 'Account User';
    });
});

Route::prefix('cars')->group(function () {
    Route::get('', function () {
        return 'Cars Index';
    });

    Route::prefix('usa')->group(function () {
        Route::get('', function () {
            return 'USA cars';
        });
    
        Route::get('ford', function () {
            return 'All you need to know about Ford';
        });
    
        Route::get('tesla', function () {
            return 'All you need to know about Tesla';
        });
    });
    Route::prefix('ger')->group(function () {
        Route::get('', function () {
            return 'German cars';
        });
    
        Route::get('mer', function () {
            return 'All you need to know about Mercedes';
        });
    
        Route::get('au', function () {
            return 'All you need to know about Audi';
        });

        Route::get('vol', function () {
            return 'All you need to know about Volkswagen';
        });
    });
});

///////////////////////........................session three............................./////////////////////////////
// Route:: fallback(function(){
//     return redirect('/');
// });

Route:: get('link', function() {
    $url= route('w');
    return "<a href='$url'> go to welcome </a>";
});

Route:: get('welcome', function() {
    return 'welcome to laravel';
})->name('w');

Route:: get('link', function() {
    $url= route('w');
    return "<a href='$url'> go to welcome </a>";
});

/////////////////////////////.................session four.....................//////////////////////////////
Route::get('car/create', [CarController::class,'create']);
Route::POST('cars', [CarController::class,'store'])->name('cars.store');


<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('w', function () {
//     return 'Hello summoner';
// });

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

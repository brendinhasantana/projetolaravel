<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{nome}', function ($nome) {
    if  (strlen($nome) < 3  || (is_numeric($nome)))  {
        echo 'Insira um nome válido';
    }   
    else{
        echo 'Olá '.$nome .' seja bem-vindo ao meu site';
    }
})->name('nome');

Route::get('/conta/{numero1}/{numero2}/{operacao?}', function ($numero1, $numero2, $operacao='') {
    switch($operacao){  
        case "soma":
            $resultado = $numero1 + $numero2; 
            echo 'Soma : ' . $resultado;        
            break;
        case 'subtração':
            $resultado = $numero1 - $numero2;
            echo 'Subtração :' . $resultado;
            break;    
        case 'multiplicação':
            $resultado = $numero1 * $numero2;
            echo 'Multiplicação: ' . $resultado;
            break;
        case 'divisão':
            $resultado= $numero1 / $numero2;
            echo 'Divisão: ' . $resultado;
            break;  
        case '':
            $resultado = $numero1 + $numero2;
            echo 'Soma: ' . $resultado;
            $resultado = $numero1 - $numero2;
            echo '</br>Subtração: ' . $resultado;
            $resultado = $numero1 * $numero2;
            echo '</br>Multiplicação: ' . $resultado;
            $resultado = $numero1/$numero2;
            echo '</br>Divisão: ' . $resultado;  
            break;
    };
})->name('operations');
//php artisan serve




<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;
use App\Http\Controllers\EventController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{nome}', function ($nome) {
    if  (strlen($nome) < 3  || (is_numeric($nome))){
        echo 'Insira um nome válido';
    }  
    else{
        echo 'Olá '.$nome .' seja bem-vindo ao meu site';
    }
})->name('nome');


Route::get('/conta/{numero1}/{numero2}/{operacao?}', function ($numero1, $numero2, $operacao = '') {
    switch ($operacao) {
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
            $resultado = $numero1 / $numero2;
            echo 'Divisão: ' . $resultado;
            break;
        case '':
            $resultado = $numero1 + $numero2;
            echo 'Soma: ' . $resultado;
            $resultado = $numero1 - $numero2;
            echo '</br>Subtração: ' . $resultado;
            $resultado = $numero1 * $numero2;
            echo '</br>Multiplicação: ' . $resultado;
            $resultado = $numero1 / $numero2;
            echo '</br>Divisão: ' . $resultado;
            break;
    };
})->name('operations');

Route::get('/idade/{ano}/{mes?}/{dia?}', function (int $ano, int $mes=0, int $dia=0) {

    $entrada = new DateTime('now');
    $saida = new DateTime("$ano-$mes-$dia");
    $idade = $entrada->diff($saida);

    if ($entrada->format('Y') >= $saida->format('Y')){
        echo 'Insira uma idade valida';
    }
    elseif ($dia==0 && $mes!=0 ){
        echo 'Você tem ' . $idade->y . ' anos ' . $idade->m . ' meses';
    }
    elseif ($mes==0){
        echo 'Você tem ' . $idade->y . ' anos';
    }
    else{
        echo 'Você tem ' . $idade->y . ' anos ' . $idade->m . ' meses e ' . $idade->d . ' dias';
    }


})->where(['ano'=>'[0-9]{4}', 'mes'=>'[0-9]{1,2}', 'dia'=>'[0-9]{1,2}']) ; 

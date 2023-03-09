<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::group(['middleware' => ['auth']], function() {
    /* Inici */
    Route::get('backend/inici', 'HomeBackendController@index')->name('backend.inici.index');

    /* Partits */
    Route::get('backend/partits', 'PartitController@index')->name('backend.partits.index');
    Route::get('backend/partits/create', 'PartitController@create')->name('backend.partits.create');
    Route::post('backend/partits', 'PartitController@store')->name('backend.partits.store');
    Route::get('backend/partits/{partit}/edit', 'PartitController@edit')->name('backend.partits.edit');
    Route::put('backend/partits/{partit}', 'PartitController@update')->name('backend.partits.update');
    Route::delete('backend/partits/{partit}', 'PartitController@destroy')->name('backend.partits.destroy');

    /* Equips */
    Route::get('backend/equips', 'EquipController@index')->name('backend.equips.index');
    Route::get('backend/equips/show/jugadors', 'EquipController@show')->name('backend.equips.show');
    Route::get('backend/equips/show/tecnics', 'EquipController@show')->name('backend.equips.show');
    Route::get('backend/equips/create', 'EquipController@create')->name('backend.equips.create');
    Route::post('backend/equips', 'EquipController@store')->name('backend.equips.store');
    Route::get('backend/equips/{equip}/edit', 'EquipController@edit')->name('backend.equips.edit');
    Route::put('backend/equips/{equip}', 'EquipController@update')->name('backend.equips.update');
    Route::delete('backend/equips/{equip}', 'EquipController@destroy')->name('backend.equips.destroy');

    /* Jugadors */
    Route::get('backend/equips/jugadors/show/{equip}', 'JugadorController@index')->name('backend.equips.jugadors.index');
    Route::get('backend/equips/jugadors/create', 'JugadorController@create')->name('backend.equips.jugadors.create');
    Route::post('backend/equips/jugadors', 'JugadorController@store')->name('backend.equips.jugadors.store');
    Route::get('backend/equips/jugadors/{jugador}/edit', 'JugadorController@edit')->name('backend.equips.jugadors.edit');
    Route::put('backend/equips/jugadors/{jugador}', 'JugadorController@update')->name('backend.equips.jugadors.update');
    Route::delete('backend/equips/jugadors/{jugador}', 'JugadorController@destroy')->name('backend.equips.jugadors.destroy');

    /* Tècnics */
    Route::get('backend/equips/tecnics/show/{equip}', 'TecnicController@index')->name('backend.equips.tecnics.index');
    Route::get('backend/equips/tecnics/create', 'TecnicController@create')->name('backend.equips.tecnics.create');
    Route::post('backend/equips/tecnics', 'TecnicController@store')->name('backend.equips.tecnics.store');
    Route::get('backend/equips/tecnics/{tecnic}/edit', 'TecnicController@edit')->name('backend.equips.tecnics.edit');
    Route::put('backend/equips/tecnics/{tecnic}', 'TecnicController@update')->name('backend.equips.tecnics.update');
    Route::delete('backend/equips/tecnics/{tecnic}', 'TecnicController@destroy')->name('backend.equips.tecnics.destroy');
});

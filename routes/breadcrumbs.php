<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});


//Active reference para la programacion de actividades a palmeras

Breadcrumbs::for('actividades_palmeras.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Programar actividades a palmeras', route('actividades_palmeras.index'));
});

Breadcrumbs::for('actividades_palmeras.seleccionarPredio', function ($trail, $predio) {
    $trail->parent('actividades_palmeras.index');
    $trail->push($predio->getPreID(), route('actividades_palmeras.seleccionarPredio', $predio->getPreID()));
});

Breadcrumbs::for('actividades_palmeras.seleccionaPalmera', function ($trail, $predio, $palmera) {
    $trail->parent('actividades_palmeras.seleccionarPredio', $predio);
    $trail->push($palmera->getId(), route('actividades_palmeras.seleccionaPalmera', ["predio" => $predio->getPreID(), 'palmera' => $palmera->getId()]));
});

Breadcrumbs::for('actividades_palmeras.agregar_actividad', function ($trail, $predio, $palmera, $actividad) {
    $trail->parent('actividades_palmeras.seleccionaPalmera', $predio, $palmera);
    $trail->push($actividad->getNombre(), route('actividades_palmeras.agregar_actividad', ["predio" => $predio->getPreID(), 'palmera' => $palmera->getId(), 'actividad' => $actividad->getId()]));
});


//Active reference para la programacion de actividades a predios

Breadcrumbs::for('actividades_predios.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Programar actividades a predios', route('actividades_predios.index'));
});

Breadcrumbs::for('actividades_predios.seleccionarPredio', function ($trail, $predio) {
    $trail->parent('actividades_predios.index');
    $trail->push($predio->getPreID(), route('actividades_predios.seleccionarPredio', $predio->getPreID()));
});

Breadcrumbs::for('actividades_predios.agregar_actividad', function ($trail, $predio, $actividad) {
    $trail->parent('actividades_predios.seleccionarPredio', $predio);
    $trail->push($actividad->getNombre(), route('actividades_predios.agregar_actividad', ["predio" => $predio->getPreID(), 'actividad' => $actividad->getId()]));
});

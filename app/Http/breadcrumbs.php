<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('herd.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Herd', route('herd.index'));
});

Breadcrumbs::register('herd.show', function($breadcrumbs, App\Herd $herd)
{
    $breadcrumbs->parent('herd.index');
    $breadcrumbs->push($herd->name, route('herd.show', ['herd' => $herd]));
});

Breadcrumbs::register('cow.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cow', route('cow.index'));
});

Breadcrumbs::register('cow.create', function($breadcrumbs)
{
    $breadcrumbs->parent('cow.index');
    $breadcrumbs->push('Create', route('cow.create'));
});

Breadcrumbs::register('cow.show', function($breadcrumbs, App\Cow $cow)
{
    $breadcrumbs->parent('cow.index');
    $breadcrumbs->push($cow->name, route('cow.show', ['cow' => $cow]));
});

Breadcrumbs::register('breeding.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Breeding', route('breeding.index'));
});

Breadcrumbs::register('breeding.create', function($breadcrumbs)
{
    $breadcrumbs->parent('breeding.index');
    $breadcrumbs->push('Create', route('breeding.create'));
});

Breadcrumbs::register('breeding.show', function($breadcrumbs, App\Breeding $breeding)
{
    $breadcrumbs->parent('breeding.index');
    $breadcrumbs->push($breeding->cow->name." on ".$breeding->service_date->format('m/d/Y'), route('breeding.show', ['breeding' => $breeding]));
});
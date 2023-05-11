<?php
/* home page */
$router->get('home', function () {
    require 'controllers/home.php';
});
$router->post('home', function () {
    require 'controllers/home.php';
});

/* login */
$router->get('login', function () {
    require 'controllers/login.php';
});
$router->post('login/check', function (){
    require 'controllers/login.check.php';
});

/* logout */
$router->get('logout', function (){
    require 'controllers/logout.php';
});

/*Photos*/

/* add photo */
$router->get('photos/create', function () {
    require 'controllers/photos/create.php';
});
$router->post('photos/store', function () {
    require 'controllers/photos/store.php';
});

/* list photos */
$router->get('photos', function () {
    require 'controllers/photos/index.php';
});
$router->post('photos', function () {
    require 'controllers/photos/index.php';
});

/* show photo with id */
$router->get('photos/(\d+)', function ($id) {
    require 'controllers/photos/show.php';
});

/* delete photo */
$router->delete('photos/(\d+)', function ($id) {
    require 'controllers/photos/delete.php';
});

/* edit photo */
$router->get('photos/(\d+)/edit', function ($id) {
    require 'controllers/photos/edit.php';
});
$router->patch('photos/(\d+)', function ($id) {
    require 'controllers/photos/update.php';
});

/*Cameras*/

/* add camera */
$router->get('camera/create', function () {
    require 'controllers/camera/create.php';
});
$router->post('camera/store', function () {
    require 'controllers/camera/store.php';
});

/* list cameras */
$router->get('cameras', function () {
    require 'controllers/camera/index.php';
});

/* show camera with id */
$router->get('camera/(\d+)', function ($id) {
    require 'controllers/camera/show.php';
});

/* delete camera */
$router->delete('camera/(\d+)', function ($id) {
    require 'controllers/camera/delete.php';
});

/* edit camera */
$router->get('camera/(\d+)/edit', function ($id) {
    require 'controllers/camera/edit.php';
});
$router->patch('camera/(\d+)', function ($id) {
    require 'controllers/camera/update.php';
});

/*Lenses*/

/* add lens */
$router->get('lens/create', function () {
    require 'controllers/lens/create.php';
});
$router->post('lens/store', function () {
    require 'controllers/lens/store.php';
});

/* list lens */
$router->get('lenses', function () {
    require 'controllers/lens/index.php';
});

/* show lens with id */
$router->get('lens/(\d+)', function ($id) {
    require 'controllers/lens/show.php';
});

/* delete lens */
$router->delete('lens/(\d+)', function ($id) {
    require 'controllers/lens/delete.php';
});

/* edit lens */
$router->get('lens/(\d+)/edit', function ($id) {
    require 'controllers/lens/edit.php';
});
$router->patch('lens/(\d+)', function ($id) {
    require 'controllers/lens/update.php';
});

/*Tags*/

/* add tag */
$router->get('tag/create', function () {
    require 'controllers/tag/create.php';
});
$router->post('tag/store', function () {
    require 'controllers/tag/store.php';
});

/* list tag */
$router->get('tags', function () {
    require 'controllers/tag/index.php';
});

/* show tag with id */
$router->get('tag/(\d+)', function ($id) {
    require 'controllers/tag/show.php';
});

/* delete tag */
$router->delete('tag/(\d+)', function ($id) {
    require 'controllers/tag/delete.php';
});

/* edit tag */
$router->get('tag/(\d+)/edit', function ($id) {
    require 'controllers/tag/edit.php';
});
$router->patch('tag/(\d+)', function ($id) {
    require 'controllers/tag/update.php';
});

/* list tags */
$router->get('tags', function () {
    require 'controllers/tag/index.php';
});

/*Users*/

/* create_account */
$router->get('users/create', function () {
    require 'controllers/users/create.php';
});
$router->post('users/store', function () {
    require 'controllers/users/store.php';
});

/* list users */
$router->get('users', function () {
    require 'controllers/users/index.php';
});

/* show users with id */
$router->get('users/(\d+)', function ($id) {
    require 'controllers/users/show.php';
});

/* delete user */
$router->delete('users/(\d+)', function ($id) {
    require 'controllers/users/delete.php';
});

/* edit user */
$router->get('users/(\d+)/edit', function ($id) {
    require 'controllers/users/edit.php';
});
$router->patch('users/(\d+)', function ($id) {
    require 'controllers/users/update.php';
});




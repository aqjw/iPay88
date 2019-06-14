<?php
$controller = app()->getNamespace() . 'Http\\Controllers\\IPay88Controller@receiver';

Route::any('backend-url', $controller)->name('iPay88.backend-url');
Route::any('response-url', $controller)->name('iPay88.response-url');

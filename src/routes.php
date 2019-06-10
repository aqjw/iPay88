<?php
$controller = app()->getNamespace() . 'Http\\Controllers\\IPay88Controller@receiver';

Route::any('backend-url', $controller)->name('iPay88.backend-url');
Route::any('response-url', $controller)->name('iPay88.response-url');

Route::get('test-payment-gateway', function() {
    dd(
        app('iPay88')
            ->setRefNo('A00000001')
            ->setProdDesc('Photo Print')
            ->setCustomer([
                'name' => 'John Tan',
                'email' => 'john@hotmail.com',
                'number' => '0126500100',
            ])
            ->setAmount(1.00)
            ->setCurrency('MYR')
            ->send()
    );
    exit;
});

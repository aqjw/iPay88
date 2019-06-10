<?php
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
            ->setResponseURL('http://o-0.site/callback/redtix')
            ->setBackendURL('http://o-0.site/callback/redtix')
            ->setAmount(1.00)
            ->setCurrency('MYR')
            ->send()
    );
    exit;
});

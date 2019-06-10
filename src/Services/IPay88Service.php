<?php

namespace Aqjw\IPay88\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class IPay88Service
{
    use TraitGetSet;

    private $client;
    private $form;

    /***/
    public function __construct()
    {
        // create guzzle instance with option
        $this->client = new Client([
            'base_uri' => $this->getUrl(),
            'http_errors' => false,
        ]);

        // set default value
        $this->form = [
            'MerchantCode' => config('iPay88.MerchantCode'),
            'PaymentId' => null,
            'RefNo' => null,
            'Amount' => null,
            'Currency' => config('iPay88.Currency'),
            'ProdDesc' => null,

            'UserName' => null,
            'UserEmail' => null,
            'UserContact' => null,

            'Remark' => null,
            'Lang' => config('iPay88.Charset'),

            'SignatureType' => 'SHA256',
            'Signature' => null,

            'ResponseURL' => null,
            'BackendURL' => null,
        ];
    }

    /**
     * Get URL to send a request to the payment system
     * @return string
     */
    private function getUrl()
    {
        return config('app.debug')
            ? config('iPay88.sandbox_url')
            : config('iPay88.realise_url');
    }

    /**
     * Make signature
     * @return self
     */
    private function makeSignature(): IPay88Service
    {
        $data = config('iPay88.MerchantKey')
            . $this->form['MerchantCode']
            . $this->form['RefNo']
            . strtr($this->form['Amount'], [',' => '', '.' => ''])
            . $this->form['Currency'];

        $this->form['Signature'] = hash('sha256', $data);

        return $this;
    }

    /**
     * Make backend url
     * @return self
     */
    private function makeBackendURL(): IPay88Service
    {
        if (empty($this->form['BackendURL'])) {
            $this->form['BackendURL'] = route('iPay88.backend-url');
        }

        return $this;
    }

    /**
     * Make response url
     * @return self
     */
    private function makeResponseURL(): IPay88Service
    {
        if (empty($this->form['ResponseURL'])) {
            $this->form['ResponseURL'] = route('iPay88.response-url');
        }

        return $this;
    }

    /**
     * Validate form
     * @return void
     * @throws Exception if the form contains invalid data
     */
    private function validate()
    {
        $required = [
            'MerchantCode', 'RefNo', 'Amount', 'Currency',
            'ProdDesc', 'UserName', 'UserEmail', 'UserContact',
            'SignatureType', 'Signature', 'ResponseURL', 'BackendURL',
        ];

        foreach ($this->form as $key => $value) {
            if (in_array($key, $required) && strlen($value) == 0) {
                throw new Exception("The {$key} can not be empty", 400);
            }
        }
    }

    public function send()
    {
        $this
            ->makeSignature()
            ->makeBackendURL()
            ->makeResponseURL()
            ->validate();

        $response = $this->client->post('', [
            RequestOptions::FORM_PARAMS => $this->form,
        ]);

        // return [
        //     $this->getData(),
        //     $response->getStatusCode(),
        //     $response->getHeaders(),
        //     $response->getBody()->getContents()
        // ];

 
        //////////
        // TODO //
        //////////

        echo "<form method='post' name='ePayment' action='{$this->getUrl()}'>";
        foreach ($this->form as $key => $value) {
            echo "<input name='{$key}' value='{$value}'>";
        }
        echo "<input type='submit'></form>";
        die;

        return $this->getData();
        // TODO - send form
    }
}

<?php

namespace Aqjw\IPay88\Services;

trait TraitGetSet
{
    /**
     * Set data into form
     * @param array $data
     * @return self
     */
    public function setData(array $data): IPay88Service
    {
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $this->form)) {
                $this->form[$key] = $value;
            }
        }

        return $this;
    }

    /**
     * Get data
     * @return array
     */
    public function getData(): array
    {
        return $this->form;
    }

    /**
     * Set Currency
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): IPay88Service
    {
        $surrencies = [
            'USD' => 25, 'GBP' => 35, 'THB' => 36,
            'CAD' => 37, 'SGD' => 38, 'AUD' => 39,
            'MYR' => null/*40*/, 'EUR' => 41, 'HKD' => 42,
        ];

        $currency = strtoupper($currency);

        if (array_key_exists($currency, $surrencies)) {
            $this->form['PaymentId'] = $surrencies[$currency];
            $this->form['Currency'] = $currency;
        }

        return $this;
    }

    /**
     * Set Customer
     * @param array $custommer
     * @return self
     */
    public function setCustomer(array $custommer): IPay88Service
    {
        $this->form['UserName'] = $custommer['name'] ?? null;
        $this->form['UserEmail'] = $custommer['email'] ?? null;
        $this->form['UserContact'] = $custommer['number'] ?? null;

        return $this;
    }

    /**
     * Set MerchantCode
     * @param string $merchantCode
     * @return self
     */
    public function setMerchantCode(string $merchantCode): IPay88Service
    {
        $this->form['MerchantCode'] = $merchantCode;

        return $this;
    }

    /**
     * Set RefNo
     * @param string $refNo
     * @return self
     */
    public function setRefNo(string $refNo): IPay88Service
    {
        $this->form['RefNo'] = $refNo;

        return $this;
    }

    /**
     * Set Amount
     * @param float $amount
     * @return self
     */
    public function setAmount( ? float $amount) : IPay88Service
    {
        $this->form['Amount'] = number_format($amount, 2, '.', ',');

        return $this;
    }

    /**
     * Set Product description
     * @param string $description
     * @return self
     */
    public function setProdDesc(string $description): IPay88Service
    {
        $this->form['ProdDesc'] = $description;

        return $this;
    }

    /**
     * Set Signature Type
     * @param string $signatureType
     * @return self
     */
    public function setSignatureType(string $signatureType): IPay88Service
    {
        $this->form['SignatureType'] = $signatureType;

        return $this;
    }

    /**
     * Set Response URL
     * @param string $responseURL
     * @return self
     */
    public function setResponseURL(string $responseURL): IPay88Service
    {
        $this->form['ResponseURL'] = $responseURL;

        return $this;
    }

    /**
     * Set Backend URL
     * @param string $backendURL
     * @return self
     */
    public function setBackendURL(string $backendURL): IPay88Service
    {
        $this->form['BackendURL'] = $backendURL;

        return $this;
    }

    /**
     * Set Remark
     * @param string $remark
     * @return self
     */
    public function setRemark(string $remark): IPay88Service
    {
        $this->form['Remark'] = $remark;

        return $this;
    }

    /**
     * Set Charset
     * @param string $charset
     * @return self
     */
    public function setCharset(string $charset): IPay88Service
    {
        $this->form['Lang'] = $charset;

        return $this;
    }
}

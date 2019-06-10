<?php

namespace Aqjw\IPay88\Controllers;

use Illuminate\Http\Request;

class ReceiverController
{
    /**
     * Receiving a request from the payment
     * @param  Request $request
     * @return mixed
     */
    public function receiver(Request $request)
    {
        $status = $request->get('Status', null);

        if ($status === null) {
            $this->another($request);
        } else if ($status == 1) {
            $this->then($request);
        } else {
            $this->catch($request);
        }
        
        return $this->after($request);
    }

    /**
     * This is the case when the payment was successful.
     * @param  Request $request
     */
    protected function then(Request $request)
    {
        /**
         * stub
         */
        logs()->info($request);
    }

    /**
     * This is the case when the payment failed.
     * @param  Request $request
     */
    protected function catch(Request $request)
    {
        /**
         * stub
         */
        logs()->info($request);
    }

    /**
     * This is the case when the status is not defined.
     * @param  Request $request
     */
    protected function another(Request $request)
    {
        /**
         * stub
         */
        logs()->info($request);
    }

    /**
     * Do something after processing data
     * @return mixed
     */
    protected function after(Request $request)
    {
        if ($request->route()->named('iPay88.backend-url')) {
            die('RECEIVEOK');
        } else {
            return redirect($this->redirect());
        }
    }

    /**
     * Url to redirect to another page
     * when the user has been redirected from the payment
     * @return string
     */
    protected function redirect(): string
    {
        /**
         * stub
         */
        return url('/');
    }
}

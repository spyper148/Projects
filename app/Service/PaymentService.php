<?php

namespace App\Service;

use YooKassa\Client;
use YooKassa\Common\Exceptions\ApiConnectionException;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\AuthorizeException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class PaymentService
{
    public function getClient():Client
    {
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));
        return $client;
    }

    /**
     * @param float $amount
     * @param string $description
     * @param array $options
     * @return string
     * @throws ApiConnectionException
     * @throws ApiException
     * @throws AuthorizeException
     * @throws BadApiRequestException
     * @throws ExtensionNotFoundException
     * @throws ForbiddenException
     * @throws InternalServerError
     * @throws NotFoundException
     * @throws ResponseProcessingException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    public function createPayment(float $amount, string $description, array $options = [])
    {
        $client = $this->getClient();
        $payment = $client->createPayment([
            'amount'=>[
                'value'=>$amount,
                'currency' => 'RUB'
            ],
            'capture'=>false,
            'confirmation' => [
                'type'=>'redirect',
                'return_url' => route('index'),
             ],
            'metadata'=> [
                'transaction_id' => $options['transaction_id']
            ],
            'description' => $description
        ],uniqid('',true));

        return $payment->getConfirmation()->getConfirmationUrl();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Enums\PaymentStatusEnum;
use App\Models\Transaction;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use YooKassa\Model\Notification\NotificationEventType;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;

class PaymentController
{
    public function index()
    {

    }

    public function create(Request $request, PaymentService $service)
    {
        $amount = $request->float('amount');
        $order_id = $request->order_id;
        $description = "Оплата за бронь";

        $transaction = Transaction::query()->create([
            'amount'=> $amount,
            'description' => $description,
            'order_id' => $order_id
        ]);

        if($transaction){
            $link = $service->createPayment($amount,$description,[
                'transaction_id'=>$transaction->id
            ]);
            return redirect()->away($link);
        }
    }
    public function callback(Request $request, PaymentService $service)
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source,true);
        Log::error($source);
        $notification = (isset($requestBody['event']) && $requestBody['event']=== NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);
        $payment = $notification->getObject();
        if(isset($payment->status) && $payment->status === 'waiting_for_capture'){
            $service->getClient()->capturePayment([
                'amount' => $payment->amount,
            ],$payment->id, uniqid('',true));
        }

        if(isset($payment->status) && $payment->status ==='succeeded'){
            if((bool)$payment->paid === true){
                $metadata = (object)$payment->metadata;
                if(isset($metadata->transaction_id)){
                    $transactionId = (int)$metadata->transaction_id;
                    $transaction = Transaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();
                }
            }
        }
    }
}

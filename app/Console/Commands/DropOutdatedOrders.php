<?php

namespace App\Console\Commands;

use App\Http\Enums\PaymentStatusEnum;
use App\Http\Enums\StatusEnum;
use App\Models\Order;
use Illuminate\Console\Command;

class DropOutdatedOrders extends Command
{
    protected $signature = 'order:drop-outdated';

    protected $description = 'Command description';

    public function handle()
    {

        Order::query()
            ->where('status', StatusEnum::ACCEPT)
            ->where(function ($q){
                $q
                    ->whereRelation('transaction','status',PaymentStatusEnum::CREATED)
                    ->orWhereDoesntHave('transaction');
            })
            ->where('created_at', '<', now()->subDay())
            ->delete();
    }
}

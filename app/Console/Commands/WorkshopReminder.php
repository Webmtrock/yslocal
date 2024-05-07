<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\PaymentMethod;
use Laravel\Cashier\Subscription;
use Stripe;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaymentSuccess;
use App\Helper\Helper;

class WorkshopReminder extends Command
{
  protected $signature = 'workshops:reminder';

  public function handle()
  {    
   log::info('Crone Testing'); 
   return 0;
  }
}

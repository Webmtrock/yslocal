<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\SendPaymentSuccess;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBlogNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param array $data
     */
    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->user->email) {
            Mail::to($this->user->email)->send(new SendPaymentSuccess($this->data));
        }
    }
}

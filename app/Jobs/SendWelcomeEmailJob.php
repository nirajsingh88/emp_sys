<?php

namespace App\Jobs;

use App\Models\Employees;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Employees $employee;

    public function __construct(Employees $employee)
    {
        $this->employee = $employee;
    }

    public function handle()
    {
        Log::info(sprintf(
            'Welcome email sent to %s (%s) - department_id: %d',
            $this->employee->name,
            $this->employee->email,
            $this->employee->department_id
        ));
    }
}

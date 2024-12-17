<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Add our Mailster check schedule
Artisan::command('schedule:run', function() {
    $schedule = $this->laravel->make(\Illuminate\Console\Scheduling\Schedule::class);
    
    $schedule->command('mailster:check')->everyFiveMinutes();
    
    $schedule->runScheduleHandler();
})->purpose('Run the scheduler');
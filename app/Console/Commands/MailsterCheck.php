<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MailsterCheck extends Command
{
    protected $signature = 'mailster:check';
    protected $description = 'Check Mailster endpoint status';

    public function handle()
    {
        try {
            $response = Http::get('https://humanhealthproject.org/mailster/54f4bd8ab411b806e7dc4d55c9ae90af');
            
            Log::info('Mailster check completed', [
                'status' => $response->status(),
                'response' => $response->body(),
                'timestamp' => now()
            ]);

            $this->info('Mailster check completed successfully');
            
        } catch (\Exception $e) {
            Log::error('Mailster check failed', [
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);
            
            $this->error('Mailster check failed: ' . $e->getMessage());
        }
    }
}
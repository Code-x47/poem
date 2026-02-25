<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected $baseUrl;
    protected $apiKey;
    protected $senderId;

    public function __construct()
    {
        $this->baseUrl = config('services.termii.base_url');
        $this->apiKey = config('services.termii.api_key');
        $this->senderId = config('services.termii.sender_id');
    }

  
   public function sendBulkSms(array $recipients, string $message)
    {
        foreach ($recipients as $phone) {
            try {
                $response = Http::retry(3, 1000) // Retry 3 times, wait 1 second between
                    ->timeout(10)
                    ->post($this->baseUrl . '/api/sms/send', [
                        'api_key' => $this->apiKey,
                        'to' => $phone,
                        'from' => $this->senderId,
                        'channel' => 'dnd',
                        'sms' => $message,
                        'type' => 'plain',
                        'channel' => 'generic',
                    ]);

                if (!$response->successful()) {
                    Log::error("Termii SMS failed for {$phone}", [
                        'status' => $response->status(),
                        'body' => $response->body(),
                    ]);
                } else {
                    Log::info("Termii SMS sent to {$phone}", [
                        'response' => $response->json(),
                    ]);
                }

            } catch (Exception $e) {
                Log::error("Error sending SMS to {$phone}: " . $e->getMessage(), [
                    'exception' => $e,
                ]);
            }
        }
    }




public function getSenderIds()
  {
    try {
        $response = Http::get('https://api.ng.termii.com/api/sender-id', [
            'api_key' => config('services.termii.api_key'),
        ]);

        if ($response->successful()) {
            return $response->json(); // returns array of sender IDs
        } else {
            Log::error('Failed to fetch sender IDs', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return null;
        }
    } catch (\Exception $e) {
        Log::error('Error fetching sender IDs: ' . $e->getMessage());
        return null;
    }
}








}

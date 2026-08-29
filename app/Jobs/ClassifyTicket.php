<?php

namespace App\Jobs;

use App\Models\Ticket;
use App\Services\AIClassifierService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ClassifyTicket implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Ticket $ticket)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(AIClassifierService $classifier): void
    {
        $result = $classifier->classify($this->ticket->subject, $this->ticket->description);
        \Log::info('AI Classification Result', $result ?? ['result was null' => true]);
        $this->ticket->update([
            'priority'=> $result['priority'],
            'category' => $result['category']
        ]);
    }
}

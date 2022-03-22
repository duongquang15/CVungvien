<?php

namespace App\Exports;

use App\Ticket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TicketsExport implements FromView
{
    public function __construct($tickets, $stt)
    {
        $this->tickets = $tickets;
        $this->stt = $stt;
    }

    public function view(): View
    {
        return view('fontend.tickets.ticket_table', [
            'tickets' => $this->tickets,
            'stt' => $this->stt,
        ]);
    }
}

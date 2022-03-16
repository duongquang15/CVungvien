<?php

namespace App\Exports;

use App\Ticket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TicketsExport implements FromView
{
    public function view(): View
    {
        return view('fontend.tickets.top_page', [
            'tickets' => Ticket::all()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\ClassifyTicket;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(){
        return view('tickets.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $ticket = Ticket::create($validated);

        ClassifyTicket::dispatch($ticket);

        return redirect()->route('tickets.index')->with('success', 'Ticket submitted! AI is classifying it now.');
    }

    public function index(){
        $tickets = Ticket::latest()->get();

        return view('tickets.index', compact('tickets'));
    }
}

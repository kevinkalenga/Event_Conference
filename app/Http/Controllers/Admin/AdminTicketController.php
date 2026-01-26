<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminTicketController extends Controller
{
    public function index()
    {
        // make relation with package and user both
        $tickets = Ticket::with(['package','user'])->get();
        return view('admin.ticket.index', compact('tickets'));
    }
}

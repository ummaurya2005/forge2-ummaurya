<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Ticket;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([

            'success' => true,

            'data' => [

                'organizations' => Organization::count(),

                'tickets' => Ticket::count(),

                'open_tickets' => Ticket::where('status', 'Open')->count(),

                'pending_tickets' => Ticket::where('status', 'Pending')->count(),

                'resolved_tickets' => Ticket::where('status', 'Resolved')->count(),

                'closed_tickets' => Ticket::where('status', 'Closed')->count(),

                'comments' => Comment::count(),

            ]

        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\TicketResource;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of tickets.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $tickets = Ticket::with([
                'organization',
                'customer',
                'assignedAgent'
            ])
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhere('priority', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created ticket.
     */
    public function store(StoreTicketRequest $request): JsonResponse
    {
        $ticket = Ticket::create($request->validated());

        $ticket->load([
            'organization',
            'customer',
            'assignedAgent'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket created successfully.',
            'data' => new TicketResource($ticket)
        ], 201);
    }

    /**
     * Display the specified ticket.
     */
    public function show(Ticket $ticket): JsonResponse
    {
        $ticket->load([
            'organization',
            'customer',
            'assignedAgent',
            'comments',
            'activityLogs'
        ]);

        return response()->json([
            'success' => true,
            'data' => new TicketResource($ticket)
        ]);
    }

    /**
     * Update the specified ticket.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket): JsonResponse
    {
        $ticket->update($request->validated());

        $ticket->load([
            'organization',
            'customer',
            'assignedAgent'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket updated successfully.',
            'data' => new TicketResource($ticket)
        ]);
    }

    /**
     * Remove the specified ticket.
     */
    public function destroy(Ticket $ticket): JsonResponse
    {
        $ticket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ticket deleted successfully.'
        ]);
    }
}
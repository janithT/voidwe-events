<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Services\EventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    // List events
    public function index(Request $request): JsonResponse
    {
        $event = $this->eventService->getEvents($request->only(['tenant_key', 'device_uid', 'type']));

        if ($event && $event->status) {
            return apiResponseWithStatusCode($event->data, 'success', $event->message, '', 200);
        }

        return apiResponseWithStatusCode($event->data, 'error', $event->message, '', 422); // or 500
        
    }

    // Store invents
    public function store(StoreEventRequest $request): JsonResponse
    {
        $event = $this->eventService->storeEvents($request->validated());

        if ($event && $event->status) {
            return apiResponseWithStatusCode($event->data, 'success', $event->message, '', 200);
        }

        return apiResponseWithStatusCode($event->data, 'error', $event->message, '', 422); // or 500
    }
}

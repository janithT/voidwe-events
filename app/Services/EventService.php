<?php

namespace App\Services;

use App\Jobs\ProcessEventJob;
use App\Models\Event;
use Exception;
use Illuminate\Database\QueryException;

class EventService
{
    public $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    // Store events
    public function storeEvents(array $data): Object
    {
        try {
            $event = $this->event->createEvents($data);

            // Deispatch the job
            if ($event->wasRecentlyCreated) {
                ProcessEventJob::dispatch($event);
            }

            return apiServiceResponse($event, true, 'Event created successfully');
        } catch (QueryException $e) {
            // Duplicate (tenant_key, event_uid)
            if ($e->getCode() === '23000') {
                $eventOld = $this->event->duplicateCheck($data['tenant_key'], $data['event_uid']);
                return apiServiceResponse($eventOld, true, 'Event created successfully');
            }
            return apiServiceResponse([], false, $e->getMessage());
        }
    }

    // Get events

    public function getEvents($filters): Object
    {
        try {

            $events = $this->event->getEvents($filters);

            return apiServiceResponse($events, true, 'Events loaded successfully');
        } catch (Exception $e) {
            return apiServiceResponse([], false, $e->getMessage());
        }
    }
}

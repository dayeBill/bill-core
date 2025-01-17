<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Domain\Models\Event;
use DayeBill\BillCore\UI\Http\Requests\EventRequest;
use DayeBill\BillCore\UI\Http\Resources\EventResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use function DayeBill\BillCore\Http\Controllers\response;

class EventController
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Event::class);

        return EventResource::collection(Event::all());
    }

    public function store(EventRequest $request)
    {
        $this->authorize('create', Event::class);

        return new EventResource(Event::create($request->validated()));
    }

    public function show(Event $event)
    {
        $this->authorize('view', $event);

        return new EventResource($event);
    }

    public function update(EventRequest $request, Event $event)
    {
        $this->authorize('update', $event);

        $event->update($request->validated());

        return new EventResource($event);
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return response()->json();
    }
}

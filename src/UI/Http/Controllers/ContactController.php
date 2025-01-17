<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\UI\Http\Requests\ContactRequest;
use DayeBill\BillCore\UI\Http\Resources\ContactResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ContactController
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Contact::class);

        return ContactResource::collection(Contact::all());
    }

    public function store(ContactRequest $request)
    {
        $this->authorize('create', Contact::class);

        return new ContactResource(Contact::create($request->validated()));
    }

    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);

        return new ContactResource($contact);
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $contact->update($request->validated());

        return new ContactResource($contact);
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);

        $contact->delete();

        return response()->json();
    }
}

<?php

namespace DayeBill\BillCore\Policies;

use App\User;
use DayeBill\BillCore\Domain\Models\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Contact $contact)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Contact $contact)
    {
    }

    public function delete(User $user, Contact $contact)
    {
    }

    public function restore(User $user, Contact $contact)
    {
    }

    public function forceDelete(User $user, Contact $contact)
    {
    }
}

<?php

namespace DayeBill\BillCore\Policies;

use App\User;
use DayeBill\BillCore\Domain\Models\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;
use RedJasmine\Support\Contracts\UserInterface;

class ContactPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user)
    {
        return true;
    }

    public function view(UserInterface $user, Contact $contact)
    {
        return true;
    }

    public function create(UserInterface $user)
    {
        return true;
    }

    public function update(UserInterface $user, Contact $contact)
    {
        return true;
    }

    public function delete(UserInterface $user, Contact $contact)
    {
        return true;
    }

    public function restore(UserInterface $user, Contact $contact)
    {
        return true;
    }

    public function forceDelete(UserInterface $user, Contact $contact)
    {
        return true;
    }
}

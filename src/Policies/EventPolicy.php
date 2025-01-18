<?php

namespace DayeBill\BillCore\Policies;

use App\User;
use DayeBill\BillCore\Domain\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;
use RedJasmine\Support\Contracts\UserInterface;

class EventPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user)
    {
        return true;
    }

    public function view(UserInterface $user, Event $event)
    {
        return true;
    }

    public function create(UserInterface $user)
    {
        return true;
    }

    public function update(UserInterface $user, Event $event)
    {
        return true;
    }

    public function delete(UserInterface $user, Event $event)
    {
        return true;
    }

    public function restore(UserInterface $user, Event $event)
    {
        return true;
    }

    public function forceDelete(UserInterface $user, Event $event)
    {
        return true;
    }
}

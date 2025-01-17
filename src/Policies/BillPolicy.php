<?php

namespace DayeBill\BillCore\Policies;

use App\User;
use DayeBill\BillCore\Domain\Models\Bill;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Bill $bill)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Bill $bill)
    {
    }

    public function delete(User $user, Bill $bill)
    {
    }

    public function restore(User $user, Bill $bill)
    {
    }

    public function forceDelete(User $user, Bill $bill)
    {
    }
}

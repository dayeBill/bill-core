<?php

namespace DayeBill\BillCore\Policies;


use DayeBill\BillCore\Domain\Models\Bill;
use Illuminate\Auth\Access\HandlesAuthorization;
use RedJasmine\Support\Contracts\UserInterface;

class BillPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user)
    {

        return true;

    }

    public function view(UserInterface $user, Bill $bill)
    {
    }

    public function create(UserInterface $user)
    {
    }

    public function update(UserInterface $user, Bill $bill)
    {
    }

    public function delete(UserInterface $user, Bill $bill)
    {
    }

    public function restore(UserInterface $user, Bill $bill)
    {
    }

    public function forceDelete(UserInterface $user, Bill $bill)
    {
    }
}

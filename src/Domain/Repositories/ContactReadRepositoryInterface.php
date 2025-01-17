<?php

namespace DayeBill\BillCore\Domain\Repositories;

use Illuminate\Database\Eloquent\Model;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Domain\Repositories\ReadRepositoryInterface;

interface ContactReadRepositoryInterface extends ReadRepositoryInterface
{

    public function findByIdInOwner(UserInterface $owner, int $id) : ?Model;

}

<?php

namespace DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql;

use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Infrastructure\ReadRepositories\QueryBuilderReadRepository;

class ContactReadRepository extends QueryBuilderReadRepository implements ContactReadRepositoryInterface
{
    /**
     *
     * @var $modelClass class-string
     */
    protected static string $modelClass = Contact::class;

    public function findByIdInOwner(UserInterface $owner, int $id) : ?Model
    {
        return $this->query(null)->where([
            'owner_type' => $owner->getType(),
            'owner_id'   => (string) $owner->getId(),
        ])->where('id', $id)->first();
    }

    public function findByNameInOwner(UserInterface $owner, string $name) : ?Model
    {
        return $this->query(null)->where([
            'owner_type' => $owner->getType(),
            'owner_id'   => (string) $owner->getId(),
        ])->where('name', $name)->first();

    }


}

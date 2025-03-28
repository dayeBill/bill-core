<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Application\Services\Contact\Commands\ContactCreateCommand;
use DayeBill\BillCore\Application\Services\Contact\ContactApplicationService;
use DayeBill\BillCore\Domain\Data\ContactData as Data;
use DayeBill\BillCore\Domain\Models\Contact as Model;
use DayeBill\BillCore\UI\Http\Requests\ContactRequest as Request;
use DayeBill\BillCore\UI\Http\Resources\ContactResource as Resource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use RedJasmine\Support\Http\Controllers\Controller;
use RedJasmine\Support\UI\Http\Controllers\RestControllerActions;


class ContactController extends Controller
{
    public function __construct(

        protected ContactApplicationService $service,
    ) {
        $this->service->readRepository->withQuery(function ($query) {
            $query->onlyOwner($this->getOwner());
        });
    }

    use AuthorizesRequests;


    protected static string $modelClass         = Model::class;
    protected static string $resourceClass      = Resource::class;
    protected static string $dataClass          = Data::class;
    protected static string $createCommandClass = ContactCreateCommand::class;
    use RestControllerActions {
        store as coreStore;
        update as coreUpdate;
    }

    public function store(Request $request)
    {
        return $this->coreStore($request);
    }

    public function update($id, Request $request)
    {
        return $this->coreUpdate($id, $request);
    }

    public function enums()
    {
        $data = [];

        $data['relationTypes'] = Arr::map(Config::get('bill-core.contact-relations', []), function ($item) {
            return [
                'label' => $item,
                'value' => $item,
                'icon'  => null
            ];
        });
        return static::success($data);
    }

}

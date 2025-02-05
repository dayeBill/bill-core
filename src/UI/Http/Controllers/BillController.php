<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Application\Services\Bill\BillCommandService;
use DayeBill\BillCore\Application\Services\Bill\BillQueryService;
use DayeBill\BillCore\Application\Services\Bill\Commands\BillCreateCommand;
use DayeBill\BillCore\Domain\Data\BillData as Data;
use DayeBill\BillCore\Domain\Models\Bill as Model;
use DayeBill\BillCore\UI\Http\Requests\BillRequest as Request;
use DayeBill\BillCore\UI\Http\Resources\BillResource as Resource;
use RedJasmine\Support\Http\Controllers\Controller;
use RedJasmine\Support\UI\Http\Controllers\RestControllerActions;
use function DayeBill\BillCore\Http\Controllers\response;

class BillController extends Controller
{
    public function __construct(
        protected BillQueryService $queryService,
        protected BillCommandService $commandService,

    ) {
        $this->queryService->getRepository()->withQuery(function ($query) {
            $query->onlyOwner($this->getOwner());
        });
    }


    protected static string $modelClass      = Model::class;
    protected static string $resourceClass   = Resource::class;
    protected static string $dataClass       = Data::class;
    protected static string $createDataClass = BillCreateCommand::class;
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
}

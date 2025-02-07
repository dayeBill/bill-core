<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Application\Services\Event\EventCommandService;
use DayeBill\BillCore\Application\Services\Event\EventQueryService;
use DayeBill\BillCore\Domain\Data\EventData as Data;
use DayeBill\BillCore\Domain\Models\Enums\EventTypeEnum;
use DayeBill\BillCore\Domain\Models\Event as Model;
use DayeBill\BillCore\UI\Http\Requests\EventRequest as Request;
use DayeBill\BillCore\UI\Http\Resources\EventResource as Resource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use RedJasmine\Support\Http\Controllers\Controller;
use RedJasmine\Support\UI\Http\Controllers\RestControllerActions;
use function DayeBill\BillCore\Http\Controllers\response;

class EventController extends Controller
{
    use AuthorizesRequests;


    public function __construct(
        protected EventQueryService $queryService,
        protected EventCommandService $commandService,
    ) {
        $this->queryService->getRepository()->withQuery(function ($query) {
            $query->onlyOwner($this->getOwner());
        });
    }

    protected static string $modelClass    = Model::class;
    protected static string $resourceClass = Resource::class;
    protected static string $dataClass     = Data::class;
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


    public function options(\Illuminate\Http\Request $request)
    {

        $data = [];

        $data['eventTypes'] = EventTypeEnum::lists();

        return static::success($data);
    }
}

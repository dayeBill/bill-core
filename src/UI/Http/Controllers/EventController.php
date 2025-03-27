<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Application\Services\Event\EventApplicationService;
use DayeBill\BillCore\Domain\Data\EventData as Data;
use DayeBill\BillCore\Domain\Models\Enums\EventTypeEnum;
use DayeBill\BillCore\Domain\Models\Event as Model;
use DayeBill\BillCore\UI\Http\Requests\EventRequest as Request;
use DayeBill\BillCore\UI\Http\Resources\EventResource as Resource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use RedJasmine\Support\Http\Controllers\Controller;
use RedJasmine\Support\UI\Http\Controllers\RestControllerActions;


class EventController extends Controller
{
    use AuthorizesRequests;


    public function __construct(

        protected EventApplicationService $service,
    ) {
        $this->service->readRepository->withQuery(function ($query) {
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


    public function enums(\Illuminate\Http\Request $request)
    {

        $data = [];

        $data['eventTypes'] = EventTypeEnum::lists();
        $data['colors']     = Arr::map(Config::get('bill-core.event-colors', []), function ($item) {
            return [
                'label' => $item,
                'value' => $item,
                'icon'  => null
            ];
        });
        return static::success($data);
    }
}

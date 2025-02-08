<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Application\Services\Bill\BillCommandService;
use DayeBill\BillCore\Application\Services\Bill\BillQueryService;
use DayeBill\BillCore\Application\Services\Bill\Commands\BillCreateCommand;
use DayeBill\BillCore\Application\Services\Bill\Queries\BillPaginateQuery;
use DayeBill\BillCore\Domain\Data\BillData as Data;
use DayeBill\BillCore\Domain\Models\Bill as Model;
use DayeBill\BillCore\UI\Http\Requests\BillRequest as Request;
use DayeBill\BillCore\UI\Http\Resources\BillResource as Resource;
use Illuminate\Support\Facades\Config;
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


    protected static string $modelClass         = Model::class;
    protected static string $resourceClass      = Resource::class;
    protected static string $dataClass          = Data::class;
    protected static string $createCommandClass = BillCreateCommand::class;
    protected static string $paginateQueryClass = BillPaginateQuery::class;
    use RestControllerActions {
        store as coreStore;
        update as coreUpdate;
    }

    public function store(Request $request)
    {
        $billTime = $request->input('bill_time');
        // 判断时间是否有时分秒
        if (!str_contains($billTime, ':')) {
            $request->offsetSet('bill_time', $billTime.' '.date('H:i:s'));
        }

        return $this->coreStore($request);
    }

    public function update($id, Request $request)
    {
        return $this->coreUpdate($id, $request);
    }


    public function options(\Illuminate\Http\Request $request)
    {

        $data               = [];
        $data['categories'] = Config::get('bill-core.categories', []);

        return static::success($data);
    }
}

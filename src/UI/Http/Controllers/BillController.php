<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Application\Services\Bill\BillQueryService;
use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\UI\Http\Requests\BillRequest;
use DayeBill\BillCore\UI\Http\Resources\BillResource;
use Illuminate\Http\Request;
use RedJasmine\Support\Domain\Data\Queries\PaginateQuery;
use RedJasmine\Support\Http\Controllers\Controller;
use function DayeBill\BillCore\Http\Controllers\response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BillController extends Controller
{
    public function __construct(
        protected BillQueryService $queryService
    ) {
        $this->queryService->getRepository()->withQuery(function ($query) {
            $query->onlyOwner($this->getOwner());
        });
    }

    public function index(Request $request) : AnonymousResourceCollection
    {
        $this->authorize('viewAny', Bill::class);

        $result = $this->queryService->paginate(PaginateQuery::from($request->query()));
        return BillResource::collection($result->appends($request->query()));
    }

    public function store(BillRequest $request) : BillResource
    {
        $this->authorize('create', Bill::class);

        return new BillResource(Bill::create($request->validated()));
    }

    public function show(Bill $bill) : BillResource
    {
        $this->authorize('view', $bill);

        return new BillResource($bill);
    }

    public function update(BillRequest $request, Bill $bill) : BillResource
    {
        $this->authorize('update', $bill);

        $bill->update($request->validated());

        return new BillResource($bill);
    }

    public function destroy(Bill $bill)
    {
        $this->authorize('delete', $bill);

        $bill->delete();

        return response()->json();
    }
}

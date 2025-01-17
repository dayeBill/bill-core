<?php

namespace DayeBill\BillCore\UI\Http\Controllers;

use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\UI\Http\Requests\BillRequest;
use DayeBill\BillCore\UI\Http\Resources\BillResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use function DayeBill\BillCore\Http\Controllers\response;

class BillController
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Bill::class);

        return BillResource::collection(Bill::all());
    }

    public function store(BillRequest $request)
    {
        $this->authorize('create', Bill::class);

        return new BillResource(Bill::create($request->validated()));
    }

    public function show(Bill $bill)
    {
        $this->authorize('view', $bill);

        return new BillResource($bill);
    }

    public function update(BillRequest $request, Bill $bill)
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

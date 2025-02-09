<?php

namespace DayeBill\BillCore\Application\Services\Bill\Queries;

use DayeBill\BillCore\Application\Services\Bill\BillQueryService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use RedJasmine\Support\Application\QueryHandlers\QueryHandler;

class BillSummaryQueryHandler extends QueryHandler
{

    public function __construct(
        protected BillQueryService $service

    ) {
    }


    public function handle(BillSummaryQuery $query) : array
    {
        $repository = $this->service->repository;


        $query = $repository->query($query->except('month'))
                            ->whereBetween('bill_time', [
                                $query->month->startOfMonth()->toDateTimeString(),
                                $query->month->endOfMonth()->toDateTimeString(),
                            ]);

        $billTypes = $query->select('bill_type', DB::raw('SUM(amount_value) as amount_value'))
                           ->groupBy('bill_type')
                           ->get();


        // 按 分类统计

        $billCategory = $query
            ->select('bill_type', 'bill_category', DB::raw('SUM(amount_value) as amount_value'))
            ->groupBy('bill_category', 'bill_type')
            ->orderBy('bill_type', 'desc')
            ->orderBy('amount_value', 'desc')
            ->get();


        return [
            'summary'    => Arr::pluck($billTypes->toArray(), 'amount_value', 'bill_type'),
            'categories' => $billCategory->toArray()
        ];

    }

}
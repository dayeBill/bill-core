<?php

namespace DayeBill\BillCore\Domain\Models\Enums;

use RedJasmine\Support\Helpers\Enums\EnumsHelper;

/**
 * 账单类型
 */
enum BillTypeEnum: string
{
    use EnumsHelper;

    case INCOME = 'income'; //
    case EXPENSE = 'expense';

    public static function labels() : array
    {
        return [
            self::INCOME->value  => '收入',
            self::EXPENSE->value => '支出',
        ];
    }


}

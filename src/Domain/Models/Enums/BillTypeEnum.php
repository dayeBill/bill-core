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
    case RECEIVE_GIFT = 'receive_gift';
    case GIVE_GIFT = 'give_gift';

    public static function labels() : array
    {
        return [

            self::RECEIVE_GIFT->value => '收礼',
            self::GIVE_GIFT->value    => '送礼',
            self::INCOME->value       => '收入',
            self::EXPENSE->value      => '支出',
        ];
    }


}

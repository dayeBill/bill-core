<?php

namespace DayeBill\BillCore\Domain\Models\Enums;

use RedJasmine\Support\Helpers\Enums\EnumsHelper;

enum ContactRelationTypeEnum: string
{
    use EnumsHelper;

    // 同学、朋友、同事、领导、其他、亲戚
    case RELATIVE = 'relative';
    case CLASSMATE = 'classmate';
    case FRIEND = 'friend';
    case COLLEAGUE = 'colleague';
    case LEADER = 'leader';
    case OTHER = 'other';

    public static function colors() : array
    {
        return [
            self::CLASSMATE->value => 'success',//'同学',
            self::FRIEND->value    => 'danger',//'朋友',
            self::COLLEAGUE->value => 'primary',//'同事',
            self::LEADER->value    => 'warning',//'领导',
            self::RELATIVE->value  => 'warning',//'亲戚',
            self::OTHER->value     => 'primary',//'其他',
        ];

        // 'success',
        //     'danger',
        //     'primary',
        //     'warning',
    }

    public static function labels() : array
    {
        return [
            self::CLASSMATE->value => '同学',
            self::FRIEND->value    => '朋友',
            self::COLLEAGUE->value => '同事',
            self::LEADER->value    => '领导',
            self::RELATIVE->value  => '亲戚',
            self::OTHER->value     => '其他',
        ];
    }
}

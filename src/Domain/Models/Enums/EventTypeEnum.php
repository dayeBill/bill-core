<?php

namespace DayeBill\BillCore\Domain\Models\Enums;

use RedJasmine\Support\Helpers\Enums\EnumsHelper;

enum EventTypeEnum: string
{
    use EnumsHelper;

    public static function colors() : array
    {

        // 'success',
        //     'danger',
        //     'primary',
        //     'warning',
        return [
            self::MARRY->value        => 'danger',
            self::BIRTHDAY->value     => 'danger',
            self::DEATH->value        => 'warning',
            self::GRADUATE->value     => 'warning',
            self::FULL_MOON->value    => 'success',
            self::HOUSEWARMING->value => 'success',
            self::OTHER->value        => 'primary',
        ];
    }

    // 结婚、生日、离世、升学、满月、周岁、乔迁、其他
    case MARRY = 'marry';
    case BIRTHDAY = 'birthday';
    case DEATH = 'death';
    case GRADUATE = 'graduate';
    case FULL_MOON = 'full_moon';
    case HOUSEWARMING = 'housewarming';
    case OTHER = 'other';

    public static function labels() : array
    {
        return [
            self::MARRY->value        => '婚宴',
            self::BIRTHDAY->value     => '生日宴',
            self::DEATH->value        => '丧宴',
            self::GRADUATE->value     => '升学宴',
            self::FULL_MOON->value    => '满月酒',
            self::HOUSEWARMING->value => '乔迁',
            self::OTHER->value        => '其他',
        ];

    }

}

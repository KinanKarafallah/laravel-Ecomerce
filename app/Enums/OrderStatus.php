<?php
/**
 * User: Zura
 * Date: 9/17/2022
 * Time: 6:34 AM
 */

namespace App\Enums;


/**
 * Class OrderStatus
 *
 * @package App\Enums
 */
enum OrderStatus: string
{
    case Unpaid = 'unpaid';
    case Paid = 'paid';
    case Failed = 'failed';
    case Cancelled = 'cancelled';
    case Shipped = 'shipped';
    case Completed = 'completed';

    public static function getStatuses()
    {
        return [
            self::Paid, self::Unpaid, self::Failed ,self::Cancelled, self::Shipped, self::Completed
        ];
    }
}
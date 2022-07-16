<?php


namespace App\Enums;

class OrderStatusEnum extends BaseEnum
{
    public const PENDING = 'pending';
    public const PROCESSING = 'processing';
    public const COMPLETED = 'completed';
    public const CANCELLED = 'cancelled';
}

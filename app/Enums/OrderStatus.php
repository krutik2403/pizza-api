<?php

namespace App\Enums;

class OrderStatus
{
    const PENDING 	 = "pending";
    const PROCESSING = "processing";
    const DISPATCHED = "dispatched";
    const DELIVERED  = "delivered";
    const FAILED 	 = "faled";
    const ONHOLD 	 = "hold";
}

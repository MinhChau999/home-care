<?php


namespace App\Enums;

enum StatusBookingEnum: int
{
   case Waiting = 0;
   case Accept = 1;
   case Reject = 2;
   case Done = 3;
}

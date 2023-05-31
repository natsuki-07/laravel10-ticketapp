<?php

namespace App\Enum;

enum TicketStatus: string
{
  case OPEN = 'open';
  case RESOLVED = 'resolved';
  case REJECTED = 'rejected';
}
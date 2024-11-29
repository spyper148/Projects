<?php

namespace App\Http\Enums;

enum StatusEnum:string
{
    case ACCEPT = "Принят";
    case DENY = "Отклонен";
    case COMPLETED = "Выполнен";
}

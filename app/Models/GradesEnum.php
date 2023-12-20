<?php

declare(strict_types=1);

namespace App\Models;

enum GradesEnum: string
{
    case A_PLUS  = 'A+';
    case A       = 'A';
    case A_MINUS = 'A-';
    case B_PLUS  = 'B+';
    case B       = 'B';
    case B_MINUS = 'B-';
    case C_PLUS  = 'C+';
    case C       = 'C';
    case C_MINUS = 'C-';
    case D_PLUS  = 'D+';
    case D       = 'D';
    case D_MINUS = 'D-';
    case F       = 'F';
}

<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Enum;

enum StringBackedEnum: string {
    case A = 'a';
    case B = 'b';
}

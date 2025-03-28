<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Enum;

enum IntBackedEnum: int {
    case One = 1;
    case Two = 2;
}

<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Rules\Number;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Rules\Number\LessThanOrEqual;

#[CoversClass(LessThanOrEqual::class)]
class LessThanOrEqualTest extends TestCase {
    public function testIsValid(): void {
        $between = new LessThanOrEqual(5);

        static::assertTrue($between->isValid(-INF));
        static::assertTrue($between->isValid(-PHP_INT_MAX));
        static::assertTrue($between->isValid(-6));
        static::assertTrue($between->isValid(-5));
        static::assertTrue($between->isValid(0));
        static::assertTrue($between->isValid(5));
        static::assertFalse($between->isValid(6));
        static::assertFalse($between->isValid(PHP_INT_MAX));
        static::assertFalse($between->isValid(INF));
    }
}

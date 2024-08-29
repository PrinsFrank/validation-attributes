<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Number;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Number\LessThan;

#[CoversClass(LessThan::class)]
class LessThanTest extends TestCase {
    public function testIsValid(): void {
        $between = new LessThan(5);

        static::assertTrue($between->isValid(-INF));
        static::assertTrue($between->isValid(-PHP_INT_MAX));
        static::assertTrue($between->isValid(-6));
        static::assertTrue($between->isValid(-5));
        static::assertTrue($between->isValid(0));
        static::assertFalse($between->isValid(5));
        static::assertFalse($between->isValid(6));
        static::assertFalse($between->isValid(PHP_INT_MAX));
        static::assertFalse($between->isValid(INF));
    }
}

<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Number;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Number\LargerThan;

#[CoversClass(LargerThan::class)]
class LargerThanTest extends TestCase {
    public function testIsValid(): void {
        $between = new LargerThan(-5);

        static::assertFalse($between->isValid(-INF));
        static::assertFalse($between->isValid(-PHP_INT_MAX));
        static::assertFalse($between->isValid(-6));
        static::assertFalse($between->isValid(-5));
        static::assertTrue($between->isValid(0));
        static::assertTrue($between->isValid(5));
        static::assertTrue($between->isValid(6));
        static::assertTrue($between->isValid(PHP_INT_MAX));
        static::assertTrue($between->isValid(INF));
    }
}

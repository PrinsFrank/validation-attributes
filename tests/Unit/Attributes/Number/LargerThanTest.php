<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Number;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Number\LargerThan;

#[CoversClass(LargerThan::class)]
class LargerThanTest extends TestCase {
    public function testIsValid(): void {
        $between = new LargerThan(-5);

        static::assertFalse($between->isValid(-INF, (object) []));
        static::assertFalse($between->isValid(-PHP_INT_MAX, (object) []));
        static::assertFalse($between->isValid(-6, (object) []));
        static::assertFalse($between->isValid(-5, (object) []));
        static::assertTrue($between->isValid(0, (object) []));
        static::assertTrue($between->isValid(5, (object) []));
        static::assertTrue($between->isValid(6, (object) []));
        static::assertTrue($between->isValid(PHP_INT_MAX, (object) []));
        static::assertTrue($between->isValid(INF, (object) []));
    }
}

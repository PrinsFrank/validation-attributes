<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Tests\Unit\Rules\Number;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationRules\Exception\InvalidArgumentException;
use PrinsFrank\ValidationRules\Rules\Number\Between;

#[CoversClass(Between::class)]
class BetweenTest extends TestCase {
    /** @throws InvalidArgumentException */
    public function testIsValid(): void {
        $between = new Between(-5, 5);

        static::assertFalse($between->isValid(-INF));
        static::assertFalse($between->isValid(-PHP_INT_MAX));
        static::assertFalse($between->isValid(-6));
        static::assertTrue($between->isValid(-5));
        static::assertTrue($between->isValid(0));
        static::assertTrue($between->isValid(5));
        static::assertFalse($between->isValid(6));
        static::assertFalse($between->isValid(PHP_INT_MAX));
        static::assertFalse($between->isValid(INF));
    }

    /** @throws InvalidArgumentException */
    public function testIsValidThrowsExceptionOnInverseRange(): void {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('Lower bound is higher than upper bound');
        new Between(5, -5);
    }
}

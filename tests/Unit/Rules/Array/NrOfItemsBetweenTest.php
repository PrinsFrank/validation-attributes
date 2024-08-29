<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Rules\Array;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;
use PrinsFrank\ValidationAttributes\Rules\Array\NrOfItemsBetween;

#[CoversClass(NrOfItemsBetween::class)]
class NrOfItemsBetweenTest extends TestCase {
    /** @throws InvalidArgumentException */
    public function testIsValid(): void {
        $nrOfItems = new NrOfItemsBetween(0, 1);
        static::assertTrue($nrOfItems->isValid([]));
        static::assertTrue($nrOfItems->isValid([null]));
        static::assertFalse($nrOfItems->isValid([null, null]));

        $nrOfItems = new NrOfItemsBetween(1, 1);
        static::assertFalse($nrOfItems->isValid([]));
        static::assertTrue($nrOfItems->isValid([null]));
        static::assertFalse($nrOfItems->isValid([null, null]));

        $nrOfItems = new NrOfItemsBetween(1, 2);
        static::assertFalse($nrOfItems->isValid([]));
        static::assertTrue($nrOfItems->isValid([null]));
        static::assertTrue($nrOfItems->isValid([null, null]));
    }

    /** @throws InvalidArgumentException */
    public function testIsValidThrowsExceptionOnNegativeCount(): void {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('Nr of items cannot be smaller than zero');
        /** @phpstan-ignore argument.type */
        new NrOfItemsBetween(-1, 0);
    }

    /** @throws InvalidArgumentException */
    public function testIsValidThrowsExceptionOnInverseRange(): void {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('Lower bound is higher than upper bound');
        new NrOfItemsBetween(10, 1);
    }
}

<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;
use PrinsFrank\ValidationAttributes\Attributes\String\StartWith;

#[CoversClass(StartWith::class)]
class StartWithTest extends TestCase {
    /** @throws InvalidArgumentException */
    public function testIsValid(): void {
        $startWith = new StartWith('a');
        static::assertFalse($startWith->isValid('b'));
        static::assertFalse($startWith->isValid('bba'));
        static::assertTrue($startWith->isValid('a'));
        static::assertTrue($startWith->isValid('ab'));
    }

    /** @throws InvalidArgumentException */
    public function testConstructThrowsExceptionOnEmptyString(): void {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('All strings start with an empty string');
        /** @phpstan-ignore argument.type */
        new StartWith('');
    }
}

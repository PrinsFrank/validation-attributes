<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;
use PrinsFrank\ValidationAttributes\Attributes\String\Contain;

#[CoversClass(Contain::class)]
class ContainTest extends TestCase {
    /** @throws InvalidArgumentException */
    public function testIsValid(): void {
        $contain = new Contain('a');

        static::assertFalse($contain->isValid('', (object) []));
        static::assertFalse($contain->isValid('b', (object) []));
        static::assertTrue($contain->isValid('a', (object) []));
        static::assertTrue($contain->isValid('bab', (object) []));

        $contain = new Contain('abc');
        static::assertFalse($contain->isValid('cba', (object) []));
        static::assertFalse($contain->isValid('bca', (object) []));
        static::assertTrue($contain->isValid('abc', (object) []));
        static::assertTrue($contain->isValid('cabca', (object) []));
    }

    /** @throws InvalidArgumentException */
    public function testConstructThrowsExceptionOnEmptyString(): void {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('All strings contain an empty string');
        /** @phpstan-ignore argument.type */
        new Contain('');
    }
}

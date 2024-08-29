<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Rules\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;
use PrinsFrank\ValidationAttributes\Rules\String\Contain;

#[CoversClass(Contain::class)]
class ContainTest extends TestCase {
    /** @throws InvalidArgumentException */
    public function testIsValid(): void {
        $contain = new Contain('a');

        static::assertFalse($contain->isValid(''));
        static::assertFalse($contain->isValid('b'));
        static::assertTrue($contain->isValid('a'));
        static::assertTrue($contain->isValid('bab'));

        $contain = new Contain('abc');
        static::assertFalse($contain->isValid('cba'));
        static::assertFalse($contain->isValid('bca'));
        static::assertTrue($contain->isValid('abc'));
        static::assertTrue($contain->isValid('cabca'));
    }

    /** @throws InvalidArgumentException */
    public function testConstructThrowsExceptionOnEmptyString(): void {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('All strings contain an empty string');
        /** @phpstan-ignore argument.type */
        new Contain('');
    }
}

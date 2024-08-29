<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Rules\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;
use PrinsFrank\ValidationAttributes\Rules\String\EndWith;

#[CoversClass(EndWith::class)]
class EndWithTest extends TestCase {
    /** @throws InvalidArgumentException */
    public function testIsValid(): void {
        $endWith = new EndWith('a');
        static::assertFalse($endWith->isValid('b'));
        static::assertFalse($endWith->isValid('bbb'));
        static::assertTrue($endWith->isValid('a'));
        static::assertTrue($endWith->isValid('bba'));
    }

    /** @throws InvalidArgumentException */
    public function testConstructThrowsExceptionOnEmptyString(): void {
        static::expectException(InvalidArgumentException::class);
        static::expectExceptionMessage('All strings end with an empty string');
        /** @phpstan-ignore argument.type */
        new EndWith('');
    }
}

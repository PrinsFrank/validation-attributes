<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\String\AlphaNumeric;

#[CoversClass(AlphaNumeric::class)]
class AlphaNumericTest extends TestCase {
    public function testIsValid(): void {
        $alpha = new AlphaNumeric();

        static::assertFalse($alpha->isValid('-'));
        static::assertFalse($alpha->isValid('&'));
        static::assertTrue($alpha->isValid('42'));
        static::assertFalse($alpha->isValid('{}'));
        static::assertTrue($alpha->isValid('foo'));
        static::assertTrue($alpha->isValid('FOO'));
        static::assertTrue($alpha->isValid('FOO42'));
    }
}

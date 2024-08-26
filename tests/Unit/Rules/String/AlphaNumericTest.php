<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Tests\Unit\Rules\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationRules\Rules\String\AlphaNumeric;

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

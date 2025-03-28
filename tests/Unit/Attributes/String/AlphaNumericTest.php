<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\String\AlphaNumeric;

#[CoversClass(AlphaNumeric::class)]
class AlphaNumericTest extends TestCase {
    public function testIsValid(): void {
        $alpha = new AlphaNumeric();

        static::assertFalse($alpha->isValid('-', (object) []));
        static::assertFalse($alpha->isValid('&', (object) []));
        static::assertTrue($alpha->isValid('42', (object) []));
        static::assertFalse($alpha->isValid('{}', (object) []));
        static::assertTrue($alpha->isValid('foo', (object) []));
        static::assertTrue($alpha->isValid('FOO', (object) []));
        static::assertTrue($alpha->isValid('FOO42', (object) []));
    }
}

<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\String\Alpha;

#[CoversClass(Alpha::class)]
class AlphaTest extends TestCase {
    public function testIsValid(): void {
        $alpha = new Alpha();

        static::assertFalse($alpha->isValid('-', (object) []));
        static::assertFalse($alpha->isValid('&', (object) []));
        static::assertFalse($alpha->isValid('42', (object) []));
        static::assertFalse($alpha->isValid('{}', (object) []));
        static::assertTrue($alpha->isValid('foo', (object) []));
        static::assertFalse($alpha->isValid('FOO42', (object) []));
    }
}

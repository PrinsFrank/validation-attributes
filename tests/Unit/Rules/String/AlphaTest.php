<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Rules\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Rules\String\Alpha;

#[CoversClass(Alpha::class)]
class AlphaTest extends TestCase {
    public function testIsValid(): void {
        $alpha = new Alpha();

        static::assertFalse($alpha->isValid('-'));
        static::assertFalse($alpha->isValid('&'));
        static::assertFalse($alpha->isValid('42'));
        static::assertFalse($alpha->isValid('{}'));
        static::assertTrue($alpha->isValid('foo'));
        static::assertFalse($alpha->isValid('FOO42'));
    }
}

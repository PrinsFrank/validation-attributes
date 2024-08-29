<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\String\HexColor;

#[CoversClass(HexColor::class)]
class HexColorTest extends TestCase {
    public function testIsValid(): void {
        $hexColor = new HexColor();

        static::assertFalse($hexColor->isValid('0'));
        static::assertFalse($hexColor->isValid('00'));
        static::assertTrue($hexColor->isValid('000'));
        static::assertTrue($hexColor->isValid('FFF'));
        static::assertTrue($hexColor->isValid('0000'));
        static::assertTrue($hexColor->isValid('FFFF'));
        static::assertTrue($hexColor->isValid('000000'));
        static::assertTrue($hexColor->isValid('FFFFFF'));
        static::assertTrue($hexColor->isValid('00000000'));
        static::assertTrue($hexColor->isValid('FFFFFFFF'));
        static::assertFalse($hexColor->isValid('000000000'));
        static::assertFalse($hexColor->isValid('FFFFFFFFF'));
    }
}

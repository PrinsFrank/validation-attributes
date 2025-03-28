<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\String\HexColor;

#[CoversClass(HexColor::class)]
class HexColorTest extends TestCase {
    public function testIsValid(): void {
        $hexColor = new HexColor();

        static::assertFalse($hexColor->isValid('0', (object) []));
        static::assertFalse($hexColor->isValid('00', (object) []));
        static::assertTrue($hexColor->isValid('000', (object) []));
        static::assertTrue($hexColor->isValid('FFF', (object) []));
        static::assertTrue($hexColor->isValid('0000', (object) []));
        static::assertTrue($hexColor->isValid('FFFF', (object) []));
        static::assertTrue($hexColor->isValid('000000', (object) []));
        static::assertTrue($hexColor->isValid('FFFFFF', (object) []));
        static::assertTrue($hexColor->isValid('00000000', (object) []));
        static::assertTrue($hexColor->isValid('FFFFFFFF', (object) []));
        static::assertFalse($hexColor->isValid('000000000', (object) []));
        static::assertFalse($hexColor->isValid('FFFFFFFFF', (object) []));
    }
}

<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\String\ASCII;

#[CoversClass(ASCII::class)]
class ASCIITest extends TestCase {
    public function testIsValid(): void {
        $ascii = new ASCII();

        static::assertFalse($ascii->isValid('€'));
        static::assertTrue($ascii->isValid('@'));
        static::assertTrue($ascii->isValid(''));
        static::assertTrue($ascii->isValid('a'));
        static::assertTrue($ascii->isValid('A'));
        static::assertTrue($ascii->isValid('1'));
    }
}

<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Tests\Unit\Rules\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationRules\Rules\String\ASCII;

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

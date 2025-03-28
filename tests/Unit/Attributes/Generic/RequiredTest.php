<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Generic;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Generic\Required;

#[CoversClass(Required::class)]
class RequiredTest extends TestCase {
    public function testIsValid(): void {
        $required = new Required();

        static::assertFalse($required->isValid(null, (object) []));
        static::assertTrue($required->isValid(0, (object) []));
        static::assertTrue($required->isValid(0.0, (object) []));
        static::assertTrue($required->isValid(1, (object) []));
        static::assertTrue($required->isValid('', (object) []));
        static::assertTrue($required->isValid('NULL', (object) []));
        static::assertTrue($required->isValid([], (object) []));
        static::assertTrue($required->isValid((object) [], (object) []));
    }
}

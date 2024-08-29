<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Rules\Generic;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Rules\Generic\Required;

#[CoversClass(Required::class)]
class RequiredTest extends TestCase {
    public function testIsValid(): void {
        $required = new Required();

        static::assertFalse($required->isValid(null));
        static::assertTrue($required->isValid(0));
        static::assertTrue($required->isValid(0.0));
        static::assertTrue($required->isValid(1));
        static::assertTrue($required->isValid(''));
        static::assertTrue($required->isValid('NULL'));
        static::assertTrue($required->isValid([]));
        static::assertTrue($required->isValid((object) []));
    }
}

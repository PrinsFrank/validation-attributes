<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Enum;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Enum\Disallowed;

#[CoversClass(Disallowed::class)]
class DisallowedTest extends TestCase {
    public function testIsValid(): void {
        $attribute = new Disallowed([]);
        static::assertTrue($attribute->isValid(StringBackedEnum::A, (object) []));
        static::assertTrue($attribute->isValid(StringBackedEnum::B, (object) []));
        static::assertTrue($attribute->isValid(IntBackedEnum::One, (object) []));
        static::assertTrue($attribute->isValid(IntBackedEnum::Two, (object) []));

        $attribute = new Disallowed([StringBackedEnum::A]);
        static::assertFalse($attribute->isValid(StringBackedEnum::A, (object) []));
        static::assertTrue($attribute->isValid(StringBackedEnum::B, (object) []));

        $attribute = new Disallowed([IntBackedEnum::One]);
        static::assertFalse($attribute->isValid(IntBackedEnum::One, (object) []));
        static::assertTrue($attribute->isValid(IntBackedEnum::Two, (object) []));
    }
}

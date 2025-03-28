<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Enum;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Enum\Disallowed;

#[CoversClass(Disallowed::class)]
class DisallowedTest extends TestCase {
    public function testIsValid(): void {
        $attribute = new Disallowed([]);
        static::assertTrue($attribute->isValid(StringBackedEnum::A));
        static::assertTrue($attribute->isValid(StringBackedEnum::B));
        static::assertTrue($attribute->isValid(IntBackedEnum::One));
        static::assertTrue($attribute->isValid(IntBackedEnum::Two));

        $attribute = new Disallowed([StringBackedEnum::A]);
        static::assertFalse($attribute->isValid(StringBackedEnum::A));
        static::assertTrue($attribute->isValid(StringBackedEnum::B));

        $attribute = new Disallowed([IntBackedEnum::One]);
        static::assertFalse($attribute->isValid(IntBackedEnum::One));
        static::assertTrue($attribute->isValid(IntBackedEnum::Two));
    }
}

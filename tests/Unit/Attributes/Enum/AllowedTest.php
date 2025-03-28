<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Enum;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Enum\Allowed;

#[CoversClass(Allowed::class)]
class AllowedTest extends TestCase {
    public function testIsValid(): void {
        $attribute = new Allowed([]);
        static::assertFalse($attribute->isValid(StringBackedEnum::A));
        static::assertFalse($attribute->isValid(StringBackedEnum::B));
        static::assertFalse($attribute->isValid(IntBackedEnum::One));
        static::assertFalse($attribute->isValid(IntBackedEnum::Two));

        $attribute = new Allowed([StringBackedEnum::A]);
        static::assertTrue($attribute->isValid(StringBackedEnum::A));
        static::assertFalse($attribute->isValid(StringBackedEnum::B));

        $attribute = new Allowed([IntBackedEnum::One]);
        static::assertTrue($attribute->isValid(IntBackedEnum::One));
        static::assertFalse($attribute->isValid(IntBackedEnum::Two));
    }
}

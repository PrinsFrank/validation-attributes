<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Generic;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Generic\RequiredIf;
use PrinsFrank\ValidationAttributes\Exception\InvalidContextException;

#[CoversClass(RequiredIf::class)]
class RequiredIfTest extends TestCase {
    /** @throws InvalidContextException */
    public function testIsValid(): void {
        $required = new RequiredIf('foo', true);

        static::assertTrue($required->isValid(null, (object) ['foo' => false]));
        static::assertTrue($required->isValid(0, (object) ['foo' => false]));

        static::assertFalse($required->isValid(null, (object) ['foo' => true]));
        static::assertTrue($required->isValid(0, (object) ['foo' => true]));
    }
}

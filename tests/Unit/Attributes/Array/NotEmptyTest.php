<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\Array;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\Array\NotEmpty;

#[CoversClass(NotEmpty::class)]
class NotEmptyTest extends TestCase {
    public function testIsValid(): void {
        $notEmpty = new NotEmpty();

        static::assertFalse($notEmpty->isValid([], (object) []));
        static::assertTrue($notEmpty->isValid([null], (object) []));
        static::assertTrue($notEmpty->isValid([''], (object) []));
        static::assertTrue($notEmpty->isValid([[]], (object) []));
        static::assertTrue($notEmpty->isValid([[null]], (object) []));
        static::assertTrue($notEmpty->isValid([[], []], (object) []));
    }
}

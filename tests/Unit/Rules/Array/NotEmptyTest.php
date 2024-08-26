<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Tests\Unit\Rules\Array;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationRules\Rules\Array\NotEmpty;

#[CoversClass(NotEmpty::class)]
class NotEmptyTest extends TestCase {
    public function testIsValid(): void {
        $notEmpty = new NotEmpty();

        static::assertFalse($notEmpty->isValid([]));
        static::assertTrue($notEmpty->isValid([null]));
        static::assertTrue($notEmpty->isValid(['']));
        static::assertTrue($notEmpty->isValid([[]]));
        static::assertTrue($notEmpty->isValid([[null]]));
        static::assertTrue($notEmpty->isValid([[], []]));
    }
}

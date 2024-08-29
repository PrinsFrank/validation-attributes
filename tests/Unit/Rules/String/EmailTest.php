<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Rules\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Rules\String\Email;

#[CoversClass(Email::class)]
class EmailTest extends TestCase {
    public function testIsValid(): void {
        $email = new Email();
        static::assertFalse($email->isValid(''));
        static::assertFalse($email->isValid('foo'));
        static::assertFalse($email->isValid('foo@'));
        static::assertFalse($email->isValid('foo@bar'));
        static::assertTrue($email->isValid('foo@bar.com'));
        static::assertTrue($email->isValid('foo.bar@bar.com'));
        static::assertTrue($email->isValid('foo+1@bar.com'));
    }
}

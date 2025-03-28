<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Tests\Unit\Attributes\String;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\ValidationAttributes\Attributes\String\Email;

#[CoversClass(Email::class)]
class EmailTest extends TestCase {
    public function testIsValid(): void {
        $email = new Email();
        static::assertFalse($email->isValid('', (object) []));
        static::assertFalse($email->isValid('foo', (object) []));
        static::assertFalse($email->isValid('foo@', (object) []));
        static::assertFalse($email->isValid('foo@bar', (object) []));
        static::assertTrue($email->isValid('foo@bar.com', (object) []));
        static::assertTrue($email->isValid('foo.bar@bar.com', (object) []));
        static::assertTrue($email->isValid('foo+1@bar.com', (object) []));
    }
}

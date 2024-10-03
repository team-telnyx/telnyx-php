<?php

namespace Telnyx;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Telnyx\ErrorObject::class)]

final class ErrorObjectTest extends \Telnyx\TestCase
{
    public function testDefaultValues()
    {
        $error = ErrorObject::constructFrom([]);

        static::assertNull($error->code);
        static::assertNull($error->title);
        static::assertNull($error->detail);
        static::assertNull($error->source);
        static::assertNull($error->pointer);
        static::assertNull($error->parameter);
        static::assertNull($error->meta);
    }
}

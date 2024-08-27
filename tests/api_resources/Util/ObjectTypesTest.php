<?php

namespace Telnyx\Util;

use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Telnyx\Util\ObjectTypes::class)]

final class ObjectTypesTest extends \Telnyx\TestCase
{

    public function testMapping()
    {
        static::assertSame(\Telnyx\Util\ObjectTypes::mapping['list'], \Telnyx\Collection::class);
        static::assertSame(\Telnyx\Util\ObjectTypes::mapping['messaging_settings'], \Telnyx\PhoneNumber\Messaging::class);
    }
}

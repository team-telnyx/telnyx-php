<?php

namespace Telnyx;

use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Telnyx\Event::class)]

final class EventTest extends \Telnyx\TestCase
{
    public function testEvent()
    {
        $resource = new Event();
        $this->assertInstanceOf(\Telnyx\Event::class, $resource);
    }
}

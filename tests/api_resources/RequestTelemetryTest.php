<?php

namespace Telnyx; 
use PHPUnit\Framework\Attributes\CoversClass;

 
#[CoversClass(\Telnyx\RequestTelemetry::class)]
final class RequestTelemetryTest extends \Telnyx\TestCase
{
    public function testRequestTelemetry()
    {
        $result = new RequestTelemetry('req_id', 555);
        $this->assertInstanceOf('\Telnyx\RequestTelemetry', $result);
        $this->assertSame('req_id', $result->requestId);
        $this->assertSame(555, $result->requestDuration);
    }
}

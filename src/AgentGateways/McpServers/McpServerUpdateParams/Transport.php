<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers\McpServerUpdateParams;

/**
 * `http` for Streamable HTTP, or `sse` for Server-Sent Events.
 */
enum Transport: string
{
    case HTTP = 'http';

    case SSE = 'sse';
}

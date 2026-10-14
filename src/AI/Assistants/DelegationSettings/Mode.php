<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\DelegationSettings;

/**
 * Who answers a delegation. `telnyx` runs the backend model on Telnyx with the assistant's own tools, MCP servers and observability. `client` relays the delegation to a server you host over the WebSocket configured in `websocket_settings`: Telnyx sends a `session.delegation.created` frame and waits for your `session.delegation.completed` answer. That answer is text only, since the socket offers no tool vocabulary. If no socket is connected the delegation is refused and the assistant tells the caller it cannot look things up right now. Defaults to `telnyx`.
 */
enum Mode: string
{
    case TELNYX = 'telnyx';

    case CLIENT = 'client';
}

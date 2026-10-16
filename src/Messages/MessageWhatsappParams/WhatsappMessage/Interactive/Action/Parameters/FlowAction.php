<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action\Parameters;

/**
 * how the flow starts. navigate opens the screen in flow_action_payload; data_exchange requests the first screen from the business's flow endpoint. Defaults to navigate.
 */
enum FlowAction: string
{
    case NAVIGATE = 'navigate';

    case DATA_EXCHANGE = 'data_exchange';
}

<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button;

/**
 * Flow action type for FLOW-type buttons.
 */
enum FlowAction: string
{
    case NAVIGATE = 'navigate';

    case DATA_EXCHANGE = 'data_exchange';
}

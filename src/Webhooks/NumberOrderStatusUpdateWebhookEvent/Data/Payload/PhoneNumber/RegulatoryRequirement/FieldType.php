<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent\Data\Payload\PhoneNumber\RegulatoryRequirement;

enum FieldType: string
{
    case TEXTUAL = 'textual';

    case DATETIME = 'datetime';

    case ADDRESS = 'address';

    case DOCUMENT = 'document';
}

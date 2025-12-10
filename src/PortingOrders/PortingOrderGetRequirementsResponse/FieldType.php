<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;

/**
 * Type of value expected on field_value field.
 */
enum FieldType: string
{
    case DOCUMENT = 'document';

    case TEXTUAL = 'textual';
}

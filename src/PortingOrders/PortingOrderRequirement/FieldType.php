<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderRequirement;

/**
 * Type of value expected on field_value field.
 */
enum FieldType: string
{
    case DOCUMENT = 'document';
}

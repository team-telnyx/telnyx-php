<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxMediaProcessed\Data\Payload;

/**
 * The status of the fax.
 */
enum Status: string
{
    case MEDIA_PROCESSED = 'media.processed';
}

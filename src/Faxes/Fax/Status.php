<?php

declare(strict_types=1);

namespace Telnyx\Faxes\Fax;

/**
 * Status of the fax.
 */
enum Status: string
{
    case QUEUED = 'queued';

    case MEDIA_PROCESSED = 'media.processed';

    case ORIGINATED = 'originated';

    case SENDING = 'sending';

    case DELIVERED = 'delivered';

    case FAILED = 'failed';

    case INITIATED = 'initiated';

    case RECEIVING = 'receiving';

    case MEDIA_PROCESSING = 'media.processing';

    case RECEIVED = 'received';
}

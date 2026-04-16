<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallDeepfakeDetectionErrorWebhookEvent\Data\Payload;

/**
 * The error that occurred. 'detection_timeout' = no DFD response received, 'rtp_timeout' = no RTP audio received, 'dfd_connection_error'/'dfd_stream_error' = service connectivity issues.
 */
enum ErrorMessage: string
{
    case DETECTION_TIMEOUT = 'detection_timeout';

    case RTP_TIMEOUT = 'rtp_timeout';

    case DFD_CONNECTION_ERROR = 'dfd_connection_error';

    case DFD_STREAM_ERROR = 'dfd_stream_error';
}

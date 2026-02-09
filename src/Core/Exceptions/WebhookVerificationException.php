<?php

declare(strict_types=1);

namespace Telnyx\Core\Exceptions;

/**
 * Exception thrown when webhook signature verification fails.
 */
class WebhookVerificationException extends TelnyxException
{
    public function __construct(string $message = 'Webhook signature verification failed')
    {
        parent::__construct($message);
    }
}

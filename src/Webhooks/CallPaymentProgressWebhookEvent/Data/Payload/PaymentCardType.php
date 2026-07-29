<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload;

/**
 * Detected card type. Present only for the recognized card brands listed below.
 */
enum PaymentCardType: string
{
    case VISA = 'visa';

    case MASTERCARD = 'mastercard';

    case AMEX = 'amex';

    case DISCOVER = 'discover';

    case DINERS_CLUB = 'diners-club';

    case JCB = 'jcb';
}

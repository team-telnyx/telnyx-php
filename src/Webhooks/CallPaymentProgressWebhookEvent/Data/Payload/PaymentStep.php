<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload;

/**
 * Current payment collection or processing step.
 */
enum PaymentStep: string
{
    case PAYMENT_CARD_NUMBER = 'payment-card-number';

    case EXPIRATION_DATE = 'expiration-date';

    case POSTAL_CODE = 'postal-code';

    case SECURITY_CODE = 'security-code';

    case BANK_ROUTING_NUMBER = 'bank-routing-number';

    case BANK_ACCOUNT_NUMBER = 'bank-account-number';

    case PAYMENT_PROCESSING = 'payment-processing';
}

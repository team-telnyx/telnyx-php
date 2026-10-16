<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\HostedSignups\HostedSignupCreateParams;

/**
 * Onboarding flow the hosted page launches. Use `coexistence` for a number that remains active in the WhatsApp Business app.
 */
enum SignupType: string
{
    case STANDARD = 'standard';

    case COEXISTENCE = 'coexistence';
}

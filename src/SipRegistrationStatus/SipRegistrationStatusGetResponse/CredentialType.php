<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;

/**
 * The credential type that was looked up.
 */
enum CredentialType: string
{
    case UAC_EXTERNAL_CREDENTIAL = 'uac_external_credential';
}

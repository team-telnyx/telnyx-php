<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams;

/**
 * The kind of credential to look up. `uac_external_credential` is keyed by `connection_id`; `telephony_credential` is keyed by `username`.
 */
enum CredentialType: string
{
    case UAC_EXTERNAL_CREDENTIAL = 'uac_external_credential';

    case TELEPHONY_CREDENTIAL = 'telephony_credential';
}

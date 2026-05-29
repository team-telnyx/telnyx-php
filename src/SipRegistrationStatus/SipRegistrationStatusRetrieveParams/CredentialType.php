<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams;

/**
 * The kind of credential to look up.
 */
enum CredentialType: string
{
    case UAC_EXTERNAL_CREDENTIAL = 'uac_external_credential';

    case TELEPHONY_CREDENTIAL = 'telephony_credential';

    case SIP_CREDENTIAL_CONNECTION = 'sip_credential_connection';
}

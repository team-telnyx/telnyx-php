<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams;

/**
 * The kind of credential to look up. `uac_external_credential` is keyed by `connection_id`; `telephony_credential` and `sip_credential_connection` are keyed by `username`.
 */
enum CredentialType: string
{
    case UAC_EXTERNAL_CREDENTIAL = 'uac_external_credential';

    case TELEPHONY_CREDENTIAL = 'telephony_credential';

    case SIP_CREDENTIAL_CONNECTION = 'sip_credential_connection';
}

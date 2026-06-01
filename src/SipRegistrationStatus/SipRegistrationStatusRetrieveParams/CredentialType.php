<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams;

/**
 * The kind of credential to look up. Only `uac_external_credential` is supported today.
 */
enum CredentialType: string
{
    case UAC_EXTERNAL_CREDENTIAL = 'uac_external_credential';
}

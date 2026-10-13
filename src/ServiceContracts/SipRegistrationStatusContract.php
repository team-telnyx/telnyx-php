<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusListParams\CredentialType;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SipRegistrationStatusContract
{
    /**
     * @api
     *
     * @param CredentialType|value-of<CredentialType> $credentialType The kind of credential to look up. `uac_external_credential` is keyed by `connection_id`; `telephony_credential` and `sip_credential_connection` are keyed by `username`.
     * @param string $connectionID Identifier of the UAC connection to look up. Required when `credential_type` is `uac_external_credential`.
     * @param string $username SIP username to look up. Required when `credential_type` is `telephony_credential` or `sip_credential_connection`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        CredentialType|string $credentialType,
        ?string $connectionID = null,
        ?string $username = null,
        RequestOptions|array|null $requestOptions = null,
    ): SipRegistrationStatusListResponse;
}

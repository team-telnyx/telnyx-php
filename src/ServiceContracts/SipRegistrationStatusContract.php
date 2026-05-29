<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams\CredentialType;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SipRegistrationStatusContract
{
    /**
     * @api
     *
     * @param string $connectionID identifier of the connection or credential to look up
     * @param CredentialType|value-of<CredentialType> $credentialType the kind of credential to look up
     * @param string $userID Owner of the connection. Used to authorize the lookup.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        CredentialType|string $credentialType,
        string $userID,
        RequestOptions|array|null $requestOptions = null,
    ): SipRegistrationStatusGetResponse;
}

<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SipRegistrationStatusContract;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams\CredentialType;

/**
 * Look up SIP registration status across credential types.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SipRegistrationStatusService implements SipRegistrationStatusContract
{
    /**
     * @api
     */
    public SipRegistrationStatusRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SipRegistrationStatusRawService($client);
    }

    /**
     * @api
     *
     * Returns the live SIP registration state of a connection or credential. Supports UAC third-party credentials, telephony credentials, and SIP credential connections.
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
    ): SipRegistrationStatusGetResponse {
        $params = Util::removeNulls(
            [
                'connectionID' => $connectionID,
                'credentialType' => $credentialType,
                'userID' => $userID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

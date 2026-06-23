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
 * UAC connection operations.
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
     * Returns the live SIP registration state of a UAC connection: whether it is currently registered, when it last registered, and the last response Telnyx received from the registrar. Only `uac_external_credential` is supported today.
     *
     * @param CredentialType|value-of<CredentialType> $credentialType The kind of credential to look up. `uac_external_credential` is keyed by `connection_id`; `telephony_credential` is keyed by `username`.
     * @param string $connectionID Identifier of the UAC connection to look up. Required when `credential_type` is `uac_external_credential`.
     * @param string $username SIP username of the telephony credential to look up. Required when `credential_type` is `telephony_credential`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        CredentialType|string $credentialType,
        ?string $connectionID = null,
        ?string $username = null,
        RequestOptions|array|null $requestOptions = null,
    ): SipRegistrationStatusGetResponse {
        $params = Util::removeNulls(
            [
                'credentialType' => $credentialType,
                'connectionID' => $connectionID,
                'username' => $username,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

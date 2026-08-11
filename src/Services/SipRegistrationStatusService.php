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
     * Returns the live SIP registration status for a Telnyx endpoint: whether it is currently registered, when the current registration expires, and the last response Telnyx received from the registrar.
     *
     * The endpoint supports three credential types, selected with the `credential_type` query parameter. Each type is keyed by a different identifier:
     *
     * | `credential_type` | Keyed by | Use case |
     * | --- | --- | --- |
     * | `uac_external_credential` | `connection_id` | A UAC (SIP attach) connection that registers to an external PBX. |
     * | `telephony_credential` | `username` | An ephemeral, one-time-use telephony credential. |
     * | `sip_credential_connection` | `username` | A traditional SIP credential connection that registers directly to Telnyx. |
     *
     * The authenticated account is taken from your API key; you can only read the registration status of connections and credentials your account owns.
     *
     * @param CredentialType|value-of<CredentialType> $credentialType The kind of credential to look up. `uac_external_credential` is keyed by `connection_id`; `telephony_credential` and `sip_credential_connection` are keyed by `username`.
     * @param string $connectionID Identifier of the UAC connection to look up. Required when `credential_type` is `uac_external_credential`.
     * @param string $username SIP username to look up. Required when `credential_type` is `telephony_credential` or `sip_credential_connection`.
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

<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SipRegistrationStatusRawContract;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusListParams;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusListParams\CredentialType;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusListResponse;

/**
 * UAC connection operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SipRegistrationStatusRawService implements SipRegistrationStatusRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   credentialType: CredentialType|value-of<CredentialType>,
     *   connectionID?: string,
     *   username?: string,
     * }|SipRegistrationStatusListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SipRegistrationStatusListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SipRegistrationStatusListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SipRegistrationStatusListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sip_registration_status',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'credentialType' => 'credential_type',
                    'connectionID' => 'connection_id',
                ],
            ),
            options: $options,
            convert: SipRegistrationStatusListResponse::class,
        );
    }
}

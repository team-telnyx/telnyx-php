<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SipRegistrationStatusRawContract;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams\CredentialType;

/**
 * Look up the live SIP registration status of a UAC connection.
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
     * Returns the live SIP registration state of a UAC connection: whether it is currently registered, when it last registered, and the last response Telnyx received from the registrar. Only `uac_external_credential` is supported today.
     *
     * @param array{
     *   connectionID: string,
     *   credentialType: CredentialType|value-of<CredentialType>,
     *   userID: string,
     * }|SipRegistrationStatusRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SipRegistrationStatusGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|SipRegistrationStatusRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SipRegistrationStatusRetrieveParams::parseRequest(
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
                    'connectionID' => 'connection_id',
                    'credentialType' => 'credential_type',
                    'userID' => 'user_id',
                ],
            ),
            options: $options,
            convert: SipRegistrationStatusGetResponse::class,
        );
    }
}

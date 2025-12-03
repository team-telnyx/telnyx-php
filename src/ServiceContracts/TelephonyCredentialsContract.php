<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\TelephonyCredentials\TelephonyCredential;
use Telnyx\TelephonyCredentials\TelephonyCredentialCreateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

interface TelephonyCredentialsContract
{
    /**
     * @api
     *
     * @param array<mixed>|TelephonyCredentialCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TelephonyCredentialCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|TelephonyCredentialUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TelephonyCredentialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|TelephonyCredentialListParams $params
     *
     * @return DefaultPagination<TelephonyCredential>
     *
     * @throws APIException
     */
    public function list(
        array|TelephonyCredentialListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialDeleteResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function createToken(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}

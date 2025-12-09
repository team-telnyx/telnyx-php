<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialListResponse;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;

interface MobilePushCredentialsContract
{
    /**
     * @api
     *
     * @param array<mixed>|MobilePushCredentialCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MobilePushCredentialCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @param array<mixed>|MobilePushCredentialListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MobilePushCredentialListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobilePushCredentialListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

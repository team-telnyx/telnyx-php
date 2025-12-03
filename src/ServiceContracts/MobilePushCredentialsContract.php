<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams;
use Telnyx\MobilePushCredentials\PushCredential;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;

interface MobilePushCredentialsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        mixed $params,
        ?RequestOptions $requestOptions = null
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
     * @return DefaultPagination<PushCredential>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePushCredentialListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

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

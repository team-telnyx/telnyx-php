<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams;
use Telnyx\MobilePushCredentials\PushCredential;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobilePushCredentialsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MobilePushCredentialCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PushCredentialResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MobilePushCredentialCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PushCredentialResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MobilePushCredentialListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PushCredential>>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePushCredentialListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

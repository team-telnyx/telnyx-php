<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuthenticationProviders\AuthenticationProvider;
use Telnyx\AuthenticationProviders\AuthenticationProviderCreateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AuthenticationProvidersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuthenticationProviderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AuthenticationProviderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id authentication provider ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|AuthenticationProviderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthenticationProviderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AuthenticationProviderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AuthenticationProvider>>
     *
     * @throws APIException
     */
    public function list(
        array|AuthenticationProviderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id authentication provider ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

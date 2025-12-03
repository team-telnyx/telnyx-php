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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface AuthenticationProvidersContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuthenticationProviderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AuthenticationProviderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AuthenticationProviderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|AuthenticationProviderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthenticationProviderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AuthenticationProviderUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|AuthenticationProviderListParams $params
     *
     * @return DefaultFlatPagination<AuthenticationProvider>
     *
     * @throws APIException
     */
    public function list(
        array|AuthenticationProviderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderDeleteResponse;
}

<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\UacConnections\UacConnection;
use Telnyx\UacConnections\UacConnectionCreateParams;
use Telnyx\UacConnections\UacConnectionDeleteResponse;
use Telnyx\UacConnections\UacConnectionGetResponse;
use Telnyx\UacConnections\UacConnectionListParams;
use Telnyx\UacConnections\UacConnectionNewResponse;
use Telnyx\UacConnections\UacConnectionUpdateParams;
use Telnyx\UacConnections\UacConnectionUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UacConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UacConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UacConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionGetResponse>
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
     * @param array<string,mixed>|UacConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|UacConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UacConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<UacConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|UacConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

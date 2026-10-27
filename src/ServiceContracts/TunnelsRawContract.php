<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Tunnels\TunnelCreateParams;
use Telnyx\Tunnels\TunnelGetResponse;
use Telnyx\Tunnels\TunnelListParams;
use Telnyx\Tunnels\TunnelListResponse;
use Telnyx\Tunnels\TunnelNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TunnelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TunnelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TunnelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TunnelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TunnelGetResponse>
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
     * @param array<string,mixed>|TunnelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TunnelListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TunnelListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

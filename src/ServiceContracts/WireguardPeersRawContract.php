<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\WireguardPeers\WireguardPeerCreateParams;
use Telnyx\WireguardPeers\WireguardPeerDeleteResponse;
use Telnyx\WireguardPeers\WireguardPeerGetResponse;
use Telnyx\WireguardPeers\WireguardPeerListParams;
use Telnyx\WireguardPeers\WireguardPeerListResponse;
use Telnyx\WireguardPeers\WireguardPeerNewResponse;
use Telnyx\WireguardPeers\WireguardPeerUpdateParams;
use Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WireguardPeersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WireguardPeerCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WireguardPeerNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WireguardPeerCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WireguardPeerGetResponse>
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
     * @param array<string,mixed>|WireguardPeerUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WireguardPeerUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WireguardPeerUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WireguardPeerListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<WireguardPeerListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|WireguardPeerListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WireguardPeerDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveConfig(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

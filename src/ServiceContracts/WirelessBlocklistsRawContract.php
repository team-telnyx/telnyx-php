<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklists\WirelessBlocklist;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistDeleteResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistGetResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistListParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistNewResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateResponse;

interface WirelessBlocklistsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|WirelessBlocklistCreateParams $params
     *
     * @return BaseResponse<WirelessBlocklistNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WirelessBlocklistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the wireless blocklist
     *
     * @return BaseResponse<WirelessBlocklistGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|WirelessBlocklistUpdateParams $params
     *
     * @return BaseResponse<WirelessBlocklistUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|WirelessBlocklistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|WirelessBlocklistListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<WirelessBlocklist>>
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the wireless blocklist
     *
     * @return BaseResponse<WirelessBlocklistDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}

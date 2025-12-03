<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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

interface WirelessBlocklistsContract
{
    /**
     * @api
     *
     * @param array<mixed>|WirelessBlocklistCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WirelessBlocklistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|WirelessBlocklistUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|WirelessBlocklistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|WirelessBlocklistListParams $params
     *
     * @return DefaultFlatPagination<WirelessBlocklist>
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistListParams $params,
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
    ): WirelessBlocklistDeleteResponse;
}

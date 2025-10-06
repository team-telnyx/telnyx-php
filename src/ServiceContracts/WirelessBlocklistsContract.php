<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams\Type;
use Telnyx\WirelessBlocklists\WirelessBlocklistDeleteResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistGetResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistListResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistNewResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface WirelessBlocklistsContract
{
    /**
     * @api
     *
     * @param string $name the name of the Wireless Blocklist
     * @param Type|value-of<Type> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @throws APIException
     */
    public function create(
        $name,
        $type,
        $values,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
     * @param string $name the name of the Wireless Blocklist
     * @param \Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type|value-of<\Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @throws APIException
     */
    public function update(
        $name = omit,
        $type = omit,
        $values = omit,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistUpdateResponse;

    /**
     * @api
     *
     * @param string $filterName the name of the Wireless Blocklist
     * @param string $filterType when the Private Wireless Gateway was last updated
     * @param string $filterValues values to filter on (inclusive)
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @throws APIException
     */
    public function list(
        $filterName = omit,
        $filterType = omit,
        $filterValues = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistListResponse;

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

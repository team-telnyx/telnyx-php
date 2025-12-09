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

interface WirelessBlocklistsContract
{
    /**
     * @api
     *
     * @param string $name the name of the Wireless Blocklist
     * @param 'country'|'mcc'|'plmn'|Type $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string|Type $type,
        array $values,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the wireless blocklist
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
     * @param 'country'|'mcc'|'plmn'|\Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @throws APIException
     */
    public function update(
        ?string $name = null,
        string|\Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type|null $type = null,
        ?array $values = null,
        ?RequestOptions $requestOptions = null,
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
        ?string $filterName = null,
        ?string $filterType = null,
        ?string $filterValues = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistListResponse;

    /**
     * @api
     *
     * @param string $id identifies the wireless blocklist
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistDeleteResponse;
}

<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\WirelessBlocklists\WirelessBlocklist;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams\Type;
use Telnyx\WirelessBlocklists\WirelessBlocklistDeleteResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistGetResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistNewResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WirelessBlocklistsContract
{
    /**
     * @api
     *
     * @param string $name the name of the Wireless Blocklist
     * @param Type|value-of<Type> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        Type|string $type,
        array $values,
        RequestOptions|array|null $requestOptions = null,
    ): WirelessBlocklistNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the wireless blocklist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WirelessBlocklistGetResponse;

    /**
     * @api
     *
     * @param string $name the name of the Wireless Blocklist
     * @param \Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type|value-of<\Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        ?string $name = null,
        \Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type|string|null $type = null,
        ?array $values = null,
        RequestOptions|array|null $requestOptions = null,
    ): WirelessBlocklistUpdateResponse;

    /**
     * @api
     *
     * @param string $filterName the name of the Wireless Blocklist
     * @param string $filterType when the Private Wireless Gateway was last updated
     * @param string $filterValues values to filter on (inclusive)
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<WirelessBlocklist>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        ?string $filterType = null,
        ?string $filterValues = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the wireless blocklist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WirelessBlocklistDeleteResponse;
}

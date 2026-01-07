<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\OtaUpdates\OtaUpdateGetResponse;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter;
use Telnyx\OtaUpdates\OtaUpdateListParams\Page;
use Telnyx\OtaUpdates\OtaUpdateListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OtaUpdatesContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\OtaUpdates\OtaUpdateListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\OtaUpdates\OtaUpdateListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OtaUpdatesService implements OtaUpdatesContract
{
    /**
     * @api
     */
    public OtaUpdatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OtaUpdatesRawService($client);
    }

    /**
     * @api
     *
     * This API returns the details of an Over the Air (OTA) update.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): OtaUpdateGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List OTA updates
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for OTA updates (deepObject style). Originally: filter[status], filter[sim_card_id], filter[type]
     * @param Page|PageShape $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<OtaUpdateListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

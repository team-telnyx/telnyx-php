<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OtaUpdates\OtaUpdateGetResponse;
use Telnyx\OtaUpdates\OtaUpdateListParams;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter;
use Telnyx\OtaUpdates\OtaUpdateListParams\Page;
use Telnyx\OtaUpdates\OtaUpdateListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OtaUpdatesContract;

use const Telnyx\Core\OMIT as omit;

final class OtaUpdatesService implements OtaUpdatesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API returns the details of an Over the Air (OTA) update.
     *
     * @return OtaUpdateGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ota_updates/%1$s', $id],
            options: $requestOptions,
            convert: OtaUpdateGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List OTA updates
     *
     * @param Filter $filter Consolidated filter parameter for OTA updates (deepObject style). Originally: filter[status], filter[sim_card_id], filter[type]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return OtaUpdateListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateListResponse {
        [$parsed, $options] = OtaUpdateListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ota_updates',
            query: $parsed,
            options: $options,
            convert: OtaUpdateListResponse::class,
        );
    }
}

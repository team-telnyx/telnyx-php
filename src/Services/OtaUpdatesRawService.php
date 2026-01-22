<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\OtaUpdates\OtaUpdateGetResponse;
use Telnyx\OtaUpdates\OtaUpdateListParams;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter;
use Telnyx\OtaUpdates\OtaUpdateListParams\Page;
use Telnyx\OtaUpdates\OtaUpdateListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OtaUpdatesRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\OtaUpdates\OtaUpdateListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\OtaUpdates\OtaUpdateListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OtaUpdatesRawService implements OtaUpdatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API returns the details of an Over the Air (OTA) update.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OtaUpdateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|OtaUpdateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<OtaUpdateListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|OtaUpdateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OtaUpdateListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ota_updates',
            query: $parsed,
            options: $options,
            convert: OtaUpdateListResponse::class,
            page: DefaultPagination::class,
        );
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomComposition;
use Telnyx\RoomCompositions\RoomCompositionCreateParams;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter;
use Telnyx\RoomCompositions\RoomCompositionListParams\Page;
use Telnyx\RoomCompositions\RoomCompositionNewResponse;
use Telnyx\RoomCompositions\VideoRegion;
use Telnyx\ServiceContracts\RoomCompositionsRawContract;

/**
 * @phpstan-import-type VideoRegionShape from \Telnyx\RoomCompositions\VideoRegion
 * @phpstan-import-type FilterShape from \Telnyx\RoomCompositions\RoomCompositionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\RoomCompositions\RoomCompositionListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RoomCompositionsRawService implements RoomCompositionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Asynchronously create a room composition.
     *
     * @param array{
     *   format?: string,
     *   resolution?: string,
     *   sessionID?: string,
     *   videoLayout?: array<string,VideoRegion|VideoRegionShape>,
     *   webhookEventFailoverURL?: string,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int,
     * }|RoomCompositionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomCompositionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|RoomCompositionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomCompositionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'room_compositions',
            body: (object) $parsed,
            options: $options,
            convert: RoomCompositionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * View a room composition.
     *
     * @param string $roomCompositionID the unique identifier of a room composition
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomCompositionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomCompositionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['room_compositions/%1$s', $roomCompositionID],
            options: $requestOptions,
            convert: RoomCompositionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * View a list of room compositions.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|RoomCompositionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<RoomComposition>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomCompositionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomCompositionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'room_compositions',
            query: $parsed,
            options: $options,
            convert: RoomComposition::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Synchronously delete a room composition.
     *
     * @param string $roomCompositionID the unique identifier of a room composition
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomCompositionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['room_compositions/%1$s', $roomCompositionID],
            options: $requestOptions,
            convert: null,
        );
    }
}

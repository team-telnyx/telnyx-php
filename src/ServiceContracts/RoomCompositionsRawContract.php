<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomComposition;
use Telnyx\RoomCompositions\RoomCompositionCreateParams;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams;
use Telnyx\RoomCompositions\RoomCompositionNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RoomCompositionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RoomCompositionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomCompositionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|RoomCompositionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RoomCompositionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RoomComposition>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomCompositionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

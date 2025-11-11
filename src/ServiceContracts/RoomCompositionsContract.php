<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomCompositionCreateParams;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams;
use Telnyx\RoomCompositions\RoomCompositionListResponse;
use Telnyx\RoomCompositions\RoomCompositionNewResponse;

interface RoomCompositionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RoomCompositionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RoomCompositionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomCompositionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): RoomCompositionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomCompositionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RoomCompositionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomCompositionListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}

<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenParams;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenParams;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<string,mixed>|ActionGenerateJoinClientTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGenerateJoinClientTokenResponse>
     *
     * @throws APIException
     */
    public function generateJoinClientToken(
        string $roomID,
        array|ActionGenerateJoinClientTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<string,mixed>|ActionRefreshClientTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRefreshClientTokenResponse>
     *
     * @throws APIException
     */
    public function refreshClientToken(
        string $roomID,
        array|ActionRefreshClientTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

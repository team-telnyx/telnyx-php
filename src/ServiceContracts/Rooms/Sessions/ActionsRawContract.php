<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms\Sessions;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     *
     * @return BaseResponse<ActionEndResponse>
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array<string,mixed>|ActionKickParams $params
     *
     * @return BaseResponse<ActionKickResponse>
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        array|ActionKickParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array<string,mixed>|ActionMuteParams $params
     *
     * @return BaseResponse<ActionMuteResponse>
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        array|ActionMuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array<string,mixed>|ActionUnmuteParams $params
     *
     * @return BaseResponse<ActionUnmuteResponse>
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        array|ActionUnmuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

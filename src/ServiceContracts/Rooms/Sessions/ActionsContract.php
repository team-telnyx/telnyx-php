<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms\Sessions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        ?RequestOptions $requestOptions = null
    ): ActionEndResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionKickParams $params
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        array|ActionKickParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionMuteParams $params
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        array|ActionMuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionUnmuteParams $params
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        array|ActionUnmuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse;
}

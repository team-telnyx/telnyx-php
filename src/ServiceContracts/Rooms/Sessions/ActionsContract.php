<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms\Sessions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\UnionMember0;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
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
     * @param string $roomSessionID the unique identifier of a room session
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param 'all'|UnionMember0|list<string> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        ?array $exclude = null,
        string|UnionMember0|array|null $participants = null,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param 'all'|\Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\UnionMember0|list<string> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        ?array $exclude = null,
        string|\Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\UnionMember0|array|null $participants = null,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param 'all'|\Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants\UnionMember0|list<string> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        ?array $exclude = null,
        string|\Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants\UnionMember0|array|null $participants = null,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse;
}

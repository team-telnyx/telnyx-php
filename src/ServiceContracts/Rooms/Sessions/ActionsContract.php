<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms\Sessions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\AllParticipants;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;

/**
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants as ParticipantsShape1
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants as ParticipantsShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        RequestOptions|array|null $requestOptions = null
    ): ActionEndResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param ParticipantsShape $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        ?array $exclude = null,
        AllParticipants|array|string|null $participants = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionKickResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param ParticipantsShape1 $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        ?array $exclude = null,
        \Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\AllParticipants|array|string|null $participants = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param ParticipantsShape2 $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        ?array $exclude = null,
        \Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants\AllParticipants|array|string|null $participants = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionUnmuteResponse;
}

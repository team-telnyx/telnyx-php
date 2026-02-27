<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms\Sessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\AllParticipants;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;
use Telnyx\ServiceContracts\Rooms\Sessions\ActionsContract;

/**
 * Rooms Sessions operations.
 *
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants as ParticipantsShape1
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants as ParticipantsShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Note: this will also kick all participants currently present in the room
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        RequestOptions|array|null $requestOptions = null
    ): ActionEndResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->end($roomSessionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Kick participants from a room session.
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
    ): ActionKickResponse {
        $params = Util::removeNulls(
            ['exclude' => $exclude, 'participants' => $participants]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->kick($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mute participants in room session.
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
    ): ActionMuteResponse {
        $params = Util::removeNulls(
            ['exclude' => $exclude, 'participants' => $participants]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->mute($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unmute participants in room session.
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
    ): ActionUnmuteResponse {
        $params = Util::removeNulls(
            ['exclude' => $exclude, 'participants' => $participants]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unmute($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

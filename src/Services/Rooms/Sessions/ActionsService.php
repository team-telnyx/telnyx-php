<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms\Sessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\AllParticipants;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;
use Telnyx\ServiceContracts\Rooms\Sessions\ActionsContract;

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
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        ?RequestOptions $requestOptions = null
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
     * @param 'all'|AllParticipants|list<string> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        ?array $exclude = null,
        string|AllParticipants|array|null $participants = null,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse {
        $params = ['exclude' => $exclude, 'participants' => $participants];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'all'|\Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\AllParticipants|list<string> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        ?array $exclude = null,
        string|\Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\AllParticipants|array|null $participants = null,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse {
        $params = ['exclude' => $exclude, 'participants' => $participants];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'all'|\Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants\AllParticipants|list<string> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        ?array $exclude = null,
        string|\Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants\AllParticipants|array|null $participants = null,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse {
        $params = ['exclude' => $exclude, 'participants' => $participants];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unmute($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

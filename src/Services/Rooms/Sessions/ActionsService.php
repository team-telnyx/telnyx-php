<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms\Sessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\UnionMember0;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\UnionMember0 as UnionMember01;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants\UnionMember0 as UnionMember02;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;
use Telnyx\ServiceContracts\Rooms\Sessions\ActionsContract;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Note: this will also kick all participants currently present in the room
     *
     * @return ActionEndResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        ?RequestOptions $requestOptions = null
    ): ActionEndResponse {
        $params = [];

        return $this->endRaw($roomSessionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ActionEndResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function endRaw(
        string $roomSessionID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionEndResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/end', $roomSessionID],
            options: $requestOptions,
            convert: ActionEndResponse::class,
        );
    }

    /**
     * @api
     *
     * Kick participants from a room session.
     *
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param UnionMember0|list<string>|value-of<UnionMember0> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @return ActionKickResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse {
        $params = ['exclude' => $exclude, 'participants' => $participants];

        return $this->kickRaw($roomSessionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionKickResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function kickRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionKickResponse {
        [$parsed, $options] = ActionKickParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/kick', $roomSessionID],
            body: (object) $parsed,
            options: $options,
            convert: ActionKickResponse::class,
        );
    }

    /**
     * @api
     *
     * Mute participants in room session.
     *
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param UnionMember01|list<string>|value-of<UnionMember01> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @return ActionMuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse {
        $params = ['exclude' => $exclude, 'participants' => $participants];

        return $this->muteRaw($roomSessionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionMuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function muteRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionMuteResponse {
        [$parsed, $options] = ActionMuteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/mute', $roomSessionID],
            body: (object) $parsed,
            options: $options,
            convert: ActionMuteResponse::class,
        );
    }

    /**
     * @api
     *
     * Unmute participants in room session.
     *
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param UnionMember02|list<string>|value-of<UnionMember02> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @return ActionUnmuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse {
        $params = ['exclude' => $exclude, 'participants' => $participants];

        return $this->unmuteRaw($roomSessionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionUnmuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function unmuteRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionUnmuteResponse {
        [$parsed, $options] = ActionUnmuteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/unmute', $roomSessionID],
            body: (object) $parsed,
            options: $options,
            convert: ActionUnmuteResponse::class,
        );
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms\Sessions;

use Telnyx\Client;
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
     */
    public function end(
        string $roomSessionID,
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
     */
    public function kick(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse {
        [$parsed, $options] = ActionKickParams::parseRequest(
            ['exclude' => $exclude, 'participants' => $participants],
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
     */
    public function mute(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse {
        [$parsed, $options] = ActionMuteParams::parseRequest(
            ['exclude' => $exclude, 'participants' => $participants],
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
     */
    public function unmute(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse {
        [$parsed, $options] = ActionUnmuteParams::parseRequest(
            ['exclude' => $exclude, 'participants' => $participants],
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

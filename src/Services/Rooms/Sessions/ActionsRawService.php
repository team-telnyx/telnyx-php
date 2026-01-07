<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms\Sessions;

use Telnyx\Client;
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
use Telnyx\ServiceContracts\Rooms\Sessions\ActionsRawContract;

/**
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants as ParticipantsShape1
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants as ParticipantsShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Note: this will also kick all participants currently present in the room
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionEndResponse>
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{
     *   exclude?: list<string>, participants?: ParticipantsShape
     * }|ActionKickParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionKickResponse>
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        array|ActionKickParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionKickParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{
     *   exclude?: list<string>, participants?: ParticipantsShape1
     * }|ActionMuteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionMuteResponse>
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        array|ActionMuteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionMuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{
     *   exclude?: list<string>, participants?: ParticipantsShape2
     * }|ActionUnmuteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionUnmuteResponse>
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        array|ActionUnmuteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionUnmuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/unmute', $roomSessionID],
            body: (object) $parsed,
            options: $options,
            convert: ActionUnmuteResponse::class,
        );
    }
}

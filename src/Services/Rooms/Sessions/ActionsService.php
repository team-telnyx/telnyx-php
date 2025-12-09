<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms\Sessions;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\UnionMember0;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;
use Telnyx\ServiceContracts\Rooms\Sessions\ActionsContract;

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
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        ?RequestOptions $requestOptions = null
    ): ActionEndResponse {
        /** @var BaseResponse<ActionEndResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/end', $roomSessionID],
            options: $requestOptions,
            convert: ActionEndResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Kick participants from a room session.
     *
     * @param array{
     *   exclude?: list<string>, participants?: 'all'|UnionMember0|list<string>
     * }|ActionKickParams $params
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        array|ActionKickParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse {
        [$parsed, $options] = ActionKickParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionKickResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/kick', $roomSessionID],
            body: (object) $parsed,
            options: $options,
            convert: ActionKickResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Mute participants in room session.
     *
     * @param array{
     *   exclude?: list<string>,
     *   participants?: 'all'|ActionMuteParams\Participants\UnionMember0|list<string>,
     * }|ActionMuteParams $params
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        array|ActionMuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse {
        [$parsed, $options] = ActionMuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionMuteResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/mute', $roomSessionID],
            body: (object) $parsed,
            options: $options,
            convert: ActionMuteResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Unmute participants in room session.
     *
     * @param array{
     *   exclude?: list<string>,
     *   participants?: 'all'|ActionUnmuteParams\Participants\UnionMember0|list<string>,
     * }|ActionUnmuteParams $params
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        array|ActionUnmuteParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse {
        [$parsed, $options] = ActionUnmuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionUnmuteResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['room_sessions/%1$s/actions/unmute', $roomSessionID],
            body: (object) $parsed,
            options: $options,
            convert: ActionUnmuteResponse::class,
        );

        return $response->parse();
    }
}

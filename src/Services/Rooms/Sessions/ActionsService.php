<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms\Sessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams;
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
     * @param array{
     *   exclude?: list<string>, participants?: 'all'|list<string>
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
     * @param array{
     *   exclude?: list<string>, participants?: 'all'|list<string>
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
     * @param array{
     *   exclude?: list<string>, participants?: 'all'|list<string>
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

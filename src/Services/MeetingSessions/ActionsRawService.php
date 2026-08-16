<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingSessions;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\Actions\ActionAcceptedResponse;
use Telnyx\MeetingSessions\Actions\ActionSendChatParams;
use Telnyx\MeetingSessions\Actions\ActionSpeakParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessions\ActionsRawContract;

/**
 * Send real-time speech and chat actions to an active meeting session.
 *
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
     * Sends a chat message into a meeting session.
     *
     * @param string $id unique identifier for the meeting session
     * @param array{text: string}|ActionSendChatParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionAcceptedResponse>
     *
     * @throws APIException
     */
    public function sendChat(
        string $id,
        array|ActionSendChatParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSendChatParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['meeting_sessions/%1$s/actions/send_chat', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionAcceptedResponse::class,
        );
    }

    /**
     * @api
     *
     * Sends audio / text-to-speech into a meeting session.
     *
     * @param string $id unique identifier for the meeting session
     * @param array{
     *   text: string, interrupt?: bool, voice?: string
     * }|ActionSpeakParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionAcceptedResponse>
     *
     * @throws APIException
     */
    public function speak(
        string $id,
        array|ActionSpeakParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSpeakParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['meeting_sessions/%1$s/actions/speak', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionAcceptedResponse::class,
        );
    }

    /**
     * @api
     *
     * Stops any active text-to-speech playback in a meeting session.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionAcceptedResponse>
     *
     * @throws APIException
     */
    public function stopSpeaking(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['meeting_sessions/%1$s/actions/stop_speaking', $id],
            options: $requestOptions,
            convert: ActionAcceptedResponse::class,
        );
    }
}

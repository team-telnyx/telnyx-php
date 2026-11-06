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
     * Send chat as the bot in an active meeting. Returns 202 with data.accepted=true. Google Meet and Teams confirm sending before success; 502 chat_not_sent means not sent, while chat_delivery_unknown means delivery may have occurred. Inspect chat and chat.sent events before retrying an uncertain send. Each request is a new message and is not idempotent. Google Meet and Teams allow at most 1000 chat requests per session, including an entrance message; exceeding this returns 409 invalid_state.
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
     * Sends audio / text-to-speech into a meeting session. With a Telnyx AI Assistant attached, wait for the assistant to connect before requesting speech. If audio delivery fails, the response can be 502, which may arrive without an error envelope, so branch on the status code before parsing a body. The assistant is designed to own the conversation, so prefer letting it speak or use `send_chat`. With a digital avatar (`assistant.avatar: true`), speak is refused with 409 `invalid_state` (message prefix `avatar_requires_assistant_speech:`): the avatar renders only the assistant's own speech.
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
     * Stops any active text-to-speech playback in a meeting session. Sessions with a digital avatar (`assistant.avatar: true`) return 409 `invalid_state` (message prefix `avatar_requires_assistant_speech:`): the avatar renders only the assistant's own speech.
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

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
     * Sends audio / text-to-speech into a meeting session. With a Telnyx AI Assistant (or avatar) attached, the bot is a webpage-output bot: the speak audio routes through the assistant's output page rather than the bot mic and plays once the assistant is connected -- it is not refused. If that page cannot be reached, delivery fails with the 502 below, which may arrive without an error envelope, so branch on the status code before parsing a body. The assistant is designed to own the conversation, so prefer letting it speak or use `send_chat`.
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

<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingSessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\MeetingSessions\Actions\ActionAcceptedResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessions\ActionsContract;

/**
 * Send real-time speech and chat actions to an active meeting session.
 *
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
     * Send chat as the bot in an active meeting. Returns 202 with data.accepted=true. Google Meet and Teams confirm sending before success; 502 chat_not_sent means not sent, while chat_delivery_unknown means delivery may have occurred. Inspect chat and chat.sent events before retrying an uncertain send. Each request is a new message and is not idempotent. Google Meet and Teams allow at most 1000 chat requests per session, including an entrance message; exceeding this returns 409 invalid_state.
     *
     * @param string $id unique identifier for the meeting session
     * @param string $text Message text, 1–4000 characters. On Google Meet and Teams, also at most 4096 UTF-8 bytes and nonblank; control characters other than tab and line breaks are rejected. CRLF is normalized to LF.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendChat(
        string $id,
        string $text,
        RequestOptions|array|null $requestOptions = null
    ): ActionAcceptedResponse {
        $params = ['text' => $text];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendChat($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends audio / text-to-speech into a meeting session. With a Telnyx AI Assistant attached, wait for the assistant to connect before requesting speech. If audio delivery fails, the response can be 502, which may arrive without an error envelope, so branch on the status code before parsing a body. The assistant is designed to own the conversation, so prefer letting it speak or use `send_chat`. With a digital avatar (`assistant.avatar: true`), speak is refused with 409 `invalid_state` (message prefix `avatar_requires_assistant_speech:`): the avatar renders only the assistant's own speech.
     *
     * @param string $id unique identifier for the meeting session
     * @param string $text text for the bot to speak
     * @param bool $interrupt if true, interrupt any currently playing audio to speak this text immediately
     * @param string $voice Voice identifier to use for this utterance. When supplied, it overrides the session-default voice configured at creation; otherwise the speak action uses that session default.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function speak(
        string $id,
        string $text,
        ?bool $interrupt = null,
        ?string $voice = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionAcceptedResponse {
        $params = array_filter(
            [
                'text' => $text,
                'interrupt' => $interrupt ?? Omitted::VALUE,
                'voice' => $voice ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->speak($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stops any active text-to-speech playback in a meeting session. Sessions with a digital avatar (`assistant.avatar: true`) return 409 `invalid_state` (message prefix `avatar_requires_assistant_speech:`): the avatar renders only the assistant's own speech.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopSpeaking(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionAcceptedResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stopSpeaking($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingSessions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
     * Sends a chat message into a meeting session.
     *
     * @param string $id unique identifier for the meeting session
     * @param string $text chat message text to send in the meeting
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendChat(
        string $id,
        string $text,
        RequestOptions|array|null $requestOptions = null
    ): ActionAcceptedResponse {
        $params = Util::removeNulls(['text' => $text]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendChat($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends audio / text-to-speech into a meeting session.
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
        $params = Util::removeNulls(
            ['text' => $text, 'interrupt' => $interrupt, 'voice' => $voice]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->speak($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stops any active text-to-speech playback in a meeting session.
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

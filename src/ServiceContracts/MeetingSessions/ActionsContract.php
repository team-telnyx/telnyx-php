<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MeetingSessions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\Actions\ActionAcceptedResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
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
    ): ActionAcceptedResponse;

    /**
     * @api
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
    ): ActionAcceptedResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stopSpeaking(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionAcceptedResponse;
}

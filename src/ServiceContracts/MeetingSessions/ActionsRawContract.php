<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MeetingSessions;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\Actions\ActionAcceptedResponse;
use Telnyx\MeetingSessions\Actions\ActionSendChatParams;
use Telnyx\MeetingSessions\Actions\ActionSpeakParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param array<string,mixed>|ActionSendChatParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param array<string,mixed>|ActionSpeakParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}

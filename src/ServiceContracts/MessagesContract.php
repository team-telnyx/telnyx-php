<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetResponse;
use Telnyx\Messages\MessageScheduleParams;
use Telnyx\Messages\MessageScheduleResponse;
use Telnyx\Messages\MessageSendGroupMmsParams;
use Telnyx\Messages\MessageSendGroupMmsResponse;
use Telnyx\Messages\MessageSendLongCodeParams;
use Telnyx\Messages\MessageSendLongCodeResponse;
use Telnyx\Messages\MessageSendNumberPoolParams;
use Telnyx\Messages\MessageSendNumberPoolResponse;
use Telnyx\Messages\MessageSendParams;
use Telnyx\Messages\MessageSendResponse;
use Telnyx\Messages\MessageSendShortCodeParams;
use Telnyx\Messages\MessageSendShortCodeResponse;
use Telnyx\RequestOptions;

interface MessagesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function cancelScheduled(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageCancelScheduledResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessageScheduleParams $params
     *
     * @throws APIException
     */
    public function schedule(
        array|MessageScheduleParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageScheduleResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessageSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|MessageSendParams $params,
        ?RequestOptions $requestOptions = null
    ): MessageSendResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessageSendGroupMmsParams $params
     *
     * @throws APIException
     */
    public function sendGroupMms(
        array|MessageSendGroupMmsParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendGroupMmsResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessageSendLongCodeParams $params
     *
     * @throws APIException
     */
    public function sendLongCode(
        array|MessageSendLongCodeParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendLongCodeResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessageSendNumberPoolParams $params
     *
     * @throws APIException
     */
    public function sendNumberPool(
        array|MessageSendNumberPoolParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendNumberPoolResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessageSendShortCodeParams $params
     *
     * @throws APIException
     */
    public function sendShortCode(
        array|MessageSendShortCodeParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendShortCodeResponse;
}

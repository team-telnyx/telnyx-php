<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetGroupMessagesResponse;
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
use Telnyx\Messages\MessageSendWhatsappParams;
use Telnyx\Messages\MessageSendWhatsappResponse;
use Telnyx\Messages\MessageSendWithAlphanumericSenderParams;
use Telnyx\Messages\MessageSendWithAlphanumericSenderResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param string $id The id of the message
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the message to cancel
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageCancelScheduledResponse>
     *
     * @throws APIException
     */
    public function cancelScheduled(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID the group message ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageGetGroupMessagesResponse>
     *
     * @throws APIException
     */
    public function retrieveGroupMessages(
        string $messageID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageScheduleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageScheduleResponse>
     *
     * @throws APIException
     */
    public function schedule(
        array|MessageScheduleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|MessageSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageSendGroupMmsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendGroupMmsResponse>
     *
     * @throws APIException
     */
    public function sendGroupMms(
        array|MessageSendGroupMmsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageSendLongCodeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendLongCodeResponse>
     *
     * @throws APIException
     */
    public function sendLongCode(
        array|MessageSendLongCodeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageSendNumberPoolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendNumberPoolResponse>
     *
     * @throws APIException
     */
    public function sendNumberPool(
        array|MessageSendNumberPoolParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageSendShortCodeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendShortCodeResponse>
     *
     * @throws APIException
     */
    public function sendShortCode(
        array|MessageSendShortCodeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageSendWhatsappParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendWhatsappResponse>
     *
     * @throws APIException
     */
    public function sendWhatsapp(
        array|MessageSendWhatsappParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageSendWithAlphanumericSenderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendWithAlphanumericSenderResponse>
     *
     * @throws APIException
     */
    public function sendWithAlphanumericSender(
        array|MessageSendWithAlphanumericSenderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

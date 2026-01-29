<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetResponse;
use Telnyx\Messages\MessageScheduleParams;
use Telnyx\Messages\MessageScheduleParams\Type;
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
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage;
use Telnyx\Messages\MessageSendWhatsappResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagesRawContract;

/**
 * @phpstan-import-type WhatsappMessageShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Note: This API endpoint can only retrieve messages that are no older than 10 days since their creation. If you require messages older than this, please generate an [MDR report.](https://developers.telnyx.com/api-reference/mdr-usage-reports/create-mdr-usage-report)
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messages/%1$s', $id],
            options: $requestOptions,
            convert: MessageGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Cancel a scheduled message that has not yet been sent. Only messages with `status=scheduled` and `send_at` more than a minute from now can be cancelled.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['messages/%1$s', $id],
            options: $requestOptions,
            convert: MessageCancelScheduledResponse::class,
        );
    }

    /**
     * @api
     *
     * Schedule a message with a Phone Number, Alphanumeric Sender ID, Short Code or Number Pool.
     *
     * This endpoint allows you to schedule a message with any messaging resource.
     * Current messaging resources include: long-code, short-code, number-pool, and
     * alphanumeric-sender-id.
     *
     * @param array{
     *   to: string,
     *   autoDetect?: bool,
     *   from?: string,
     *   mediaURLs?: list<string>,
     *   messagingProfileID?: string,
     *   sendAt?: \DateTimeInterface,
     *   subject?: string,
     *   text?: string,
     *   type?: Type|value-of<Type>,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageScheduleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageScheduleResponse>
     *
     * @throws APIException
     */
    public function schedule(
        array|MessageScheduleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageScheduleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages/schedule',
            body: (object) $parsed,
            options: $options,
            convert: MessageScheduleResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a message with a Phone Number, Alphanumeric Sender ID, Short Code or Number Pool.
     *
     * This endpoint allows you to send a message with any messaging resource.
     * Current messaging resources include: long-code, short-code, number-pool, and
     * alphanumeric-sender-id.
     *
     * @param array{
     *   to: string,
     *   autoDetect?: bool,
     *   from?: string,
     *   mediaURLs?: list<string>,
     *   messagingProfileID?: string,
     *   sendAt?: \DateTimeInterface|null,
     *   subject?: string,
     *   text?: string,
     *   type?: MessageSendParams\Type|value-of<MessageSendParams\Type>,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|MessageSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages',
            body: (object) $parsed,
            options: $options,
            convert: MessageSendResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a group MMS message
     *
     * @param array{
     *   from: string,
     *   to: list<string>,
     *   mediaURLs?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendGroupMmsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendGroupMmsResponse>
     *
     * @throws APIException
     */
    public function sendGroupMms(
        array|MessageSendGroupMmsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendGroupMmsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages/group_mms',
            body: (object) $parsed,
            options: $options,
            convert: MessageSendGroupMmsResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a long code message
     *
     * @param array{
     *   from: string,
     *   to: string,
     *   autoDetect?: bool,
     *   mediaURLs?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   type?: MessageSendLongCodeParams\Type|value-of<MessageSendLongCodeParams\Type>,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendLongCodeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendLongCodeResponse>
     *
     * @throws APIException
     */
    public function sendLongCode(
        array|MessageSendLongCodeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendLongCodeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages/long_code',
            body: (object) $parsed,
            options: $options,
            convert: MessageSendLongCodeResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a message using number pool
     *
     * @param array{
     *   messagingProfileID: string,
     *   to: string,
     *   autoDetect?: bool,
     *   mediaURLs?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   type?: MessageSendNumberPoolParams\Type|value-of<MessageSendNumberPoolParams\Type>,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendNumberPoolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendNumberPoolResponse>
     *
     * @throws APIException
     */
    public function sendNumberPool(
        array|MessageSendNumberPoolParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendNumberPoolParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages/number_pool',
            body: (object) $parsed,
            options: $options,
            convert: MessageSendNumberPoolResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a short code message
     *
     * @param array{
     *   from: string,
     *   to: string,
     *   autoDetect?: bool,
     *   mediaURLs?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   type?: MessageSendShortCodeParams\Type|value-of<MessageSendShortCodeParams\Type>,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendShortCodeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendShortCodeResponse>
     *
     * @throws APIException
     */
    public function sendShortCode(
        array|MessageSendShortCodeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendShortCodeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages/short_code',
            body: (object) $parsed,
            options: $options,
            convert: MessageSendShortCodeResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a Whatsapp message
     *
     * @param array{
     *   from: string,
     *   to: string,
     *   whatsappMessage: WhatsappMessage|WhatsappMessageShape,
     *   type?: MessageSendWhatsappParams\Type|value-of<MessageSendWhatsappParams\Type>,
     *   webhookURL?: string,
     * }|MessageSendWhatsappParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendWhatsappResponse>
     *
     * @throws APIException
     */
    public function sendWhatsapp(
        array|MessageSendWhatsappParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendWhatsappParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages/whatsapp',
            body: (object) $parsed,
            options: $options,
            convert: MessageSendWhatsappResponse::class,
        );
    }
}

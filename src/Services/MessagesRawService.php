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
use Telnyx\Messages\MessageSendWhatsappResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagesRawContract;

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
     * Note: This API endpoint can only retrieve messages that are no older than 10 days since their creation. If you require messages older than this, please generate an [MDR report.](https://developers.telnyx.com/api/v1/mission-control/add-mdr-request)
     *
     * @param string $id The id of the message
     *
     * @return BaseResponse<MessageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *
     * @return BaseResponse<MessageCancelScheduledResponse>
     *
     * @throws APIException
     */
    public function cancelScheduled(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   sendAt?: string|\DateTimeInterface,
     *   subject?: string,
     *   text?: string,
     *   type?: 'SMS'|'MMS'|Type,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageScheduleParams $params
     *
     * @return BaseResponse<MessageScheduleResponse>
     *
     * @throws APIException
     */
    public function schedule(
        array|MessageScheduleParams $params,
        ?RequestOptions $requestOptions = null
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
     *   sendAt?: string|\DateTimeInterface|null,
     *   subject?: string,
     *   text?: string,
     *   type?: 'SMS'|'MMS'|MessageSendParams\Type,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendParams $params
     *
     * @return BaseResponse<MessageSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|MessageSendParams $params,
        ?RequestOptions $requestOptions = null
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
     *
     * @return BaseResponse<MessageSendGroupMmsResponse>
     *
     * @throws APIException
     */
    public function sendGroupMms(
        array|MessageSendGroupMmsParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   type?: 'SMS'|'MMS'|MessageSendLongCodeParams\Type,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendLongCodeParams $params
     *
     * @return BaseResponse<MessageSendLongCodeResponse>
     *
     * @throws APIException
     */
    public function sendLongCode(
        array|MessageSendLongCodeParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   type?: 'SMS'|'MMS'|MessageSendNumberPoolParams\Type,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendNumberPoolParams $params
     *
     * @return BaseResponse<MessageSendNumberPoolResponse>
     *
     * @throws APIException
     */
    public function sendNumberPool(
        array|MessageSendNumberPoolParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   type?: 'SMS'|'MMS'|MessageSendShortCodeParams\Type,
     *   useProfileWebhooks?: bool,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|MessageSendShortCodeParams $params
     *
     * @return BaseResponse<MessageSendShortCodeResponse>
     *
     * @throws APIException
     */
    public function sendShortCode(
        array|MessageSendShortCodeParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   whatsappMessage: array{
     *     audio?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     bizOpaqueCallbackData?: string,
     *     contacts?: list<array{
     *       addresses?: list<array<string,mixed>>,
     *       birthday?: string,
     *       emails?: list<array<string,mixed>>,
     *       name?: string,
     *       org?: array<string,mixed>,
     *       phones?: list<array<string,mixed>>,
     *       urls?: list<array<string,mixed>>,
     *     }>,
     *     document?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     image?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     interactive?: array{
     *       action?: array{
     *         button?: string,
     *         buttons?: list<array<string,mixed>>,
     *         cards?: list<array<string,mixed>>,
     *         catalogID?: string,
     *         mode?: string,
     *         name?: string,
     *         parameters?: array<string,mixed>,
     *         productRetailerID?: string,
     *         sections?: list<array<string,mixed>>,
     *       },
     *       body?: array{text?: string},
     *       footer?: array{text?: string},
     *       header?: array{
     *         document?: array<string,mixed>,
     *         image?: array<string,mixed>,
     *         subText?: string,
     *         text?: string,
     *         video?: array<string,mixed>,
     *       },
     *       type?: 'cta_url'|'list'|'carousel'|'button'|'location_request_message'|MessageSendWhatsappParams\WhatsappMessage\Interactive\Type,
     *     },
     *     location?: array{
     *       address?: string, latitude?: string, longitude?: string, name?: string
     *     },
     *     reaction?: array{emoji?: string, messageID?: string},
     *     sticker?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     type?: 'audio'|'document'|'image'|'sticker'|'video'|'interactive'|'location'|'template'|'reaction'|'contacts'|MessageSendWhatsappParams\WhatsappMessage\Type,
     *     video?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *   },
     *   type?: 'WHATSAPP'|MessageSendWhatsappParams\Type,
     *   webhookURL?: string,
     * }|MessageSendWhatsappParams $params
     *
     * @return BaseResponse<MessageSendWhatsappResponse>
     *
     * @throws APIException
     */
    public function sendWhatsapp(
        array|MessageSendWhatsappParams $params,
        ?RequestOptions $requestOptions = null,
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

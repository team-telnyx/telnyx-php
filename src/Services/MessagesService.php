<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
use Telnyx\ServiceContracts\MessagesContract;
use Telnyx\Services\Messages\RcsService;

final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public RcsService $rcs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->rcs = new RcsService($client);
    }

    /**
     * @api
     *
     * Note: This API endpoint can only retrieve messages that are no older than 10 days since their creation. If you require messages older than this, please generate an [MDR report.](https://developers.telnyx.com/api/v1/mission-control/add-mdr-request)
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageGetResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function cancelScheduled(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageCancelScheduledResponse {
        // @phpstan-ignore-next-line;
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
     *   auto_detect?: bool,
     *   from?: string,
     *   media_urls?: list<string>,
     *   messaging_profile_id?: string,
     *   send_at?: string|\DateTimeInterface,
     *   subject?: string,
     *   text?: string,
     *   type?: "SMS"|"MMS",
     *   use_profile_webhooks?: bool,
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|MessageScheduleParams $params
     *
     * @throws APIException
     */
    public function schedule(
        array|MessageScheduleParams $params,
        ?RequestOptions $requestOptions = null
    ): MessageScheduleResponse {
        [$parsed, $options] = MessageScheduleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     *   auto_detect?: bool,
     *   from?: string,
     *   media_urls?: list<string>,
     *   messaging_profile_id?: string,
     *   send_at?: string|\DateTimeInterface|null,
     *   subject?: string,
     *   text?: string,
     *   type?: "SMS"|"MMS",
     *   use_profile_webhooks?: bool,
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|MessageSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|MessageSendParams $params,
        ?RequestOptions $requestOptions = null
    ): MessageSendResponse {
        [$parsed, $options] = MessageSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     *   media_urls?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   use_profile_webhooks?: bool,
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|MessageSendGroupMmsParams $params
     *
     * @throws APIException
     */
    public function sendGroupMms(
        array|MessageSendGroupMmsParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendGroupMmsResponse {
        [$parsed, $options] = MessageSendGroupMmsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     *   auto_detect?: bool,
     *   media_urls?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   type?: "SMS"|"MMS",
     *   use_profile_webhooks?: bool,
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|MessageSendLongCodeParams $params
     *
     * @throws APIException
     */
    public function sendLongCode(
        array|MessageSendLongCodeParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendLongCodeResponse {
        [$parsed, $options] = MessageSendLongCodeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     *   messaging_profile_id: string,
     *   to: string,
     *   auto_detect?: bool,
     *   media_urls?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   type?: "SMS"|"MMS",
     *   use_profile_webhooks?: bool,
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|MessageSendNumberPoolParams $params
     *
     * @throws APIException
     */
    public function sendNumberPool(
        array|MessageSendNumberPoolParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendNumberPoolResponse {
        [$parsed, $options] = MessageSendNumberPoolParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     *   auto_detect?: bool,
     *   media_urls?: list<string>,
     *   subject?: string,
     *   text?: string,
     *   type?: "SMS"|"MMS",
     *   use_profile_webhooks?: bool,
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|MessageSendShortCodeParams $params
     *
     * @throws APIException
     */
    public function sendShortCode(
        array|MessageSendShortCodeParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageSendShortCodeResponse {
        [$parsed, $options] = MessageSendShortCodeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'messages/short_code',
            body: (object) $parsed,
            options: $options,
            convert: MessageSendShortCodeResponse::class,
        );
    }
}

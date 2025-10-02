<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagesContract;
use Telnyx\Services\Messages\RcsService;

use const Telnyx\Core\OMIT as omit;

final class MessagesService implements MessagesContract
{
    /**
     * @@api
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
     * @return MessageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     * @return MessageCancelScheduledResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function cancelScheduled(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageCancelScheduledResponse {
        $params = [];

        return $this->cancelScheduledRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessageCancelScheduledResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function cancelScheduledRaw(
        string $id,
        mixed $params,
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
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param string $from Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $messagingProfileID Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     * @param \DateTimeInterface $sendAt ISO 8601 formatted date indicating when to send the message - accurate up till a minute
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param Type|value-of<Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @return MessageScheduleResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function schedule(
        $to,
        $autoDetect = omit,
        $from = omit,
        $mediaURLs = omit,
        $messagingProfileID = omit,
        $sendAt = omit,
        $subject = omit,
        $text = omit,
        $type = omit,
        $useProfileWebhooks = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MessageScheduleResponse {
        $params = [
            'to' => $to,
            'autoDetect' => $autoDetect,
            'from' => $from,
            'mediaURLs' => $mediaURLs,
            'messagingProfileID' => $messagingProfileID,
            'sendAt' => $sendAt,
            'subject' => $subject,
            'text' => $text,
            'type' => $type,
            'useProfileWebhooks' => $useProfileWebhooks,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->scheduleRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessageScheduleResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function scheduleRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageScheduleResponse {
        [$parsed, $options] = MessageScheduleParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param string $from Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $messagingProfileID Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     * @param \DateTimeInterface|null $sendAt ISO 8601 formatted date indicating when to send the message - accurate up till a minute
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param Telnyx\Messages\MessageSendParams\Type|value-of<Telnyx\Messages\MessageSendParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @return MessageSendResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function send(
        $to,
        $autoDetect = omit,
        $from = omit,
        $mediaURLs = omit,
        $messagingProfileID = omit,
        $sendAt = omit,
        $subject = omit,
        $text = omit,
        $type = omit,
        $useProfileWebhooks = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MessageSendResponse {
        $params = [
            'to' => $to,
            'autoDetect' => $autoDetect,
            'from' => $from,
            'mediaURLs' => $mediaURLs,
            'messagingProfileID' => $messagingProfileID,
            'sendAt' => $sendAt,
            'subject' => $subject,
            'text' => $text,
            'type' => $type,
            'useProfileWebhooks' => $useProfileWebhooks,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->sendRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessageSendResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageSendResponse {
        [$parsed, $options] = MessageSendParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $from Phone number, in +E.164 format, used to send the message.
     * @param list<string> $to A list of destinations. No more than 8 destinations are allowed.
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @return MessageSendGroupMmsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendGroupMms(
        $from,
        $to,
        $mediaURLs = omit,
        $subject = omit,
        $text = omit,
        $useProfileWebhooks = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MessageSendGroupMmsResponse {
        $params = [
            'from' => $from,
            'to' => $to,
            'mediaURLs' => $mediaURLs,
            'subject' => $subject,
            'text' => $text,
            'useProfileWebhooks' => $useProfileWebhooks,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->sendGroupMmsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessageSendGroupMmsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendGroupMmsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageSendGroupMmsResponse {
        [$parsed, $options] = MessageSendGroupMmsParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $from Phone number, in +E.164 format, used to send the message.
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param Telnyx\Messages\MessageSendLongCodeParams\Type|value-of<Telnyx\Messages\MessageSendLongCodeParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @return MessageSendLongCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendLongCode(
        $from,
        $to,
        $autoDetect = omit,
        $mediaURLs = omit,
        $subject = omit,
        $text = omit,
        $type = omit,
        $useProfileWebhooks = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MessageSendLongCodeResponse {
        $params = [
            'from' => $from,
            'to' => $to,
            'autoDetect' => $autoDetect,
            'mediaURLs' => $mediaURLs,
            'subject' => $subject,
            'text' => $text,
            'type' => $type,
            'useProfileWebhooks' => $useProfileWebhooks,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->sendLongCodeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessageSendLongCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendLongCodeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageSendLongCodeResponse {
        [$parsed, $options] = MessageSendLongCodeParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $messagingProfileID unique identifier for a messaging profile
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param Telnyx\Messages\MessageSendNumberPoolParams\Type|value-of<Telnyx\Messages\MessageSendNumberPoolParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @return MessageSendNumberPoolResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendNumberPool(
        $messagingProfileID,
        $to,
        $autoDetect = omit,
        $mediaURLs = omit,
        $subject = omit,
        $text = omit,
        $type = omit,
        $useProfileWebhooks = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MessageSendNumberPoolResponse {
        $params = [
            'messagingProfileID' => $messagingProfileID,
            'to' => $to,
            'autoDetect' => $autoDetect,
            'mediaURLs' => $mediaURLs,
            'subject' => $subject,
            'text' => $text,
            'type' => $type,
            'useProfileWebhooks' => $useProfileWebhooks,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->sendNumberPoolRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessageSendNumberPoolResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendNumberPoolRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageSendNumberPoolResponse {
        [$parsed, $options] = MessageSendNumberPoolParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $from Phone number, in +E.164 format, used to send the message.
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param Telnyx\Messages\MessageSendShortCodeParams\Type|value-of<Telnyx\Messages\MessageSendShortCodeParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @return MessageSendShortCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendShortCode(
        $from,
        $to,
        $autoDetect = omit,
        $mediaURLs = omit,
        $subject = omit,
        $text = omit,
        $type = omit,
        $useProfileWebhooks = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MessageSendShortCodeResponse {
        $params = [
            'from' => $from,
            'to' => $to,
            'autoDetect' => $autoDetect,
            'mediaURLs' => $mediaURLs,
            'subject' => $subject,
            'text' => $text,
            'type' => $type,
            'useProfileWebhooks' => $useProfileWebhooks,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->sendShortCodeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessageSendShortCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function sendShortCodeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageSendShortCodeResponse {
        [$parsed, $options] = MessageSendShortCodeParams::parseRequest(
            $params,
            $requestOptions
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

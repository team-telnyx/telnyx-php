<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetGroupMessagesResponse;
use Telnyx\Messages\MessageGetResponse;
use Telnyx\Messages\MessageScheduleParams\Type;
use Telnyx\Messages\MessageScheduleResponse;
use Telnyx\Messages\MessageSendGroupMmsResponse;
use Telnyx\Messages\MessageSendLongCodeResponse;
use Telnyx\Messages\MessageSendNumberPoolResponse;
use Telnyx\Messages\MessageSendParams\Encoding;
use Telnyx\Messages\MessageSendResponse;
use Telnyx\Messages\MessageSendShortCodeResponse;
use Telnyx\Messages\MessageSendWithAlphanumericSenderResponse;
use Telnyx\Messages\MessageWhatsappParams\WhatsappMessage;
use Telnyx\Messages\MessageWhatsappResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagesContract;
use Telnyx\Services\Messages\RcsService;

/**
 * @phpstan-import-type WhatsappMessageShape from \Telnyx\Messages\MessageWhatsappParams\WhatsappMessage
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @api
     */
    public RcsService $rcs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
        $this->rcs = new RcsService($client);
    }

    /**
     * @api
     *
     * Note: This API endpoint can only retrieve messages that are no older than 10 days since their creation. If you require messages older than this, please generate an [MDR report.](https://developers.telnyx.com/api-reference/mdr-usage-reports/create-mdr-usage-report)
     *
     * @param string $id The id of the message
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessageGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Cancel a scheduled message that has not yet been sent. Only messages with `status=scheduled` and `send_at` more than a minute from now can be cancelled.
     *
     * @param string $id The id of the message to cancel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancelScheduled(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessageCancelScheduledResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancelScheduled($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all messages in a group MMS conversation by the group message ID.
     *
     * @param string $messageID the group message ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveGroupMessages(
        string $messageID,
        RequestOptions|array|null $requestOptions = null
    ): MessageGetGroupMessagesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveGroupMessages($messageID, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function schedule(
        string $to,
        bool $autoDetect = false,
        ?string $from = null,
        ?array $mediaURLs = null,
        ?string $messagingProfileID = null,
        ?\DateTimeInterface $sendAt = null,
        ?string $subject = null,
        ?string $text = null,
        Type|string|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageScheduleResponse {
        $params = array_filter(
            [
                'to' => $to,
                'autoDetect' => $autoDetect,
                'from' => $from ?? Omitted::VALUE,
                'mediaURLs' => $mediaURLs ?? Omitted::VALUE,
                'messagingProfileID' => $messagingProfileID ?? Omitted::VALUE,
                'sendAt' => $sendAt ?? Omitted::VALUE,
                'subject' => $subject ?? Omitted::VALUE,
                'text' => $text ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->schedule(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param string $to Body param: Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect body param: Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param Encoding|value-of<Encoding> $encoding Body param: Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     * @param string $from Body param: Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     * @param list<string> $mediaURLs Body param: A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $messagingProfileID Body param: Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     * @param \DateTimeInterface|Omitted|null $sendAt body param: ISO 8601 formatted date indicating when to send the message - accurate up till a minute
     * @param string $subject Body param: Subject of multimedia message
     * @param string $text Body param: Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param \Telnyx\Messages\MessageSendParams\Type|value-of<\Telnyx\Messages\MessageSendParams\Type> $type body param: The protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks Body param: If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL body param: The failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL body param: The URL where webhooks related to this message will be sent
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $to,
        bool $autoDetect = false,
        Encoding|string $encoding = 'auto',
        ?string $from = null,
        ?array $mediaURLs = null,
        ?string $messagingProfileID = null,
        \DateTimeInterface|Omitted|null $sendAt = Omitted::VALUE,
        ?string $subject = null,
        ?string $text = null,
        \Telnyx\Messages\MessageSendParams\Type|string|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendResponse {
        $params = array_filter(
            [
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
                'from' => $from ?? Omitted::VALUE,
                'mediaURLs' => $mediaURLs ?? Omitted::VALUE,
                'messagingProfileID' => $messagingProfileID ?? Omitted::VALUE,
                'sendAt' => $sendAt,
                'subject' => $subject ?? Omitted::VALUE,
                'text' => $text ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Queues an MMS addressed to multiple recipients as a group conversation. Delivery events are reported asynchronously through messaging webhooks.
     *
     * @param string $from Body param: Phone number, in +E.164 format, used to send the message.
     * @param list<string> $to Body param: A list of destinations. No more than 8 destinations are allowed.
     * @param list<string> $mediaURLs Body param: A list of media URLs. The total media size must be less than 1 MB.
     * @param string $subject Body param: Subject of multimedia message
     * @param string $text Body param: Message body (i.e., content) as a non-empty string.
     * @param bool $useProfileWebhooks Body param: If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL body param: The failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL body param: The URL where webhooks related to this message will be sent
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendGroupMms(
        string $from,
        array $to,
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendGroupMmsResponse {
        $params = array_filter(
            [
                'from' => $from,
                'to' => $to,
                'mediaURLs' => $mediaURLs ?? Omitted::VALUE,
                'subject' => $subject ?? Omitted::VALUE,
                'text' => $text ?? Omitted::VALUE,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendGroupMms(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Queues an outbound SMS or MMS using a long-code sender. Delivery progress and final disposition are reported asynchronously through messaging webhooks.
     *
     * @param string $from Body param: Phone number, in +E.164 format, used to send the message.
     * @param string $to Body param: Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect body param: Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param \Telnyx\Messages\MessageSendLongCodeParams\Encoding|value-of<\Telnyx\Messages\MessageSendLongCodeParams\Encoding> $encoding Body param: Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     * @param list<string> $mediaURLs Body param: A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Body param: Subject of multimedia message
     * @param string $text Body param: Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param \Telnyx\Messages\MessageSendLongCodeParams\Type|value-of<\Telnyx\Messages\MessageSendLongCodeParams\Type> $type body param: The protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks Body param: If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL body param: The failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL body param: The URL where webhooks related to this message will be sent
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendLongCode(
        string $from,
        string $to,
        bool $autoDetect = false,
        \Telnyx\Messages\MessageSendLongCodeParams\Encoding|string $encoding = 'auto',
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        \Telnyx\Messages\MessageSendLongCodeParams\Type|string|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendLongCodeResponse {
        $params = array_filter(
            [
                'from' => $from,
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
                'mediaURLs' => $mediaURLs ?? Omitted::VALUE,
                'subject' => $subject ?? Omitted::VALUE,
                'text' => $text ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendLongCode(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Queues an outbound message using a number pool. Telnyx selects an eligible sender from the pool according to its messaging profile configuration.
     *
     * @param string $messagingProfileID body param: Unique identifier for a messaging profile
     * @param string $to Body param: Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect body param: Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param \Telnyx\Messages\MessageSendNumberPoolParams\Encoding|value-of<\Telnyx\Messages\MessageSendNumberPoolParams\Encoding> $encoding Body param: Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     * @param list<string> $mediaURLs Body param: A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Body param: Subject of multimedia message
     * @param string $text Body param: Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param \Telnyx\Messages\MessageSendNumberPoolParams\Type|value-of<\Telnyx\Messages\MessageSendNumberPoolParams\Type> $type body param: The protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks Body param: If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL body param: The failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL body param: The URL where webhooks related to this message will be sent
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendNumberPool(
        string $messagingProfileID,
        string $to,
        bool $autoDetect = false,
        \Telnyx\Messages\MessageSendNumberPoolParams\Encoding|string $encoding = 'auto',
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        \Telnyx\Messages\MessageSendNumberPoolParams\Type|string|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendNumberPoolResponse {
        $params = array_filter(
            [
                'messagingProfileID' => $messagingProfileID,
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
                'mediaURLs' => $mediaURLs ?? Omitted::VALUE,
                'subject' => $subject ?? Omitted::VALUE,
                'text' => $text ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendNumberPool(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Queues an outbound SMS or MMS using a short-code sender. Delivery progress and final disposition are reported asynchronously through messaging webhooks.
     *
     * @param string $from Body param: Phone number, in +E.164 format, used to send the message.
     * @param string $to Body param: Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect body param: Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param \Telnyx\Messages\MessageSendShortCodeParams\Encoding|value-of<\Telnyx\Messages\MessageSendShortCodeParams\Encoding> $encoding Body param: Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     * @param list<string> $mediaURLs Body param: A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Body param: Subject of multimedia message
     * @param string $text Body param: Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param \Telnyx\Messages\MessageSendShortCodeParams\Type|value-of<\Telnyx\Messages\MessageSendShortCodeParams\Type> $type body param: The protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks Body param: If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL body param: The failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL body param: The URL where webhooks related to this message will be sent
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendShortCode(
        string $from,
        string $to,
        bool $autoDetect = false,
        \Telnyx\Messages\MessageSendShortCodeParams\Encoding|string $encoding = 'auto',
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        \Telnyx\Messages\MessageSendShortCodeParams\Type|string|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendShortCodeResponse {
        $params = array_filter(
            [
                'from' => $from,
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
                'mediaURLs' => $mediaURLs ?? Omitted::VALUE,
                'subject' => $subject ?? Omitted::VALUE,
                'text' => $text ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendShortCode(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send an SMS message using an alphanumeric sender ID. This is SMS only.
     *
     * @param string $from body param: A valid alphanumeric sender ID on the user's account
     * @param string $messagingProfileID body param: The messaging profile ID to use
     * @param string $text body param: The message body
     * @param string $to Body param: Receiving address (+E.164 formatted phone number).
     * @param bool $useProfileWebhooks body param: If true, use the messaging profile's webhook settings
     * @param string|Omitted|null $webhookFailoverURL body param: Failover callback URL for delivery status updates
     * @param string|Omitted|null $webhookURL body param: Callback URL for delivery status updates
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendWithAlphanumericSender(
        string $from,
        string $messagingProfileID,
        string $text,
        string $to,
        ?bool $useProfileWebhooks = null,
        string|Omitted|null $webhookFailoverURL = Omitted::VALUE,
        string|Omitted|null $webhookURL = Omitted::VALUE,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendWithAlphanumericSenderResponse {
        $params = array_filter(
            [
                'from' => $from,
                'messagingProfileID' => $messagingProfileID,
                'text' => $text,
                'to' => $to,
                'useProfileWebhooks' => $useProfileWebhooks ?? Omitted::VALUE,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendWithAlphanumericSender(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends a WhatsApp message using a Telnyx WhatsApp-enabled number. The message body, interactive elements, media, location, and reaction content are specified in the `whatsapp_message` field. Delivery progress and final disposition are reported asynchronously through messaging webhooks.
     *
     * @param string $from Body param: Phone number in +E.164 format associated with Whatsapp account
     * @param string $to Body param: Recipient phone number in +E.164 format, or the business-scoped user ID (BSUID) of a WhatsApp user who hides their phone number, for example `US.13491208655302741918`. Authentication templates cannot be sent to a BSUID.
     * @param WhatsappMessage|WhatsappMessageShape $whatsappMessage Body param
     * @param string $messagingProfileID Body param: Messaging profile ID - required if the 'from' number is not SMS-enabled
     * @param \Telnyx\Messages\MessageWhatsappParams\Type|value-of<\Telnyx\Messages\MessageWhatsappParams\Type> $type Body param: Message type - must be set to "WHATSAPP"
     * @param string $webhookURL body param: The URL where webhooks related to this message will be sent
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function whatsapp(
        string $from,
        string $to,
        WhatsappMessage|array $whatsappMessage,
        ?string $messagingProfileID = null,
        \Telnyx\Messages\MessageWhatsappParams\Type|string|null $type = null,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageWhatsappResponse {
        $params = array_filter(
            [
                'from' => $from,
                'to' => $to,
                'whatsappMessage' => $whatsappMessage,
                'messagingProfileID' => $messagingProfileID ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->whatsapp(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

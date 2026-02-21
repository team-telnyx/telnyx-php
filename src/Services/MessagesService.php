<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage;
use Telnyx\Messages\MessageSendWhatsappResponse;
use Telnyx\Messages\MessageSendWithAlphanumericSenderResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagesContract;
use Telnyx\Services\Messages\RcsService;

/**
 * @phpstan-import-type WhatsappMessageShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage
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
        $params = Util::removeNulls(
            [
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
            ],
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
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param Encoding|value-of<Encoding> $encoding Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
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
     * @param \Telnyx\Messages\MessageSendParams\Type|value-of<\Telnyx\Messages\MessageSendParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
        ?\DateTimeInterface $sendAt = null,
        ?string $subject = null,
        ?string $text = null,
        \Telnyx\Messages\MessageSendParams\Type|string|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendResponse {
        $params = Util::removeNulls(
            [
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendGroupMmsResponse {
        $params = Util::removeNulls(
            [
                'from' => $from,
                'to' => $to,
                'mediaURLs' => $mediaURLs,
                'subject' => $subject,
                'text' => $text,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendGroupMms(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a long code message
     *
     * @param string $from Phone number, in +E.164 format, used to send the message.
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param \Telnyx\Messages\MessageSendLongCodeParams\Encoding|value-of<\Telnyx\Messages\MessageSendLongCodeParams\Encoding> $encoding Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param \Telnyx\Messages\MessageSendLongCodeParams\Type|value-of<\Telnyx\Messages\MessageSendLongCodeParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendLongCodeResponse {
        $params = Util::removeNulls(
            [
                'from' => $from,
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
                'mediaURLs' => $mediaURLs,
                'subject' => $subject,
                'text' => $text,
                'type' => $type,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendLongCode(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a message using number pool
     *
     * @param string $messagingProfileID unique identifier for a messaging profile
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param \Telnyx\Messages\MessageSendNumberPoolParams\Encoding|value-of<\Telnyx\Messages\MessageSendNumberPoolParams\Encoding> $encoding Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param \Telnyx\Messages\MessageSendNumberPoolParams\Type|value-of<\Telnyx\Messages\MessageSendNumberPoolParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendNumberPoolResponse {
        $params = Util::removeNulls(
            [
                'messagingProfileID' => $messagingProfileID,
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
                'mediaURLs' => $mediaURLs,
                'subject' => $subject,
                'text' => $text,
                'type' => $type,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendNumberPool(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a short code message
     *
     * @param string $from Phone number, in +E.164 format, used to send the message.
     * @param string $to Receiving address (+E.164 formatted phone number or short code).
     * @param bool $autoDetect automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts
     * @param \Telnyx\Messages\MessageSendShortCodeParams\Encoding|value-of<\Telnyx\Messages\MessageSendShortCodeParams\Encoding> $encoding Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param \Telnyx\Messages\MessageSendShortCodeParams\Type|value-of<\Telnyx\Messages\MessageSendShortCodeParams\Type> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendShortCodeResponse {
        $params = Util::removeNulls(
            [
                'from' => $from,
                'to' => $to,
                'autoDetect' => $autoDetect,
                'encoding' => $encoding,
                'mediaURLs' => $mediaURLs,
                'subject' => $subject,
                'text' => $text,
                'type' => $type,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendShortCode(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a Whatsapp message
     *
     * @param string $from Phone number in +E.164 format associated with Whatsapp account
     * @param string $to Phone number in +E.164 format
     * @param WhatsappMessage|WhatsappMessageShape $whatsappMessage
     * @param \Telnyx\Messages\MessageSendWhatsappParams\Type|value-of<\Telnyx\Messages\MessageSendWhatsappParams\Type> $type Message type - must be set to "WHATSAPP"
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendWhatsapp(
        string $from,
        string $to,
        WhatsappMessage|array $whatsappMessage,
        \Telnyx\Messages\MessageSendWhatsappParams\Type|string|null $type = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendWhatsappResponse {
        $params = Util::removeNulls(
            [
                'from' => $from,
                'to' => $to,
                'whatsappMessage' => $whatsappMessage,
                'type' => $type,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendWhatsapp(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send an SMS message using an alphanumeric sender ID. This is SMS only.
     *
     * @param string $from a valid alphanumeric sender ID on the user's account
     * @param string $messagingProfileID the messaging profile ID to use
     * @param string $text the message body
     * @param string $to Receiving address (+E.164 formatted phone number).
     * @param bool $useProfileWebhooks if true, use the messaging profile's webhook settings
     * @param string|null $webhookFailoverURL failover callback URL for delivery status updates
     * @param string|null $webhookURL callback URL for delivery status updates
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
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendWithAlphanumericSenderResponse {
        $params = Util::removeNulls(
            [
                'from' => $from,
                'messagingProfileID' => $messagingProfileID,
                'text' => $text,
                'to' => $to,
                'useProfileWebhooks' => $useProfileWebhooks,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendWithAlphanumericSender(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

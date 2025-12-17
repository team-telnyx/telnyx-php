<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetResponse;
use Telnyx\Messages\MessageScheduleResponse;
use Telnyx\Messages\MessageSendGroupMmsResponse;
use Telnyx\Messages\MessageSendLongCodeResponse;
use Telnyx\Messages\MessageSendNumberPoolResponse;
use Telnyx\Messages\MessageSendResponse;
use Telnyx\Messages\MessageSendShortCodeResponse;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Button\Type;
use Telnyx\Messages\MessageSendWhatsappResponse;
use Telnyx\Messages\WhatsappMedia;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagesContract;
use Telnyx\Services\Messages\RcsService;

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
     * Note: This API endpoint can only retrieve messages that are no older than 10 days since their creation. If you require messages older than this, please generate an [MDR report.](https://developers.telnyx.com/api/v1/mission-control/add-mdr-request)
     *
     * @param string $id The id of the message
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function cancelScheduled(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageCancelScheduledResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancelScheduled($id, requestOptions: $requestOptions);

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
     * @param string|\DateTimeInterface $sendAt ISO 8601 formatted date indicating when to send the message - accurate up till a minute
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param 'SMS'|'MMS'|\Telnyx\Messages\MessageScheduleParams\Type $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function schedule(
        string $to,
        bool $autoDetect = false,
        ?string $from = null,
        ?array $mediaURLs = null,
        ?string $messagingProfileID = null,
        string|\DateTimeInterface|null $sendAt = null,
        ?string $subject = null,
        ?string $text = null,
        string|\Telnyx\Messages\MessageScheduleParams\Type|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
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
     * @param string $from Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $messagingProfileID Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     * @param string|\DateTimeInterface|null $sendAt ISO 8601 formatted date indicating when to send the message - accurate up till a minute
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param 'SMS'|'MMS'|\Telnyx\Messages\MessageSendParams\Type $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function send(
        string $to,
        bool $autoDetect = false,
        ?string $from = null,
        ?array $mediaURLs = null,
        ?string $messagingProfileID = null,
        string|\DateTimeInterface|null $sendAt = null,
        ?string $subject = null,
        ?string $text = null,
        string|\Telnyx\Messages\MessageSendParams\Type|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): MessageSendResponse {
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
        ?RequestOptions $requestOptions = null,
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
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param 'SMS'|'MMS'|\Telnyx\Messages\MessageSendLongCodeParams\Type $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function sendLongCode(
        string $from,
        string $to,
        bool $autoDetect = false,
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        string|\Telnyx\Messages\MessageSendLongCodeParams\Type|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): MessageSendLongCodeResponse {
        $params = Util::removeNulls(
            [
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
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param 'SMS'|'MMS'|\Telnyx\Messages\MessageSendNumberPoolParams\Type $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function sendNumberPool(
        string $messagingProfileID,
        string $to,
        bool $autoDetect = false,
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        string|\Telnyx\Messages\MessageSendNumberPoolParams\Type|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): MessageSendNumberPoolResponse {
        $params = Util::removeNulls(
            [
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
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     * @param 'SMS'|'MMS'|\Telnyx\Messages\MessageSendShortCodeParams\Type $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function sendShortCode(
        string $from,
        string $to,
        bool $autoDetect = false,
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        string|\Telnyx\Messages\MessageSendShortCodeParams\Type|null $type = null,
        bool $useProfileWebhooks = true,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): MessageSendShortCodeResponse {
        $params = Util::removeNulls(
            [
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
     * @param array{
     *   audio?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   bizOpaqueCallbackData?: string,
     *   contacts?: list<array{
     *     addresses?: list<array{
     *       city?: string,
     *       country?: string,
     *       countryCode?: string,
     *       state?: string,
     *       street?: string,
     *       type?: string,
     *       zip?: string,
     *     }>,
     *     birthday?: string,
     *     emails?: list<array{email?: string, type?: string}>,
     *     name?: string,
     *     org?: array{company?: string, department?: string, title?: string},
     *     phones?: list<array{phone?: string, type?: string, waID?: string}>,
     *     urls?: list<array{type?: string, url?: string}>,
     *   }>,
     *   document?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   image?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   interactive?: array{
     *     action?: array{
     *       button?: string,
     *       buttons?: list<array{
     *         reply?: array{id?: string, title?: string}, type?: 'reply'|Type
     *       }>,
     *       cards?: list<array{
     *         action?: array{catalogID?: string, productRetailerID?: string},
     *         body?: array{text?: string},
     *         cardIndex?: int,
     *         header?: array{
     *           image?: array{
     *             caption?: string, filename?: string, link?: string, voice?: bool
     *           }|WhatsappMedia,
     *           type?: 'image'|'video'|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type,
     *           video?: array{
     *             caption?: string, filename?: string, link?: string, voice?: bool
     *           }|WhatsappMedia,
     *         },
     *         type?: 'cta_url'|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Type,
     *       }>,
     *       catalogID?: string,
     *       mode?: string,
     *       name?: string,
     *       parameters?: array{displayText?: string, url?: string},
     *       productRetailerID?: string,
     *       sections?: list<array{
     *         productItems?: list<array{productRetailerID?: string}>,
     *         rows?: list<array{id?: string, description?: string, title?: string}>,
     *         title?: string,
     *       }>,
     *     },
     *     body?: array{text?: string},
     *     footer?: array{text?: string},
     *     header?: array{
     *       document?: array{
     *         caption?: string, filename?: string, link?: string, voice?: bool
     *       }|WhatsappMedia,
     *       image?: array{
     *         caption?: string, filename?: string, link?: string, voice?: bool
     *       }|WhatsappMedia,
     *       subText?: string,
     *       text?: string,
     *       video?: array{
     *         caption?: string, filename?: string, link?: string, voice?: bool
     *       }|WhatsappMedia,
     *     },
     *     type?: 'cta_url'|'list'|'carousel'|'button'|'location_request_message'|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Type,
     *   },
     *   location?: array{
     *     address?: string, latitude?: string, longitude?: string, name?: string
     *   },
     *   reaction?: array{emoji?: string, messageID?: string},
     *   sticker?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   type?: 'audio'|'document'|'image'|'sticker'|'video'|'interactive'|'location'|'template'|'reaction'|'contacts'|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Type,
     *   video?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     * } $whatsappMessage
     * @param 'WHATSAPP'|\Telnyx\Messages\MessageSendWhatsappParams\Type $type Message type - must be set to "WHATSAPP"
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function sendWhatsapp(
        string $from,
        string $to,
        array $whatsappMessage,
        string|\Telnyx\Messages\MessageSendWhatsappParams\Type|null $type = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
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
}

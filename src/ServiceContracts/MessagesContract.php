<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Messages\MessageCancelScheduledResponse;
use Telnyx\Messages\MessageGetResponse;
use Telnyx\Messages\MessageScheduleParams\Type;
use Telnyx\Messages\MessageScheduleResponse;
use Telnyx\Messages\MessageSendGroupMmsResponse;
use Telnyx\Messages\MessageSendLongCodeParams\Type as Type2;
use Telnyx\Messages\MessageSendLongCodeResponse;
use Telnyx\Messages\MessageSendNumberPoolParams\Type as Type3;
use Telnyx\Messages\MessageSendNumberPoolResponse;
use Telnyx\Messages\MessageSendParams\Type as Type1;
use Telnyx\Messages\MessageSendResponse;
use Telnyx\Messages\MessageSendShortCodeParams\Type as Type4;
use Telnyx\Messages\MessageSendShortCodeResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MessagesContract
{
    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageGetResponse;

    /**
     * @api
     */
    public function cancelScheduled(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessageCancelScheduledResponse;

    /**
     * @api
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
    ): MessageScheduleResponse;

    /**
     * @api
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
     * @param Type1|value-of<Type1> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
    ): MessageSendResponse;

    /**
     * @api
     *
     * @param string $from Phone number, in +E.164 format, used to send the message.
     * @param list<string> $to A list of destinations. No more than 8 destinations are allowed.
     * @param list<string> $mediaURLs A list of media URLs. The total media size must be less than 1 MB.
     * @param string $subject Subject of multimedia message
     * @param string $text Message body (i.e., content) as a non-empty string.
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
    ): MessageSendGroupMmsResponse;

    /**
     * @api
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
     * @param Type2|value-of<Type2> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
    ): MessageSendLongCodeResponse;

    /**
     * @api
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
     * @param Type3|value-of<Type3> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
    ): MessageSendNumberPoolResponse;

    /**
     * @api
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
     * @param Type4|value-of<Type4> $type the protocol for sending the message, either SMS or MMS
     * @param bool $useProfileWebhooks If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     * @param string $webhookFailoverURL the failover URL where webhooks related to this message will be sent if sending to the primary URL fails
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
    ): MessageSendShortCodeResponse;
}

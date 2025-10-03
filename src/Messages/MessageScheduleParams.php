<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageScheduleParams\Type;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessageScheduleParams); // set properties as needed
 * $client->messages->schedule(...$params->toArray());
 * ```
 * Schedule a message with a Phone Number, Alphanumeric Sender ID, Short Code or Number Pool.
 *
 * This endpoint allows you to schedule a message with any messaging resource.
 * Current messaging resources include: long-code, short-code, number-pool, and
 * alphanumeric-sender-id.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messages->schedule(...$params->toArray());`
 *
 * @see Telnyx\Messages->schedule
 *
 * @phpstan-type message_schedule_params = array{
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
 * }
 */
final class MessageScheduleParams implements BaseModel
{
    /** @use SdkModel<message_schedule_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    #[Api]
    public string $to;

    /**
     * Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts.
     */
    #[Api('auto_detect', optional: true)]
    public ?bool $autoDetect;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     *
     * @var list<string>|null $mediaURLs
     */
    #[Api('media_urls', list: 'string', optional: true)]
    public ?array $mediaURLs;

    /**
     * Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     */
    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

    /**
     * ISO 8601 formatted date indicating when to send the message - accurate up till a minute.
     */
    #[Api('send_at', optional: true)]
    public ?\DateTimeInterface $sendAt;

    /**
     * Subject of multimedia message.
     */
    #[Api(optional: true)]
    public ?string $subject;

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    #[Api(optional: true)]
    public ?string $text;

    /**
     * The protocol for sending the message, either SMS or MMS.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     */
    #[Api('use_profile_webhooks', optional: true)]
    public ?bool $useProfileWebhooks;

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    #[Api('webhook_failover_url', optional: true)]
    public ?string $webhookFailoverURL;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Api('webhook_url', optional: true)]
    public ?string $webhookURL;

    /**
     * `new MessageScheduleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageScheduleParams::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageScheduleParams)->withTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $mediaURLs
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $to,
        ?bool $autoDetect = null,
        ?string $from = null,
        ?array $mediaURLs = null,
        ?string $messagingProfileID = null,
        ?\DateTimeInterface $sendAt = null,
        ?string $subject = null,
        ?string $text = null,
        Type|string|null $type = null,
        ?bool $useProfileWebhooks = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj->to = $to;

        null !== $autoDetect && $obj->autoDetect = $autoDetect;
        null !== $from && $obj->from = $from;
        null !== $mediaURLs && $obj->mediaURLs = $mediaURLs;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $sendAt && $obj->sendAt = $sendAt;
        null !== $subject && $obj->subject = $subject;
        null !== $text && $obj->text = $text;
        null !== $type && $obj['type'] = $type;
        null !== $useProfileWebhooks && $obj->useProfileWebhooks = $useProfileWebhooks;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts.
     */
    public function withAutoDetect(bool $autoDetect): self
    {
        $obj = clone $this;
        $obj->autoDetect = $autoDetect;

        return $obj;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     *
     * @param list<string> $mediaURLs
     */
    public function withMediaURLs(array $mediaURLs): self
    {
        $obj = clone $this;
        $obj->mediaURLs = $mediaURLs;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when to send the message - accurate up till a minute.
     */
    public function withSendAt(\DateTimeInterface $sendAt): self
    {
        $obj = clone $this;
        $obj->sendAt = $sendAt;

        return $obj;
    }

    /**
     * Subject of multimedia message.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    /**
     * The protocol for sending the message, either SMS or MMS.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     */
    public function withUseProfileWebhooks(bool $useProfileWebhooks): self
    {
        $obj = clone $this;
        $obj->useProfileWebhooks = $useProfileWebhooks;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhookFailoverURL = $webhookFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}

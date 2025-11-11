<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendParams\Type;

/**
 * Send a message with a Phone Number, Alphanumeric Sender ID, Short Code or Number Pool.
 *
 * This endpoint allows you to send a message with any messaging resource.
 * Current messaging resources include: long-code, short-code, number-pool, and
 * alphanumeric-sender-id.
 *
 * @see Telnyx\Messages->send
 *
 * @phpstan-type MessageSendParamsShape = array{
 *   to: string,
 *   auto_detect?: bool,
 *   from?: string,
 *   media_urls?: list<string>,
 *   messaging_profile_id?: string,
 *   send_at?: \DateTimeInterface|null,
 *   subject?: string,
 *   text?: string,
 *   type?: Type|value-of<Type>,
 *   use_profile_webhooks?: bool,
 *   webhook_failover_url?: string,
 *   webhook_url?: string,
 * }
 */
final class MessageSendParams implements BaseModel
{
    /** @use SdkModel<MessageSendParamsShape> */
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
    #[Api(optional: true)]
    public ?bool $auto_detect;

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
     * @var list<string>|null $media_urls
     */
    #[Api(list: 'string', optional: true)]
    public ?array $media_urls;

    /**
     * Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     */
    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    /**
     * ISO 8601 formatted date indicating when to send the message - accurate up till a minute.
     */
    #[Api(nullable: true, optional: true)]
    public ?\DateTimeInterface $send_at;

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
    #[Api(optional: true)]
    public ?bool $use_profile_webhooks;

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    #[Api(optional: true)]
    public ?string $webhook_failover_url;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Api(optional: true)]
    public ?string $webhook_url;

    /**
     * `new MessageSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendParams::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendParams)->withTo(...)
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
     * @param list<string> $media_urls
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $to,
        ?bool $auto_detect = null,
        ?string $from = null,
        ?array $media_urls = null,
        ?string $messaging_profile_id = null,
        ?\DateTimeInterface $send_at = null,
        ?string $subject = null,
        ?string $text = null,
        Type|string|null $type = null,
        ?bool $use_profile_webhooks = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        $obj->to = $to;

        null !== $auto_detect && $obj->auto_detect = $auto_detect;
        null !== $from && $obj->from = $from;
        null !== $media_urls && $obj->media_urls = $media_urls;
        null !== $messaging_profile_id && $obj->messaging_profile_id = $messaging_profile_id;
        null !== $send_at && $obj->send_at = $send_at;
        null !== $subject && $obj->subject = $subject;
        null !== $text && $obj->text = $text;
        null !== $type && $obj['type'] = $type;
        null !== $use_profile_webhooks && $obj->use_profile_webhooks = $use_profile_webhooks;
        null !== $webhook_failover_url && $obj->webhook_failover_url = $webhook_failover_url;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

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
        $obj->auto_detect = $autoDetect;

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
        $obj->media_urls = $mediaURLs;

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
        $obj->messaging_profile_id = $messagingProfileID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when to send the message - accurate up till a minute.
     */
    public function withSendAt(?\DateTimeInterface $sendAt): self
    {
        $obj = clone $this;
        $obj->send_at = $sendAt;

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
        $obj->use_profile_webhooks = $useProfileWebhooks;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhook_failover_url = $webhookFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

        return $obj;
    }
}

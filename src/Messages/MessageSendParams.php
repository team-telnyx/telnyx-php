<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendParams\Encoding;
use Telnyx\Messages\MessageSendParams\Type;

/**
 * Send a message with a Phone Number, Alphanumeric Sender ID, Short Code or Number Pool.
 *
 * This endpoint allows you to send a message with any messaging resource.
 * Current messaging resources include: long-code, short-code, number-pool, and
 * alphanumeric-sender-id.
 *
 * @see Telnyx\Services\MessagesService::send()
 *
 * @phpstan-type MessageSendParamsShape = array{
 *   to: string,
 *   autoDetect?: bool|null,
 *   encoding?: null|Encoding|value-of<Encoding>,
 *   from?: string|null,
 *   mediaURLs?: list<string>|null,
 *   messagingProfileID?: string|null,
 *   sendAt?: \DateTimeInterface|null,
 *   subject?: string|null,
 *   text?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   useProfileWebhooks?: bool|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
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
    #[Required]
    public string $to;

    /**
     * Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts.
     */
    #[Optional('auto_detect')]
    public ?bool $autoDetect;

    /**
     * Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     *
     * @var value-of<Encoding>|null $encoding
     */
    #[Optional(enum: Encoding::class)]
    public ?string $encoding;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     */
    #[Optional]
    public ?string $from;

    /**
     * A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
     *
     * @var list<string>|null $mediaURLs
     */
    #[Optional('media_urls', list: 'string')]
    public ?array $mediaURLs;

    /**
     * Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * ISO 8601 formatted date indicating when to send the message - accurate up till a minute.
     */
    #[Optional('send_at', nullable: true)]
    public ?\DateTimeInterface $sendAt;

    /**
     * Subject of multimedia message.
     */
    #[Optional]
    public ?string $subject;

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    #[Optional]
    public ?string $text;

    /**
     * The protocol for sending the message, either SMS or MMS.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     */
    #[Optional('use_profile_webhooks')]
    public ?bool $useProfileWebhooks;

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

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
     * @param Encoding|value-of<Encoding>|null $encoding
     * @param list<string>|null $mediaURLs
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $to,
        ?bool $autoDetect = null,
        Encoding|string|null $encoding = null,
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
        $self = new self;

        $self['to'] = $to;

        null !== $autoDetect && $self['autoDetect'] = $autoDetect;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $from && $self['from'] = $from;
        null !== $mediaURLs && $self['mediaURLs'] = $mediaURLs;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $sendAt && $self['sendAt'] = $sendAt;
        null !== $subject && $self['subject'] = $subject;
        null !== $text && $self['text'] = $text;
        null !== $type && $self['type'] = $type;
        null !== $useProfileWebhooks && $self['useProfileWebhooks'] = $useProfileWebhooks;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Automatically detect if an SMS message is unusually long and exceeds a recommended limit of message parts.
     */
    public function withAutoDetect(bool $autoDetect): self
    {
        $self = clone $this;
        $self['autoDetect'] = $autoDetect;

        return $self;
    }

    /**
     * Encoding to use for the message. `auto` (default) uses smart encoding to automatically select the most efficient encoding. `gsm7` forces GSM-7 encoding (returns 400 if message contains characters that cannot be encoded). `ucs2` forces UCS-2 encoding and disables smart encoding. When set, this overrides the messaging profile's `smart_encoding` setting.
     *
     * @param Encoding|value-of<Encoding> $encoding
     */
    public function withEncoding(Encoding|string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     *
     * **Required if sending with a phone number, short code, or alphanumeric sender ID.**
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
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
        $self = clone $this;
        $self['mediaURLs'] = $mediaURLs;

        return $self;
    }

    /**
     * Unique identifier for a messaging profile.
     *
     * **Required if sending via number pool or with an alphanumeric sender ID.**
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when to send the message - accurate up till a minute.
     */
    public function withSendAt(?\DateTimeInterface $sendAt): self
    {
        $self = clone $this;
        $self['sendAt'] = $sendAt;

        return $self;
    }

    /**
     * Subject of multimedia message.
     */
    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The protocol for sending the message, either SMS or MMS.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * If the profile this number is associated with has webhooks, use them for delivery notifications. If webhooks are also specified on the message itself, they will be attempted first, then those on the profile.
     */
    public function withUseProfileWebhooks(bool $useProfileWebhooks): self
    {
        $self = clone $this;
        $self['useProfileWebhooks'] = $useProfileWebhooks;

        return $self;
    }

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}

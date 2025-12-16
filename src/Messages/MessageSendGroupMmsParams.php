<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Send a group MMS message.
 *
 * @see Telnyx\Services\MessagesService::sendGroupMms()
 *
 * @phpstan-type MessageSendGroupMmsParamsShape = array{
 *   from: string,
 *   to: list<string>,
 *   mediaURLs?: list<string>|null,
 *   subject?: string|null,
 *   text?: string|null,
 *   useProfileWebhooks?: bool|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class MessageSendGroupMmsParams implements BaseModel
{
    /** @use SdkModel<MessageSendGroupMmsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Phone number, in +E.164 format, used to send the message.
     */
    #[Required]
    public string $from;

    /**
     * A list of destinations. No more than 8 destinations are allowed.
     *
     * @var list<string> $to
     */
    #[Required(list: 'string')]
    public array $to;

    /**
     * A list of media URLs. The total media size must be less than 1 MB.
     *
     * @var list<string>|null $mediaURLs
     */
    #[Optional('media_urls', list: 'string')]
    public ?array $mediaURLs;

    /**
     * Subject of multimedia message.
     */
    #[Optional]
    public ?string $subject;

    /**
     * Message body (i.e., content) as a non-empty string.
     */
    #[Optional]
    public ?string $text;

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
     * `new MessageSendGroupMmsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendGroupMmsParams::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendGroupMmsParams)->withFrom(...)->withTo(...)
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
     * @param list<string> $to
     * @param list<string> $mediaURLs
     */
    public static function with(
        string $from,
        array $to,
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        ?bool $useProfileWebhooks = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        null !== $mediaURLs && $self['mediaURLs'] = $mediaURLs;
        null !== $subject && $self['subject'] = $subject;
        null !== $text && $self['text'] = $text;
        null !== $useProfileWebhooks && $self['useProfileWebhooks'] = $useProfileWebhooks;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Phone number, in +E.164 format, used to send the message.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * A list of destinations. No more than 8 destinations are allowed.
     *
     * @param list<string> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * A list of media URLs. The total media size must be less than 1 MB.
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
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

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

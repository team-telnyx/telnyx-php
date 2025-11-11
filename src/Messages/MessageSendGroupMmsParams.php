<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Send a group MMS message.
 *
 * @see Telnyx\Messages->sendGroupMms
 *
 * @phpstan-type MessageSendGroupMmsParamsShape = array{
 *   from: string,
 *   to: list<string>,
 *   media_urls?: list<string>,
 *   subject?: string,
 *   text?: string,
 *   use_profile_webhooks?: bool,
 *   webhook_failover_url?: string,
 *   webhook_url?: string,
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
    #[Api]
    public string $from;

    /**
     * A list of destinations. No more than 8 destinations are allowed.
     *
     * @var list<string> $to
     */
    #[Api(list: 'string')]
    public array $to;

    /**
     * A list of media URLs. The total media size must be less than 1 MB.
     *
     * @var list<string>|null $media_urls
     */
    #[Api(list: 'string', optional: true)]
    public ?array $media_urls;

    /**
     * Subject of multimedia message.
     */
    #[Api(optional: true)]
    public ?string $subject;

    /**
     * Message body (i.e., content) as a non-empty string.
     */
    #[Api(optional: true)]
    public ?string $text;

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
     * @param list<string> $media_urls
     */
    public static function with(
        string $from,
        array $to,
        ?array $media_urls = null,
        ?string $subject = null,
        ?string $text = null,
        ?bool $use_profile_webhooks = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

        null !== $media_urls && $obj->media_urls = $media_urls;
        null !== $subject && $obj->subject = $subject;
        null !== $text && $obj->text = $text;
        null !== $use_profile_webhooks && $obj->use_profile_webhooks = $use_profile_webhooks;
        null !== $webhook_failover_url && $obj->webhook_failover_url = $webhook_failover_url;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

        return $obj;
    }

    /**
     * Phone number, in +E.164 format, used to send the message.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * A list of destinations. No more than 8 destinations are allowed.
     *
     * @param list<string> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * A list of media URLs. The total media size must be less than 1 MB.
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
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

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

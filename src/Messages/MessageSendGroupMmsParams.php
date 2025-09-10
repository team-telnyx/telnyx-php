<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessageSendGroupMmsParams); // set properties as needed
 * $client->messages->sendGroupMms(...$params->toArray());
 * ```
 * Send a group MMS message.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messages->sendGroupMms(...$params->toArray());`
 *
 * @see Telnyx\Messages->sendGroupMms
 *
 * @phpstan-type message_send_group_mms_params = array{
 *   from: string,
 *   to: list<string>,
 *   mediaURLs?: list<string>,
 *   subject?: string,
 *   text?: string,
 *   useProfileWebhooks?: bool,
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 * }
 */
final class MessageSendGroupMmsParams implements BaseModel
{
    /** @use SdkModel<message_send_group_mms_params> */
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
     * @var list<string>|null $mediaURLs
     */
    #[Api('media_urls', list: 'string', optional: true)]
    public ?array $mediaURLs;

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
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

        null !== $mediaURLs && $obj->mediaURLs = $mediaURLs;
        null !== $subject && $obj->subject = $subject;
        null !== $text && $obj->text = $text;
        null !== $useProfileWebhooks && $obj->useProfileWebhooks = $useProfileWebhooks;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

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
        $obj->mediaURLs = $mediaURLs;

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

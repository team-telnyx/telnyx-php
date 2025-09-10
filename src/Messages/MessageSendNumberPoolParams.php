<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendNumberPoolParams\Type;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessageSendNumberPoolParams); // set properties as needed
 * $client->messages->sendNumberPool(...$params->toArray());
 * ```
 * Send a message using number pool.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messages->sendNumberPool(...$params->toArray());`
 *
 * @see Telnyx\Messages->sendNumberPool
 *
 * @phpstan-type message_send_number_pool_params = array{
 *   messagingProfileID: string,
 *   to: string,
 *   autoDetect?: bool,
 *   mediaURLs?: list<string>,
 *   subject?: string,
 *   text?: string,
 *   type?: Type|value-of<Type>,
 *   useProfileWebhooks?: bool,
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 * }
 */
final class MessageSendNumberPoolParams implements BaseModel
{
    /** @use SdkModel<message_send_number_pool_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Api('messaging_profile_id')]
    public string $messagingProfileID;

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
     * A list of media URLs. The total media size must be less than 1 MB.
     *
     * **Required for MMS**
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
     * `new MessageSendNumberPoolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendNumberPoolParams::with(messagingProfileID: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendNumberPoolParams)->withMessagingProfileID(...)->withTo(...)
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
        string $messagingProfileID,
        string $to,
        ?bool $autoDetect = null,
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
        Type|string|null $type = null,
        ?bool $useProfileWebhooks = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj->messagingProfileID = $messagingProfileID;
        $obj->to = $to;

        null !== $autoDetect && $obj->autoDetect = $autoDetect;
        null !== $mediaURLs && $obj->mediaURLs = $mediaURLs;
        null !== $subject && $obj->subject = $subject;
        null !== $text && $obj->text = $text;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $useProfileWebhooks && $obj->useProfileWebhooks = $useProfileWebhooks;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

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
        $obj->type = $type instanceof Type ? $type->value : $type;

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

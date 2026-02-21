<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Send an SMS message using an alphanumeric sender ID. This is SMS only.
 *
 * @see Telnyx\Services\MessagesService::sendWithAlphanumericSender()
 *
 * @phpstan-type MessageSendWithAlphanumericSenderParamsShape = array{
 *   from: string,
 *   messagingProfileID: string,
 *   text: string,
 *   to: string,
 *   useProfileWebhooks?: bool|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class MessageSendWithAlphanumericSenderParams implements BaseModel
{
    /** @use SdkModel<MessageSendWithAlphanumericSenderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A valid alphanumeric sender ID on the user's account.
     */
    #[Required]
    public string $from;

    /**
     * The messaging profile ID to use.
     */
    #[Required('messaging_profile_id')]
    public string $messagingProfileID;

    /**
     * The message body.
     */
    #[Required]
    public string $text;

    /**
     * Receiving address (+E.164 formatted phone number).
     */
    #[Required]
    public string $to;

    /**
     * If true, use the messaging profile's webhook settings.
     */
    #[Optional('use_profile_webhooks')]
    public ?bool $useProfileWebhooks;

    /**
     * Failover callback URL for delivery status updates.
     */
    #[Optional('webhook_failover_url', nullable: true)]
    public ?string $webhookFailoverURL;

    /**
     * Callback URL for delivery status updates.
     */
    #[Optional('webhook_url', nullable: true)]
    public ?string $webhookURL;

    /**
     * `new MessageSendWithAlphanumericSenderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendWithAlphanumericSenderParams::with(
     *   from: ..., messagingProfileID: ..., text: ..., to: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendWithAlphanumericSenderParams)
     *   ->withFrom(...)
     *   ->withMessagingProfileID(...)
     *   ->withText(...)
     *   ->withTo(...)
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
     */
    public static function with(
        string $from,
        string $messagingProfileID,
        string $text,
        string $to,
        ?bool $useProfileWebhooks = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['messagingProfileID'] = $messagingProfileID;
        $self['text'] = $text;
        $self['to'] = $to;

        null !== $useProfileWebhooks && $self['useProfileWebhooks'] = $useProfileWebhooks;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * A valid alphanumeric sender ID on the user's account.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The messaging profile ID to use.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The message body.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Receiving address (+E.164 formatted phone number).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * If true, use the messaging profile's webhook settings.
     */
    public function withUseProfileWebhooks(bool $useProfileWebhooks): self
    {
        $self = clone $this;
        $self['useProfileWebhooks'] = $useProfileWebhooks;

        return $self;
    }

    /**
     * Failover callback URL for delivery status updates.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * Callback URL for delivery status updates.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}

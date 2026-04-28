<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappParams\Type;

/**
 * Send a Whatsapp message.
 *
 * @see Telnyx\Services\MessagesService::sendWhatsapp()
 *
 * @phpstan-import-type WhatsappMessageContentShape from \Telnyx\Messages\WhatsappMessageContent
 *
 * @phpstan-type MessageSendWhatsappParamsShape = array{
 *   from: string,
 *   to: string,
 *   whatsappMessage: WhatsappMessageContent|WhatsappMessageContentShape,
 *   messagingProfileID?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   webhookURL?: string|null,
 * }
 */
final class MessageSendWhatsappParams implements BaseModel
{
    /** @use SdkModel<MessageSendWhatsappParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Phone number in +E.164 format associated with Whatsapp account.
     */
    #[Required]
    public string $from;

    /**
     * Phone number in +E.164 format.
     */
    #[Required]
    public string $to;

    #[Required('whatsapp_message')]
    public WhatsappMessageContent $whatsappMessage;

    /**
     * Messaging profile ID - required if the 'from' number is not SMS-enabled.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * Message type - must be set to "WHATSAPP".
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new MessageSendWhatsappParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendWhatsappParams::with(from: ..., to: ..., whatsappMessage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendWhatsappParams)
     *   ->withFrom(...)
     *   ->withTo(...)
     *   ->withWhatsappMessage(...)
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
     * @param WhatsappMessageContent|WhatsappMessageContentShape $whatsappMessage
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $from,
        string $to,
        WhatsappMessageContent|array $whatsappMessage,
        ?string $messagingProfileID = null,
        Type|string|null $type = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;
        $self['whatsappMessage'] = $whatsappMessage;

        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $type && $self['type'] = $type;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Phone number in +E.164 format associated with Whatsapp account.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param WhatsappMessageContent|WhatsappMessageContentShape $whatsappMessage
     */
    public function withWhatsappMessage(
        WhatsappMessageContent|array $whatsappMessage
    ): self {
        $self = clone $this;
        $self['whatsappMessage'] = $whatsappMessage;

        return $self;
    }

    /**
     * Messaging profile ID - required if the 'from' number is not SMS-enabled.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * Message type - must be set to "WHATSAPP".
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
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}

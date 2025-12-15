<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Location;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Reaction;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Type;

/**
 * Send a Whatsapp message.
 *
 * @see Telnyx\Services\MesssagesService::whatsapp()
 *
 * @phpstan-type MesssageWhatsappParamsShape = array{
 *   from: string,
 *   to: string,
 *   whatsappMessage: WhatsappMessage|array{
 *     audio?: WhatsappMedia|null,
 *     bizOpaqueCallbackData?: string|null,
 *     contacts?: list<Contact>|null,
 *     document?: WhatsappMedia|null,
 *     image?: WhatsappMedia|null,
 *     interactive?: Interactive|null,
 *     location?: Location|null,
 *     reaction?: Reaction|null,
 *     sticker?: WhatsappMedia|null,
 *     type?: value-of<Type>|null,
 *     video?: WhatsappMedia|null,
 *   },
 *   type?: \Telnyx\Messsages\MesssageWhatsappParams\Type|value-of<\Telnyx\Messsages\MesssageWhatsappParams\Type>,
 *   webhookURL?: string,
 * }
 */
final class MesssageWhatsappParams implements BaseModel
{
    /** @use SdkModel<MesssageWhatsappParamsShape> */
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
    public WhatsappMessage $whatsappMessage;

    /**
     * Message type - must be set to "WHATSAPP".
     *
     * @var value-of<MesssageWhatsappParams\Type>|null $type
     */
    #[Optional(enum: MesssageWhatsappParams\Type::class)]
    public ?string $type;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new MesssageWhatsappParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MesssageWhatsappParams::with(from: ..., to: ..., whatsappMessage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MesssageWhatsappParams)
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
     * @param WhatsappMessage|array{
     *   audio?: WhatsappMedia|null,
     *   bizOpaqueCallbackData?: string|null,
     *   contacts?: list<Contact>|null,
     *   document?: WhatsappMedia|null,
     *   image?: WhatsappMedia|null,
     *   interactive?: Interactive|null,
     *   location?: Location|null,
     *   reaction?: Reaction|null,
     *   sticker?: WhatsappMedia|null,
     *   type?: value-of<Type>|null,
     *   video?: WhatsappMedia|null,
     * } $whatsappMessage
     * @param MesssageWhatsappParams\Type|value-of<MesssageWhatsappParams\Type> $type
     */
    public static function with(
        string $from,
        string $to,
        WhatsappMessage|array $whatsappMessage,
        MesssageWhatsappParams\Type|string|null $type = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;
        $self['whatsappMessage'] = $whatsappMessage;

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
     * @param WhatsappMessage|array{
     *   audio?: WhatsappMedia|null,
     *   bizOpaqueCallbackData?: string|null,
     *   contacts?: list<Contact>|null,
     *   document?: WhatsappMedia|null,
     *   image?: WhatsappMedia|null,
     *   interactive?: Interactive|null,
     *   location?: Location|null,
     *   reaction?: Reaction|null,
     *   sticker?: WhatsappMedia|null,
     *   type?: value-of<Type>|null,
     *   video?: WhatsappMedia|null,
     * } $whatsappMessage
     */
    public function withWhatsappMessage(
        WhatsappMessage|array $whatsappMessage
    ): self {
        $self = clone $this;
        $self['whatsappMessage'] = $whatsappMessage;

        return $self;
    }

    /**
     * Message type - must be set to "WHATSAPP".
     *
     * @param MesssageWhatsappParams\Type|value-of<MesssageWhatsappParams\Type> $type
     */
    public function withType(
        MesssageWhatsappParams\Type|string $type
    ): self {
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

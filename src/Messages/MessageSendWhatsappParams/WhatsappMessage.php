<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Contact;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Location;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Reaction;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Type;
use Telnyx\Messages\WhatsappMedia;

/**
 * @phpstan-import-type WhatsappMediaShape from \Telnyx\Messages\WhatsappMedia
 * @phpstan-import-type ContactShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Contact
 * @phpstan-import-type InteractiveShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive
 * @phpstan-import-type LocationShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Location
 * @phpstan-import-type ReactionShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Reaction
 *
 * @phpstan-type WhatsappMessageShape = array{
 *   audio?: null|WhatsappMedia|WhatsappMediaShape,
 *   bizOpaqueCallbackData?: string|null,
 *   contacts?: list<ContactShape>|null,
 *   document?: null|WhatsappMedia|WhatsappMediaShape,
 *   image?: null|WhatsappMedia|WhatsappMediaShape,
 *   interactive?: null|Interactive|InteractiveShape,
 *   location?: null|Location|LocationShape,
 *   reaction?: null|Reaction|ReactionShape,
 *   sticker?: null|WhatsappMedia|WhatsappMediaShape,
 *   type?: null|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Type|value-of<\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Type>,
 *   video?: null|WhatsappMedia|WhatsappMediaShape,
 * }
 */
final class WhatsappMessage implements BaseModel
{
    /** @use SdkModel<WhatsappMessageShape> */
    use SdkModel;

    #[Optional]
    public ?WhatsappMedia $audio;

    /**
     * custom data to return with status update.
     */
    #[Optional('biz_opaque_callback_data')]
    public ?string $bizOpaqueCallbackData;

    /** @var list<Contact>|null $contacts */
    #[Optional(list: Contact::class)]
    public ?array $contacts;

    #[Optional]
    public ?WhatsappMedia $document;

    #[Optional]
    public ?WhatsappMedia $image;

    #[Optional]
    public ?Interactive $interactive;

    #[Optional]
    public ?Location $location;

    #[Optional]
    public ?Reaction $reaction;

    #[Optional]
    public ?WhatsappMedia $sticker;

    /**
     * @var value-of<Type>|null $type
     */
    #[Optional(
        enum: Type::class
    )]
    public ?string $type;

    #[Optional]
    public ?WhatsappMedia $video;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WhatsappMedia|WhatsappMediaShape|null $audio
     * @param list<ContactShape>|null $contacts
     * @param WhatsappMedia|WhatsappMediaShape|null $document
     * @param WhatsappMedia|WhatsappMediaShape|null $image
     * @param Interactive|InteractiveShape|null $interactive
     * @param Location|LocationShape|null $location
     * @param Reaction|ReactionShape|null $reaction
     * @param WhatsappMedia|WhatsappMediaShape|null $sticker
     * @param Type|value-of<Type>|null $type
     * @param WhatsappMedia|WhatsappMediaShape|null $video
     */
    public static function with(
        WhatsappMedia|array|null $audio = null,
        ?string $bizOpaqueCallbackData = null,
        ?array $contacts = null,
        WhatsappMedia|array|null $document = null,
        WhatsappMedia|array|null $image = null,
        Interactive|array|null $interactive = null,
        Location|array|null $location = null,
        Reaction|array|null $reaction = null,
        WhatsappMedia|array|null $sticker = null,
        Type|string|null $type = null,
        WhatsappMedia|array|null $video = null,
    ): self {
        $self = new self;

        null !== $audio && $self['audio'] = $audio;
        null !== $bizOpaqueCallbackData && $self['bizOpaqueCallbackData'] = $bizOpaqueCallbackData;
        null !== $contacts && $self['contacts'] = $contacts;
        null !== $document && $self['document'] = $document;
        null !== $image && $self['image'] = $image;
        null !== $interactive && $self['interactive'] = $interactive;
        null !== $location && $self['location'] = $location;
        null !== $reaction && $self['reaction'] = $reaction;
        null !== $sticker && $self['sticker'] = $sticker;
        null !== $type && $self['type'] = $type;
        null !== $video && $self['video'] = $video;

        return $self;
    }

    /**
     * @param WhatsappMedia|WhatsappMediaShape $audio
     */
    public function withAudio(WhatsappMedia|array $audio): self
    {
        $self = clone $this;
        $self['audio'] = $audio;

        return $self;
    }

    /**
     * custom data to return with status update.
     */
    public function withBizOpaqueCallbackData(
        string $bizOpaqueCallbackData
    ): self {
        $self = clone $this;
        $self['bizOpaqueCallbackData'] = $bizOpaqueCallbackData;

        return $self;
    }

    /**
     * @param list<ContactShape> $contacts
     */
    public function withContacts(array $contacts): self
    {
        $self = clone $this;
        $self['contacts'] = $contacts;

        return $self;
    }

    /**
     * @param WhatsappMedia|WhatsappMediaShape $document
     */
    public function withDocument(WhatsappMedia|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }

    /**
     * @param WhatsappMedia|WhatsappMediaShape $image
     */
    public function withImage(WhatsappMedia|array $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    /**
     * @param Interactive|InteractiveShape $interactive
     */
    public function withInteractive(Interactive|array $interactive): self
    {
        $self = clone $this;
        $self['interactive'] = $interactive;

        return $self;
    }

    /**
     * @param Location|LocationShape $location
     */
    public function withLocation(Location|array $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * @param Reaction|ReactionShape $reaction
     */
    public function withReaction(Reaction|array $reaction): self
    {
        $self = clone $this;
        $self['reaction'] = $reaction;

        return $self;
    }

    /**
     * @param WhatsappMedia|WhatsappMediaShape $sticker
     */
    public function withSticker(WhatsappMedia|array $sticker): self
    {
        $self = clone $this;
        $self['sticker'] = $sticker;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(
        Type|string $type
    ): self {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param WhatsappMedia|WhatsappMediaShape $video
     */
    public function withVideo(WhatsappMedia|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}

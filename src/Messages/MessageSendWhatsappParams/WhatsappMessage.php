<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Audio;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Contact;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Document;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Image;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Location;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Reaction;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Sticker;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Type;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Video;

/**
 * @phpstan-import-type AudioShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Audio
 * @phpstan-import-type ContactShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Contact
 * @phpstan-import-type DocumentShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Document
 * @phpstan-import-type ImageShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Image
 * @phpstan-import-type InteractiveShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive
 * @phpstan-import-type LocationShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Location
 * @phpstan-import-type ReactionShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Reaction
 * @phpstan-import-type StickerShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Sticker
 * @phpstan-import-type VideoShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Video
 *
 * @phpstan-type WhatsappMessageShape = array{
 *   audio?: null|Audio|AudioShape,
 *   bizOpaqueCallbackData?: string|null,
 *   contacts?: list<ContactShape>|null,
 *   document?: null|Document|DocumentShape,
 *   image?: null|Image|ImageShape,
 *   interactive?: null|Interactive|InteractiveShape,
 *   location?: null|Location|LocationShape,
 *   reaction?: null|Reaction|ReactionShape,
 *   sticker?: null|Sticker|StickerShape,
 *   type?: null|\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Type|value-of<\Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Type>,
 *   video?: null|Video|VideoShape,
 * }
 */
final class WhatsappMessage implements BaseModel
{
    /** @use SdkModel<WhatsappMessageShape> */
    use SdkModel;

    #[Optional]
    public ?Audio $audio;

    /**
     * custom data to return with status update.
     */
    #[Optional('biz_opaque_callback_data')]
    public ?string $bizOpaqueCallbackData;

    /** @var list<Contact>|null $contacts */
    #[Optional(list: Contact::class)]
    public ?array $contacts;

    #[Optional]
    public ?Document $document;

    #[Optional]
    public ?Image $image;

    #[Optional]
    public ?Interactive $interactive;

    #[Optional]
    public ?Location $location;

    #[Optional]
    public ?Reaction $reaction;

    #[Optional]
    public ?Sticker $sticker;

    /**
     * @var value-of<Type>|null $type
     */
    #[Optional(
        enum: Type::class
    )]
    public ?string $type;

    #[Optional]
    public ?Video $video;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AudioShape $audio
     * @param list<ContactShape> $contacts
     * @param DocumentShape $document
     * @param ImageShape $image
     * @param InteractiveShape $interactive
     * @param LocationShape $location
     * @param ReactionShape $reaction
     * @param StickerShape $sticker
     * @param Type|value-of<Type> $type
     * @param VideoShape $video
     */
    public static function with(
        Audio|array|null $audio = null,
        ?string $bizOpaqueCallbackData = null,
        ?array $contacts = null,
        Document|array|null $document = null,
        Image|array|null $image = null,
        Interactive|array|null $interactive = null,
        Location|array|null $location = null,
        Reaction|array|null $reaction = null,
        Sticker|array|null $sticker = null,
        Type|string|null $type = null,
        Video|array|null $video = null,
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
     * @param AudioShape $audio
     */
    public function withAudio(Audio|array $audio): self
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
     * @param DocumentShape $document
     */
    public function withDocument(Document|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }

    /**
     * @param ImageShape $image
     */
    public function withImage(Image|array $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    /**
     * @param InteractiveShape $interactive
     */
    public function withInteractive(Interactive|array $interactive): self
    {
        $self = clone $this;
        $self['interactive'] = $interactive;

        return $self;
    }

    /**
     * @param LocationShape $location
     */
    public function withLocation(Location|array $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * @param ReactionShape $reaction
     */
    public function withReaction(Reaction|array $reaction): self
    {
        $self = clone $this;
        $self['reaction'] = $reaction;

        return $self;
    }

    /**
     * @param StickerShape $sticker
     */
    public function withSticker(Sticker|array $sticker): self
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
     * @param VideoShape $video
     */
    public function withVideo(Video|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}

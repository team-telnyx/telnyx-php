<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Audio;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Document;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Image;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Location;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Reaction;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Sticker;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Type;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Video;

/**
 * @phpstan-import-type AudioShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Audio
 * @phpstan-import-type ContactShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Contact
 * @phpstan-import-type DocumentShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Document
 * @phpstan-import-type ImageShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Image
 * @phpstan-import-type InteractiveShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive
 * @phpstan-import-type LocationShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Location
 * @phpstan-import-type ReactionShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Reaction
 * @phpstan-import-type StickerShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Sticker
 * @phpstan-import-type VideoShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Video
 *
 * @phpstan-type BodyShape = array{
 *   audio?: null|Audio|AudioShape,
 *   bizOpaqueCallbackData?: string|null,
 *   contacts?: list<ContactShape>|null,
 *   document?: null|Document|DocumentShape,
 *   image?: null|Image|ImageShape,
 *   interactive?: null|Interactive|InteractiveShape,
 *   location?: null|Location|LocationShape,
 *   reaction?: null|Reaction|ReactionShape,
 *   sticker?: null|Sticker|StickerShape,
 *   type?: null|Type|value-of<Type>,
 *   video?: null|Video|VideoShape,
 * }
 */
final class Body implements BaseModel
{
    /** @use SdkModel<BodyShape> */
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

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
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
    public function withType(Type|string $type): self
    {
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

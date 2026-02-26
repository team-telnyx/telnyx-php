<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\WhatsappMessageContent\Type;

/**
 * @phpstan-import-type WhatsappMediaShape from \Telnyx\Messages\WhatsappMedia
 * @phpstan-import-type WhatsappContactShape from \Telnyx\Messages\WhatsappContact
 * @phpstan-import-type WhatsappInteractiveShape from \Telnyx\Messages\WhatsappInteractive
 * @phpstan-import-type WhatsappLocationShape from \Telnyx\Messages\WhatsappLocation
 * @phpstan-import-type WhatsappReactionShape from \Telnyx\Messages\WhatsappReaction
 *
 * @phpstan-type WhatsappMessageContentShape = array{
 *   audio?: null|WhatsappMedia|WhatsappMediaShape,
 *   bizOpaqueCallbackData?: string|null,
 *   contacts?: list<WhatsappContact|WhatsappContactShape>|null,
 *   document?: null|WhatsappMedia|WhatsappMediaShape,
 *   image?: null|WhatsappMedia|WhatsappMediaShape,
 *   interactive?: null|WhatsappInteractive|WhatsappInteractiveShape,
 *   location?: null|WhatsappLocation|WhatsappLocationShape,
 *   reaction?: null|WhatsappReaction|WhatsappReactionShape,
 *   sticker?: null|WhatsappMedia|WhatsappMediaShape,
 *   type?: null|Type|value-of<Type>,
 *   video?: null|WhatsappMedia|WhatsappMediaShape,
 * }
 */
final class WhatsappMessageContent implements BaseModel
{
    /** @use SdkModel<WhatsappMessageContentShape> */
    use SdkModel;

    #[Optional]
    public ?WhatsappMedia $audio;

    /**
     * custom data to return with status update.
     */
    #[Optional('biz_opaque_callback_data')]
    public ?string $bizOpaqueCallbackData;

    /** @var list<WhatsappContact>|null $contacts */
    #[Optional(list: WhatsappContact::class)]
    public ?array $contacts;

    #[Optional]
    public ?WhatsappMedia $document;

    #[Optional]
    public ?WhatsappMedia $image;

    #[Optional]
    public ?WhatsappInteractive $interactive;

    #[Optional]
    public ?WhatsappLocation $location;

    #[Optional]
    public ?WhatsappReaction $reaction;

    #[Optional]
    public ?WhatsappMedia $sticker;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
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
     * @param list<WhatsappContact|WhatsappContactShape>|null $contacts
     * @param WhatsappMedia|WhatsappMediaShape|null $document
     * @param WhatsappMedia|WhatsappMediaShape|null $image
     * @param WhatsappInteractive|WhatsappInteractiveShape|null $interactive
     * @param WhatsappLocation|WhatsappLocationShape|null $location
     * @param WhatsappReaction|WhatsappReactionShape|null $reaction
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
        WhatsappInteractive|array|null $interactive = null,
        WhatsappLocation|array|null $location = null,
        WhatsappReaction|array|null $reaction = null,
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
     * @param list<WhatsappContact|WhatsappContactShape> $contacts
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
     * @param WhatsappInteractive|WhatsappInteractiveShape $interactive
     */
    public function withInteractive(
        WhatsappInteractive|array $interactive
    ): self {
        $self = clone $this;
        $self['interactive'] = $interactive;

        return $self;
    }

    /**
     * @param WhatsappLocation|WhatsappLocationShape $location
     */
    public function withLocation(WhatsappLocation|array $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * @param WhatsappReaction|WhatsappReactionShape $reaction
     */
    public function withReaction(WhatsappReaction|array $reaction): self
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
    public function withType(Type|string $type): self
    {
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

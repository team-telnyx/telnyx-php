<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Audio;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact\Address;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact\Email;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact\Org;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact\Phone;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact\URL;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Document;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Image;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Footer;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Header;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Location;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Reaction;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Sticker;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Type;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Video;

/**
 * @phpstan-type BodyShape = array{
 *   audio?: Audio|null,
 *   bizOpaqueCallbackData?: string|null,
 *   contacts?: list<Contact>|null,
 *   document?: Document|null,
 *   image?: Image|null,
 *   interactive?: Interactive|null,
 *   location?: Location|null,
 *   reaction?: Reaction|null,
 *   sticker?: Sticker|null,
 *   type?: value-of<Type>|null,
 *   video?: Video|null,
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
     * @param Audio|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $audio
     * @param list<Contact|array{
     *   addresses?: list<Address>|null,
     *   birthday?: string|null,
     *   emails?: list<Email>|null,
     *   name?: string|null,
     *   org?: Org|null,
     *   phones?: list<Phone>|null,
     *   urls?: list<URL>|null,
     * }> $contacts
     * @param Document|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $document
     * @param Image|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $image
     * @param Interactive|array{
     *   action?: Action|null,
     *   body?: Interactive\Body|null,
     *   footer?: Footer|null,
     *   header?: Header|null,
     *   type?: value-of<Interactive\Type>|null,
     * } $interactive
     * @param Location|array{
     *   address?: string|null,
     *   latitude?: string|null,
     *   longitude?: string|null,
     *   name?: string|null,
     * } $location
     * @param Reaction|array{empji?: string|null, messageID?: string|null} $reaction
     * @param Sticker|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $sticker
     * @param Type|value-of<Type> $type
     * @param Video|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $video
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
     * @param Audio|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $audio
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
     * @param list<Contact|array{
     *   addresses?: list<Address>|null,
     *   birthday?: string|null,
     *   emails?: list<Email>|null,
     *   name?: string|null,
     *   org?: Org|null,
     *   phones?: list<Phone>|null,
     *   urls?: list<URL>|null,
     * }> $contacts
     */
    public function withContacts(array $contacts): self
    {
        $self = clone $this;
        $self['contacts'] = $contacts;

        return $self;
    }

    /**
     * @param Document|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $document
     */
    public function withDocument(Document|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }

    /**
     * @param Image|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $image
     */
    public function withImage(Image|array $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    /**
     * @param Interactive|array{
     *   action?: Action|null,
     *   body?: Interactive\Body|null,
     *   footer?: Footer|null,
     *   header?: Header|null,
     *   type?: value-of<Interactive\Type>|null,
     * } $interactive
     */
    public function withInteractive(Interactive|array $interactive): self
    {
        $self = clone $this;
        $self['interactive'] = $interactive;

        return $self;
    }

    /**
     * @param Location|array{
     *   address?: string|null,
     *   latitude?: string|null,
     *   longitude?: string|null,
     *   name?: string|null,
     * } $location
     */
    public function withLocation(Location|array $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * @param Reaction|array{empji?: string|null, messageID?: string|null} $reaction
     */
    public function withReaction(Reaction|array $reaction): self
    {
        $self = clone $this;
        $self['reaction'] = $reaction;

        return $self;
    }

    /**
     * @param Sticker|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $sticker
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
     * @param Video|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $video
     */
    public function withVideo(Video|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}

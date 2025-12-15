<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Address;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Email;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Org;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\Phone;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact\URL;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Body;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Footer;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Header;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Location;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Reaction;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Type;
use Telnyx\Messsages\WhatsappMedia;

/**
 * @phpstan-type WhatsappMessageShape = array{
 *   audio?: WhatsappMedia|null,
 *   bizOpaqueCallbackData?: string|null,
 *   contacts?: list<Contact>|null,
 *   document?: WhatsappMedia|null,
 *   image?: WhatsappMedia|null,
 *   interactive?: Interactive|null,
 *   location?: Location|null,
 *   reaction?: Reaction|null,
 *   sticker?: WhatsappMedia|null,
 *   type?: value-of<\Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Type>|null,
 *   video?: WhatsappMedia|null,
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
     * @param WhatsappMedia|array{
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
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $document
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $image
     * @param Interactive|array{
     *   action?: Action|null,
     *   body?: Body|null,
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
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $sticker
     * @param Type|value-of<Type> $type
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $video
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
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $audio
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
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $document
     */
    public function withDocument(WhatsappMedia|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }

    /**
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $image
     */
    public function withImage(WhatsappMedia|array $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    /**
     * @param Interactive|array{
     *   action?: Action|null,
     *   body?: Body|null,
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
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $sticker
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
     * @param WhatsappMedia|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $video
     */
    public function withVideo(WhatsappMedia|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Header\Type;
use Telnyx\Messages\WhatsappMedia;

/**
 * @phpstan-import-type WhatsappMediaShape from \Telnyx\Messages\WhatsappMedia
 *
 * @phpstan-type HeaderShape = array{
 *   type: \Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Header\Type|value-of<\Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Header\Type>,
 *   document?: null|WhatsappMedia|WhatsappMediaShape,
 *   image?: null|WhatsappMedia|WhatsappMediaShape,
 *   subText?: string|null,
 *   text?: string|null,
 *   video?: null|WhatsappMedia|WhatsappMediaShape,
 * }
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    /**
     * header type. Required when a header is provided; the matching document, image, text, or video field must be set.
     *
     * @var value-of<Type> $type
     */
    #[Required(
        enum: Type::class,
    )]
    public string $type;

    #[Optional]
    public ?WhatsappMedia $document;

    #[Optional]
    public ?WhatsappMedia $image;

    #[Optional('sub_text')]
    public ?string $subText;

    /**
     * header text, 60 character maximum.
     */
    #[Optional]
    public ?string $text;

    #[Optional]
    public ?WhatsappMedia $video;

    /**
     * `new Header()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Header::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Header)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param WhatsappMedia|WhatsappMediaShape|null $document
     * @param WhatsappMedia|WhatsappMediaShape|null $image
     * @param WhatsappMedia|WhatsappMediaShape|null $video
     */
    public static function with(
        Type|string $type,
        WhatsappMedia|array|null $document = null,
        WhatsappMedia|array|null $image = null,
        ?string $subText = null,
        ?string $text = null,
        WhatsappMedia|array|null $video = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $document && $self['document'] = $document;
        null !== $image && $self['image'] = $image;
        null !== $subText && $self['subText'] = $subText;
        null !== $text && $self['text'] = $text;
        null !== $video && $self['video'] = $video;

        return $self;
    }

    /**
     * header type. Required when a header is provided; the matching document, image, text, or video field must be set.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(
        Type|string $type,
    ): self {
        $self = clone $this;
        $self['type'] = $type;

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

    public function withSubText(string $subText): self
    {
        $self = clone $this;
        $self['subText'] = $subText;

        return $self;
    }

    /**
     * header text, 60 character maximum.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

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

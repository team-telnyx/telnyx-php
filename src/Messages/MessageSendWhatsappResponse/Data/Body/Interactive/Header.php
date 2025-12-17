<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\WhatsappMedia;

/**
 * @phpstan-import-type WhatsappMediaShape from \Telnyx\Messages\WhatsappMedia
 *
 * @phpstan-type HeaderShape = array{
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WhatsappMediaShape $document
     * @param WhatsappMediaShape $image
     * @param WhatsappMediaShape $video
     */
    public static function with(
        WhatsappMedia|array|null $document = null,
        WhatsappMedia|array|null $image = null,
        ?string $subText = null,
        ?string $text = null,
        WhatsappMedia|array|null $video = null,
    ): self {
        $self = new self;

        null !== $document && $self['document'] = $document;
        null !== $image && $self['image'] = $image;
        null !== $subText && $self['subText'] = $subText;
        null !== $text && $self['text'] = $text;
        null !== $video && $self['video'] = $video;

        return $self;
    }

    /**
     * @param WhatsappMediaShape $document
     */
    public function withDocument(WhatsappMedia|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }

    /**
     * @param WhatsappMediaShape $image
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
     * @param WhatsappMediaShape $video
     */
    public function withVideo(WhatsappMedia|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}

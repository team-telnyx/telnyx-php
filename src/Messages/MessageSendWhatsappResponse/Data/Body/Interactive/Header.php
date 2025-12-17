<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header\Document;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header\Image;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header\Video;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header\Document
 * @phpstan-import-type ImageShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header\Image
 * @phpstan-import-type VideoShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header\Video
 *
 * @phpstan-type HeaderShape = array{
 *   document?: null|Document|DocumentShape,
 *   image?: null|Image|ImageShape,
 *   subText?: string|null,
 *   text?: string|null,
 *   video?: null|Video|VideoShape,
 * }
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    #[Optional]
    public ?Document $document;

    #[Optional]
    public ?Image $image;

    #[Optional('sub_text')]
    public ?string $subText;

    /**
     * header text, 60 character maximum.
     */
    #[Optional]
    public ?string $text;

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
     * @param DocumentShape $document
     * @param ImageShape $image
     * @param VideoShape $video
     */
    public static function with(
        Document|array|null $document = null,
        Image|array|null $image = null,
        ?string $subText = null,
        ?string $text = null,
        Video|array|null $video = null,
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
     * @param VideoShape $video
     */
    public function withVideo(Video|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}

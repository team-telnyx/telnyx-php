<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Header\Document;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Header\Image;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Header\Video;

/**
 * @phpstan-type HeaderShape = array{
 *   document?: Document|null,
 *   image?: Image|null,
 *   subText?: string|null,
 *   text?: string|null,
 *   video?: Video|null,
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
     * @param Video|array{
     *   caption?: string|null,
     *   filename?: string|null,
     *   link?: string|null,
     *   voice?: bool|null,
     * } $video
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

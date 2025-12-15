<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Header;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VideoShape = array{
 *   caption?: string|null,
 *   filename?: string|null,
 *   link?: string|null,
 *   voice?: bool|null,
 * }
 */
final class Video implements BaseModel
{
    /** @use SdkModel<VideoShape> */
    use SdkModel;

    /**
     * media caption.
     */
    #[Optional]
    public ?string $caption;

    /**
     * file name with extension.
     */
    #[Optional]
    public ?string $filename;

    /**
     * media URL.
     */
    #[Optional]
    public ?string $link;

    /**
     * true if voice message.
     */
    #[Optional]
    public ?bool $voice;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $caption = null,
        ?string $filename = null,
        ?string $link = null,
        ?bool $voice = null,
    ): self {
        $self = new self;

        null !== $caption && $self['caption'] = $caption;
        null !== $filename && $self['filename'] = $filename;
        null !== $link && $self['link'] = $link;
        null !== $voice && $self['voice'] = $voice;

        return $self;
    }

    /**
     * media caption.
     */
    public function withCaption(string $caption): self
    {
        $self = clone $this;
        $self['caption'] = $caption;

        return $self;
    }

    /**
     * file name with extension.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * media URL.
     */
    public function withLink(string $link): self
    {
        $self = clone $this;
        $self['link'] = $link;

        return $self;
    }

    /**
     * true if voice message.
     */
    public function withVoice(bool $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }
}

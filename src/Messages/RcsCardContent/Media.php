<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsCardContent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsCardContent\Media\Height;
use Telnyx\Messages\RcsContentInfo;

/**
 * A media file within a rich card.
 *
 * @phpstan-import-type RcsContentInfoShape from \Telnyx\Messages\RcsContentInfo
 *
 * @phpstan-type MediaShape = array{
 *   contentInfo?: null|RcsContentInfo|RcsContentInfoShape,
 *   height?: null|Height|value-of<Height>,
 * }
 */
final class Media implements BaseModel
{
    /** @use SdkModel<MediaShape> */
    use SdkModel;

    #[Optional('content_info')]
    public ?RcsContentInfo $contentInfo;

    /**
     * The height of the media within a rich card with a vertical layout. For a standalone card with horizontal layout, height is not customizable, and this field is ignored.
     *
     * @var value-of<Height>|null $height
     */
    #[Optional(enum: Height::class)]
    public ?string $height;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RcsContentInfo|RcsContentInfoShape|null $contentInfo
     * @param Height|value-of<Height>|null $height
     */
    public static function with(
        RcsContentInfo|array|null $contentInfo = null,
        Height|string|null $height = null
    ): self {
        $self = new self;

        null !== $contentInfo && $self['contentInfo'] = $contentInfo;
        null !== $height && $self['height'] = $height;

        return $self;
    }

    /**
     * @param RcsContentInfo|RcsContentInfoShape $contentInfo
     */
    public function withContentInfo(RcsContentInfo|array $contentInfo): self
    {
        $self = clone $this;
        $self['contentInfo'] = $contentInfo;

        return $self;
    }

    /**
     * The height of the media within a rich card with a vertical layout. For a standalone card with horizontal layout, height is not customizable, and this field is ignored.
     *
     * @param Height|value-of<Height> $height
     */
    public function withHeight(Height|string $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }
}

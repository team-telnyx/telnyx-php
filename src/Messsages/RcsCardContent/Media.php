<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsCardContent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsCardContent\Media\Height;
use Telnyx\Messsages\RcsContentInfo;

/**
 * A media file within a rich card.
 *
 * @phpstan-type media_alias = array{
 *   contentInfo?: RcsContentInfo, height?: value-of<Height>
 * }
 */
final class Media implements BaseModel
{
    /** @use SdkModel<media_alias> */
    use SdkModel;

    #[Api('content_info', optional: true)]
    public ?RcsContentInfo $contentInfo;

    /**
     * The height of the media within a rich card with a vertical layout. For a standalone card with horizontal layout, height is not customizable, and this field is ignored.
     *
     * @var value-of<Height>|null $height
     */
    #[Api(enum: Height::class, optional: true)]
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
     * @param Height|value-of<Height> $height
     */
    public static function with(
        ?RcsContentInfo $contentInfo = null,
        Height|string|null $height = null
    ): self {
        $obj = new self;

        null !== $contentInfo && $obj->contentInfo = $contentInfo;
        null !== $height && $obj->height = $height instanceof Height ? $height->value : $height;

        return $obj;
    }

    public function withContentInfo(RcsContentInfo $contentInfo): self
    {
        $obj = clone $this;
        $obj->contentInfo = $contentInfo;

        return $obj;
    }

    /**
     * The height of the media within a rich card with a vertical layout. For a standalone card with horizontal layout, height is not customizable, and this field is ignored.
     *
     * @param Height|value-of<Height> $height
     */
    public function withHeight(Height|string $height): self
    {
        $obj = clone $this;
        $obj->height = $height instanceof Height ? $height->value : $height;

        return $obj;
    }
}

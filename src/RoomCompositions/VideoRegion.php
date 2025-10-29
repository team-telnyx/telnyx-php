<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VideoRegionShape = array{
 *   height?: int|null,
 *   maxColumns?: int|null,
 *   maxRows?: int|null,
 *   videoSources?: list<string>,
 *   width?: int|null,
 *   xPos?: int|null,
 *   yPos?: int|null,
 *   zPos?: int|null,
 * }
 */
final class VideoRegion implements BaseModel
{
    /** @use SdkModel<VideoRegionShape> */
    use SdkModel;

    /**
     * Height of the video region.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $height;

    /**
     * Maximum number of columns of the region's placement grid. By default, the region has as many columns as needed to layout all the specified video sources.
     */
    #[Api('max_columns', nullable: true, optional: true)]
    public ?int $maxColumns;

    /**
     * Maximum number of rows of the region's placement grid. By default, the region has as many rows as needed to layout all the specified video sources.
     */
    #[Api('max_rows', nullable: true, optional: true)]
    public ?int $maxRows;

    /**
     * Array of video recording ids to be composed in the region. Can be "*" to specify all video recordings in the session.
     *
     * @var list<string>|null $videoSources
     */
    #[Api('video_sources', list: 'string', optional: true)]
    public ?array $videoSources;

    /**
     * Width of the video region.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $width;

    /**
     * X axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    #[Api('x_pos', nullable: true, optional: true)]
    public ?int $xPos;

    /**
     * Y axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    #[Api('y_pos', nullable: true, optional: true)]
    public ?int $yPos;

    /**
     * Regions with higher z_pos values are stacked on top of regions with lower z_pos values.
     */
    #[Api('z_pos', nullable: true, optional: true)]
    public ?int $zPos;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $videoSources
     */
    public static function with(
        ?int $height = null,
        ?int $maxColumns = null,
        ?int $maxRows = null,
        ?array $videoSources = null,
        ?int $width = null,
        ?int $xPos = null,
        ?int $yPos = null,
        ?int $zPos = null,
    ): self {
        $obj = new self;

        null !== $height && $obj->height = $height;
        null !== $maxColumns && $obj->maxColumns = $maxColumns;
        null !== $maxRows && $obj->maxRows = $maxRows;
        null !== $videoSources && $obj->videoSources = $videoSources;
        null !== $width && $obj->width = $width;
        null !== $xPos && $obj->xPos = $xPos;
        null !== $yPos && $obj->yPos = $yPos;
        null !== $zPos && $obj->zPos = $zPos;

        return $obj;
    }

    /**
     * Height of the video region.
     */
    public function withHeight(?int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    /**
     * Maximum number of columns of the region's placement grid. By default, the region has as many columns as needed to layout all the specified video sources.
     */
    public function withMaxColumns(?int $maxColumns): self
    {
        $obj = clone $this;
        $obj->maxColumns = $maxColumns;

        return $obj;
    }

    /**
     * Maximum number of rows of the region's placement grid. By default, the region has as many rows as needed to layout all the specified video sources.
     */
    public function withMaxRows(?int $maxRows): self
    {
        $obj = clone $this;
        $obj->maxRows = $maxRows;

        return $obj;
    }

    /**
     * Array of video recording ids to be composed in the region. Can be "*" to specify all video recordings in the session.
     *
     * @param list<string> $videoSources
     */
    public function withVideoSources(array $videoSources): self
    {
        $obj = clone $this;
        $obj->videoSources = $videoSources;

        return $obj;
    }

    /**
     * Width of the video region.
     */
    public function withWidth(?int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }

    /**
     * X axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    public function withXPos(?int $xPos): self
    {
        $obj = clone $this;
        $obj->xPos = $xPos;

        return $obj;
    }

    /**
     * Y axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    public function withYPos(?int $yPos): self
    {
        $obj = clone $this;
        $obj->yPos = $yPos;

        return $obj;
    }

    /**
     * Regions with higher z_pos values are stacked on top of regions with lower z_pos values.
     */
    public function withZPos(?int $zPos): self
    {
        $obj = clone $this;
        $obj->zPos = $zPos;

        return $obj;
    }
}

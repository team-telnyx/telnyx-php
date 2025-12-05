<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VideoRegionShape = array{
 *   height?: int|null,
 *   max_columns?: int|null,
 *   max_rows?: int|null,
 *   video_sources?: list<string>|null,
 *   width?: int|null,
 *   x_pos?: int|null,
 *   y_pos?: int|null,
 *   z_pos?: int|null,
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
    #[Api(nullable: true, optional: true)]
    public ?int $max_columns;

    /**
     * Maximum number of rows of the region's placement grid. By default, the region has as many rows as needed to layout all the specified video sources.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $max_rows;

    /**
     * Array of video recording ids to be composed in the region. Can be "*" to specify all video recordings in the session.
     *
     * @var list<string>|null $video_sources
     */
    #[Api(list: 'string', optional: true)]
    public ?array $video_sources;

    /**
     * Width of the video region.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $width;

    /**
     * X axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $x_pos;

    /**
     * Y axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $y_pos;

    /**
     * Regions with higher z_pos values are stacked on top of regions with lower z_pos values.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $z_pos;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $video_sources
     */
    public static function with(
        ?int $height = null,
        ?int $max_columns = null,
        ?int $max_rows = null,
        ?array $video_sources = null,
        ?int $width = null,
        ?int $x_pos = null,
        ?int $y_pos = null,
        ?int $z_pos = null,
    ): self {
        $obj = new self;

        null !== $height && $obj['height'] = $height;
        null !== $max_columns && $obj['max_columns'] = $max_columns;
        null !== $max_rows && $obj['max_rows'] = $max_rows;
        null !== $video_sources && $obj['video_sources'] = $video_sources;
        null !== $width && $obj['width'] = $width;
        null !== $x_pos && $obj['x_pos'] = $x_pos;
        null !== $y_pos && $obj['y_pos'] = $y_pos;
        null !== $z_pos && $obj['z_pos'] = $z_pos;

        return $obj;
    }

    /**
     * Height of the video region.
     */
    public function withHeight(?int $height): self
    {
        $obj = clone $this;
        $obj['height'] = $height;

        return $obj;
    }

    /**
     * Maximum number of columns of the region's placement grid. By default, the region has as many columns as needed to layout all the specified video sources.
     */
    public function withMaxColumns(?int $maxColumns): self
    {
        $obj = clone $this;
        $obj['max_columns'] = $maxColumns;

        return $obj;
    }

    /**
     * Maximum number of rows of the region's placement grid. By default, the region has as many rows as needed to layout all the specified video sources.
     */
    public function withMaxRows(?int $maxRows): self
    {
        $obj = clone $this;
        $obj['max_rows'] = $maxRows;

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
        $obj['video_sources'] = $videoSources;

        return $obj;
    }

    /**
     * Width of the video region.
     */
    public function withWidth(?int $width): self
    {
        $obj = clone $this;
        $obj['width'] = $width;

        return $obj;
    }

    /**
     * X axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    public function withXPos(?int $xPos): self
    {
        $obj = clone $this;
        $obj['x_pos'] = $xPos;

        return $obj;
    }

    /**
     * Y axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    public function withYPos(?int $yPos): self
    {
        $obj = clone $this;
        $obj['y_pos'] = $yPos;

        return $obj;
    }

    /**
     * Regions with higher z_pos values are stacked on top of regions with lower z_pos values.
     */
    public function withZPos(?int $zPos): self
    {
        $obj = clone $this;
        $obj['z_pos'] = $zPos;

        return $obj;
    }
}

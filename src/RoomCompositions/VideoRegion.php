<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VideoRegionShape = array{
 *   height?: int|null,
 *   maxColumns?: int|null,
 *   maxRows?: int|null,
 *   videoSources?: list<string>|null,
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
    #[Optional]
    public ?int $height;

    /**
     * Maximum number of columns of the region's placement grid. By default, the region has as many columns as needed to layout all the specified video sources.
     */
    #[Optional('max_columns')]
    public ?int $maxColumns;

    /**
     * Maximum number of rows of the region's placement grid. By default, the region has as many rows as needed to layout all the specified video sources.
     */
    #[Optional('max_rows')]
    public ?int $maxRows;

    /**
     * Array of video recording ids to be composed in the region. Can be "*" to specify all video recordings in the session.
     *
     * @var list<string>|null $videoSources
     */
    #[Optional('video_sources', list: 'string')]
    public ?array $videoSources;

    /**
     * Width of the video region.
     */
    #[Optional]
    public ?int $width;

    /**
     * X axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    #[Optional('x_pos')]
    public ?int $xPos;

    /**
     * Y axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    #[Optional('y_pos')]
    public ?int $yPos;

    /**
     * Regions with higher z_pos values are stacked on top of regions with lower z_pos values.
     */
    #[Optional('z_pos')]
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
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $maxColumns && $self['maxColumns'] = $maxColumns;
        null !== $maxRows && $self['maxRows'] = $maxRows;
        null !== $videoSources && $self['videoSources'] = $videoSources;
        null !== $width && $self['width'] = $width;
        null !== $xPos && $self['xPos'] = $xPos;
        null !== $yPos && $self['yPos'] = $yPos;
        null !== $zPos && $self['zPos'] = $zPos;

        return $self;
    }

    /**
     * Height of the video region.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * Maximum number of columns of the region's placement grid. By default, the region has as many columns as needed to layout all the specified video sources.
     */
    public function withMaxColumns(int $maxColumns): self
    {
        $self = clone $this;
        $self['maxColumns'] = $maxColumns;

        return $self;
    }

    /**
     * Maximum number of rows of the region's placement grid. By default, the region has as many rows as needed to layout all the specified video sources.
     */
    public function withMaxRows(int $maxRows): self
    {
        $self = clone $this;
        $self['maxRows'] = $maxRows;

        return $self;
    }

    /**
     * Array of video recording ids to be composed in the region. Can be "*" to specify all video recordings in the session.
     *
     * @param list<string> $videoSources
     */
    public function withVideoSources(array $videoSources): self
    {
        $self = clone $this;
        $self['videoSources'] = $videoSources;

        return $self;
    }

    /**
     * Width of the video region.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }

    /**
     * X axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    public function withXPos(int $xPos): self
    {
        $self = clone $this;
        $self['xPos'] = $xPos;

        return $self;
    }

    /**
     * Y axis value (in pixels) of the region's upper left corner relative to the upper left corner of the whole room composition viewport.
     */
    public function withYPos(int $yPos): self
    {
        $self = clone $this;
        $self['yPos'] = $yPos;

        return $self;
    }

    /**
     * Regions with higher z_pos values are stacked on top of regions with lower z_pos values.
     */
    public function withZPos(int $zPos): self
    {
        $self = clone $this;
        $self['zPos'] = $zPos;

        return $self;
    }
}

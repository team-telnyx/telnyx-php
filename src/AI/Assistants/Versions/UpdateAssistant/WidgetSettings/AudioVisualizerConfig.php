<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings\AudioVisualizerConfig\Color;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AudioVisualizerConfigShape = array{
 *   color?: null|Color|value-of<Color>, preset?: string|null
 * }
 */
final class AudioVisualizerConfig implements BaseModel
{
    /** @use SdkModel<AudioVisualizerConfigShape> */
    use SdkModel;

    /**
     * The color theme for the audio visualizer.
     *
     * @var value-of<Color>|null $color
     */
    #[Optional(enum: Color::class)]
    public ?string $color;

    /**
     * The preset style for the audio visualizer.
     */
    #[Optional]
    public ?string $preset;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Color|value-of<Color>|null $color
     */
    public static function with(
        Color|string|null $color = null,
        ?string $preset = null
    ): self {
        $self = new self;

        null !== $color && $self['color'] = $color;
        null !== $preset && $self['preset'] = $preset;

        return $self;
    }

    /**
     * The color theme for the audio visualizer.
     *
     * @param Color|value-of<Color> $color
     */
    public function withColor(Color|string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    /**
     * The preset style for the audio visualizer.
     */
    public function withPreset(string $preset): self
    {
        $self = clone $this;
        $self['preset'] = $preset;

        return $self;
    }
}

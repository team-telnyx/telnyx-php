<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings;

use Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig\Family;
use Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig\Mode;
use Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig\Size;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for noise suppression. Applicable fields depend on the engine: 'attenuation_limit' and 'mode' only when noise_suppression is 'deepfilternet'; 'family', 'size' and 'enhancement_level' only when noise_suppression is 'aicoustics'.
 *
 * @phpstan-type NoiseSuppressionConfigShape = array{
 *   attenuationLimit?: int|null,
 *   enhancementLevel?: float|null,
 *   family?: null|Family|value-of<Family>,
 *   mode?: null|Mode|value-of<Mode>,
 *   size?: null|Size|value-of<Size>,
 * }
 */
final class NoiseSuppressionConfig implements BaseModel
{
    /** @use SdkModel<NoiseSuppressionConfigShape> */
    use SdkModel;

    /**
     * Attenuation limit for noise suppression. Range: 0-100. Only applicable when noise_suppression is 'deepfilternet'.
     */
    #[Optional('attenuation_limit')]
    public ?int $attenuationLimit;

    /**
     * AiCoustics enhancement intensity. Range: 0-1. Only applicable when noise_suppression is 'aicoustics'.
     */
    #[Optional('enhancement_level')]
    public ?float $enhancementLevel;

    /**
     * AiCoustics model family optimized for Voice AI and STT. Only applicable when noise_suppression is 'aicoustics'.
     *
     * @var value-of<Family>|null $family
     */
    #[Optional(enum: Family::class)]
    public ?string $family;

    /**
     * Mode for noise suppression configuration. Only applicable when noise_suppression is 'deepfilternet'.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * AiCoustics model size. 'vf' tracks the latest model release; 'vf_2_0_l' is pinned to version 2.0 for consistent, predictable behavior. Only applicable when noise_suppression is 'aicoustics'.
     *
     * @var value-of<Size>|null $size
     */
    #[Optional(enum: Size::class)]
    public ?string $size;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Family|value-of<Family>|null $family
     * @param Mode|value-of<Mode>|null $mode
     * @param Size|value-of<Size>|null $size
     */
    public static function with(
        ?int $attenuationLimit = null,
        ?float $enhancementLevel = null,
        Family|string|null $family = null,
        Mode|string|null $mode = null,
        Size|string|null $size = null,
    ): self {
        $self = new self;

        null !== $attenuationLimit && $self['attenuationLimit'] = $attenuationLimit;
        null !== $enhancementLevel && $self['enhancementLevel'] = $enhancementLevel;
        null !== $family && $self['family'] = $family;
        null !== $mode && $self['mode'] = $mode;
        null !== $size && $self['size'] = $size;

        return $self;
    }

    /**
     * Attenuation limit for noise suppression. Range: 0-100. Only applicable when noise_suppression is 'deepfilternet'.
     */
    public function withAttenuationLimit(int $attenuationLimit): self
    {
        $self = clone $this;
        $self['attenuationLimit'] = $attenuationLimit;

        return $self;
    }

    /**
     * AiCoustics enhancement intensity. Range: 0-1. Only applicable when noise_suppression is 'aicoustics'.
     */
    public function withEnhancementLevel(float $enhancementLevel): self
    {
        $self = clone $this;
        $self['enhancementLevel'] = $enhancementLevel;

        return $self;
    }

    /**
     * AiCoustics model family optimized for Voice AI and STT. Only applicable when noise_suppression is 'aicoustics'.
     *
     * @param Family|value-of<Family> $family
     */
    public function withFamily(Family|string $family): self
    {
        $self = clone $this;
        $self['family'] = $family;

        return $self;
    }

    /**
     * Mode for noise suppression configuration. Only applicable when noise_suppression is 'deepfilternet'.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * AiCoustics model size. 'vf' tracks the latest model release; 'vf_2_0_l' is pinned to version 2.0 for consistent, predictable behavior. Only applicable when noise_suppression is 'aicoustics'.
     *
     * @param Size|value-of<Size> $size
     */
    public function withSize(Size|string $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }
}

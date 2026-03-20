<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig\Family;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig\Mode;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig\Model;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig\Size;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration parameters for noise suppression engines. Different engines support different parameters.
 *
 * @phpstan-type NoiseSuppressionEngineConfigShape = array{
 *   attenuationLimit?: int|null,
 *   enhancementLevel?: float|null,
 *   family?: null|Family|value-of<Family>,
 *   mode?: null|Mode|value-of<Mode>,
 *   model?: null|Model|value-of<Model>,
 *   size?: null|Size|value-of<Size>,
 *   suppressionLevel?: float|null,
 *   voiceGain?: float|null,
 * }
 */
final class NoiseSuppressionEngineConfig implements BaseModel
{
    /** @use SdkModel<NoiseSuppressionEngineConfigShape> */
    use SdkModel;

    /**
     * The attenuation limit for noise suppression (0-100). Only applicable for DeepFilterNet.
     */
    #[Optional('attenuation_limit')]
    public ?int $attenuationLimit;

    /**
     * Enhancement intensity (0.0-1.0). Only applicable for AiCoustics.
     */
    #[Optional('enhancement_level')]
    public ?float $enhancementLevel;

    /**
     * AiCoustics model family. 'sparrow' optimized for human-to-human calls, 'quail' optimized for Voice AI/STT. Only applicable for AiCoustics.
     *
     * @var value-of<Family>|null $family
     */
    #[Optional(enum: Family::class)]
    public ?string $family;

    /**
     * Processing mode. Only applicable for DeepFilterNet.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * The Krisp model to use. Only applicable for Krisp.
     *
     * @var value-of<Model>|null $model
     */
    #[Optional(enum: Model::class)]
    public ?string $model;

    /**
     * AiCoustics model size. 's' and 'l' work with both families. 'xs' and 'xxs' are sparrow-only. 'vf_l' and 'vf_1_1_l' are quail-only. Only applicable for AiCoustics.
     *
     * @var value-of<Size>|null $size
     */
    #[Optional(enum: Size::class)]
    public ?string $size;

    /**
     * Suppression level (0.0-100.0). Only applicable for Krisp.
     */
    #[Optional('suppression_level')]
    public ?float $suppressionLevel;

    /**
     * Voice gain multiplier (0.1-4.0). Only applicable for AiCoustics.
     */
    #[Optional('voice_gain')]
    public ?float $voiceGain;

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
     * @param Model|value-of<Model>|null $model
     * @param Size|value-of<Size>|null $size
     */
    public static function with(
        ?int $attenuationLimit = null,
        ?float $enhancementLevel = null,
        Family|string|null $family = null,
        Mode|string|null $mode = null,
        Model|string|null $model = null,
        Size|string|null $size = null,
        ?float $suppressionLevel = null,
        ?float $voiceGain = null,
    ): self {
        $self = new self;

        null !== $attenuationLimit && $self['attenuationLimit'] = $attenuationLimit;
        null !== $enhancementLevel && $self['enhancementLevel'] = $enhancementLevel;
        null !== $family && $self['family'] = $family;
        null !== $mode && $self['mode'] = $mode;
        null !== $model && $self['model'] = $model;
        null !== $size && $self['size'] = $size;
        null !== $suppressionLevel && $self['suppressionLevel'] = $suppressionLevel;
        null !== $voiceGain && $self['voiceGain'] = $voiceGain;

        return $self;
    }

    /**
     * The attenuation limit for noise suppression (0-100). Only applicable for DeepFilterNet.
     */
    public function withAttenuationLimit(int $attenuationLimit): self
    {
        $self = clone $this;
        $self['attenuationLimit'] = $attenuationLimit;

        return $self;
    }

    /**
     * Enhancement intensity (0.0-1.0). Only applicable for AiCoustics.
     */
    public function withEnhancementLevel(float $enhancementLevel): self
    {
        $self = clone $this;
        $self['enhancementLevel'] = $enhancementLevel;

        return $self;
    }

    /**
     * AiCoustics model family. 'sparrow' optimized for human-to-human calls, 'quail' optimized for Voice AI/STT. Only applicable for AiCoustics.
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
     * Processing mode. Only applicable for DeepFilterNet.
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
     * The Krisp model to use. Only applicable for Krisp.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * AiCoustics model size. 's' and 'l' work with both families. 'xs' and 'xxs' are sparrow-only. 'vf_l' and 'vf_1_1_l' are quail-only. Only applicable for AiCoustics.
     *
     * @param Size|value-of<Size> $size
     */
    public function withSize(Size|string $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * Suppression level (0.0-100.0). Only applicable for Krisp.
     */
    public function withSuppressionLevel(float $suppressionLevel): self
    {
        $self = clone $this;
        $self['suppressionLevel'] = $suppressionLevel;

        return $self;
    }

    /**
     * Voice gain multiplier (0.1-4.0). Only applicable for AiCoustics.
     */
    public function withVoiceGain(float $voiceGain): self
    {
        $self = clone $this;
        $self['voiceGain'] = $voiceGain;

        return $self;
    }
}

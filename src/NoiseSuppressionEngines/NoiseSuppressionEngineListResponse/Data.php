<?php

declare(strict_types=1);

namespace Telnyx\NoiseSuppressionEngines\NoiseSuppressionEngineListResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A noise suppression engine available to the authenticated user.
 *
 * @phpstan-type DataShape = array{
 *   defaultAttenuationLevel: int, label: string, value: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Default attenuation level of the engine (0-100, in multiples of ten).
     */
    #[Required('default_attenuation_level')]
    public int $defaultAttenuationLevel;

    /**
     * Human-readable name of the engine.
     */
    #[Required]
    public string $label;

    /**
     * Machine-readable identifier of the engine, used when configuring noise suppression.
     */
    #[Required]
    public string $value;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(defaultAttenuationLevel: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withDefaultAttenuationLevel(...)->withLabel(...)->withValue(...)
     * ```
     */
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
        int $defaultAttenuationLevel,
        string $label,
        string $value
    ): self {
        $self = new self;

        $self['defaultAttenuationLevel'] = $defaultAttenuationLevel;
        $self['label'] = $label;
        $self['value'] = $value;

        return $self;
    }

    /**
     * Default attenuation level of the engine (0-100, in multiples of ten).
     */
    public function withDefaultAttenuationLevel(
        int $defaultAttenuationLevel
    ): self {
        $self = clone $this;
        $self['defaultAttenuationLevel'] = $defaultAttenuationLevel;

        return $self;
    }

    /**
     * Human-readable name of the engine.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Machine-readable identifier of the engine, used when configuring noise suppression.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}

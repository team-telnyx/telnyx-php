<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings;

use Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig\Mode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for noise suppression. Only applicable when noise_suppression is 'deepfilternet'.
 *
 * @phpstan-type NoiseSuppressionConfigShape = array{
 *   attenuationLimit?: int|null, mode?: null|Mode|value-of<Mode>
 * }
 */
final class NoiseSuppressionConfig implements BaseModel
{
    /** @use SdkModel<NoiseSuppressionConfigShape> */
    use SdkModel;

    /**
     * Attenuation limit for noise suppression. Range: 0-100.
     */
    #[Optional('attenuation_limit')]
    public ?int $attenuationLimit;

    /**
     * Mode for noise suppression configuration.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Mode|value-of<Mode>|null $mode
     */
    public static function with(
        ?int $attenuationLimit = null,
        Mode|string|null $mode = null
    ): self {
        $self = new self;

        null !== $attenuationLimit && $self['attenuationLimit'] = $attenuationLimit;
        null !== $mode && $self['mode'] = $mode;

        return $self;
    }

    /**
     * Attenuation limit for noise suppression. Range: 0-100.
     */
    public function withAttenuationLimit(int $attenuationLimit): self
    {
        $self = clone $this;
        $self['attenuationLimit'] = $attenuationLimit;

        return $self;
    }

    /**
     * Mode for noise suppression configuration.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }
}

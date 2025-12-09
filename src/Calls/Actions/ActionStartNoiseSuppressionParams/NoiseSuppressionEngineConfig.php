<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration parameters for noise suppression engines.
 *
 * @phpstan-type NoiseSuppressionEngineConfigShape = array{
 *   attenuationLimit?: int|null
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $attenuationLimit = null): self
    {
        $obj = new self;

        null !== $attenuationLimit && $obj['attenuationLimit'] = $attenuationLimit;

        return $obj;
    }

    /**
     * The attenuation limit for noise suppression (0-100). Only applicable for DeepFilterNet.
     */
    public function withAttenuationLimit(int $attenuationLimit): self
    {
        $obj = clone $this;
        $obj['attenuationLimit'] = $attenuationLimit;

        return $obj;
    }
}

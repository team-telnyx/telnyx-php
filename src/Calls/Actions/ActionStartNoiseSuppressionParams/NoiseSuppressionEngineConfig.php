<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration parameters for noise suppression engines.
 *
 * @phpstan-type NoiseSuppressionEngineConfigShape = array{
 *   attenuation_limit?: int|null
 * }
 */
final class NoiseSuppressionEngineConfig implements BaseModel
{
    /** @use SdkModel<NoiseSuppressionEngineConfigShape> */
    use SdkModel;

    /**
     * The attenuation limit for noise suppression (0-100). Only applicable for DeepFilterNet.
     */
    #[Api(optional: true)]
    public ?int $attenuation_limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $attenuation_limit = null): self
    {
        $obj = new self;

        null !== $attenuation_limit && $obj->attenuation_limit = $attenuation_limit;

        return $obj;
    }

    /**
     * The attenuation limit for noise suppression (0-100). Only applicable for DeepFilterNet.
     */
    public function withAttenuationLimit(int $attenuationLimit): self
    {
        $obj = clone $this;
        $obj->attenuation_limit = $attenuationLimit;

        return $obj;
    }
}

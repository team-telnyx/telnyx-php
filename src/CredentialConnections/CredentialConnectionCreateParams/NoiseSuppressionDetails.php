<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialConnectionCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\NoiseSuppressionDetails\Engine;

/**
 * Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
 *
 * @phpstan-type NoiseSuppressionDetailsShape = array{
 *   attenuationLimit?: int|null, engine?: null|Engine|value-of<Engine>
 * }
 */
final class NoiseSuppressionDetails implements BaseModel
{
    /** @use SdkModel<NoiseSuppressionDetailsShape> */
    use SdkModel;

    /**
     * The attenuation limit value for the selected engine. Default values vary by engine: 0 for 'denoiser', 80 for 'deep_filter_net', 'deep_filter_net_large', and all Krisp engines ('krisp_viva_tel', 'krisp_viva_tel_lite', 'krisp_viva_promodel', 'krisp_viva_ss').
     */
    #[Optional('attenuation_limit')]
    public ?int $attenuationLimit;

    /**
     * The noise suppression engine to use. 'denoiser' is the default engine. 'deep_filter_net' and 'deep_filter_net_large' are alternative engines with different performance characteristics. Krisp engines ('krisp_viva_tel', 'krisp_viva_tel_lite', 'krisp_viva_promodel', 'krisp_viva_ss') provide advanced noise suppression capabilities.
     *
     * @var value-of<Engine>|null $engine
     */
    #[Optional(enum: Engine::class)]
    public ?string $engine;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Engine|value-of<Engine>|null $engine
     */
    public static function with(
        ?int $attenuationLimit = null,
        Engine|string|null $engine = null
    ): self {
        $self = new self;

        null !== $attenuationLimit && $self['attenuationLimit'] = $attenuationLimit;
        null !== $engine && $self['engine'] = $engine;

        return $self;
    }

    /**
     * The attenuation limit value for the selected engine. Default values vary by engine: 0 for 'denoiser', 80 for 'deep_filter_net', 'deep_filter_net_large', and all Krisp engines ('krisp_viva_tel', 'krisp_viva_tel_lite', 'krisp_viva_promodel', 'krisp_viva_ss').
     */
    public function withAttenuationLimit(int $attenuationLimit): self
    {
        $self = clone $this;
        $self['attenuationLimit'] = $attenuationLimit;

        return $self;
    }

    /**
     * The noise suppression engine to use. 'denoiser' is the default engine. 'deep_filter_net' and 'deep_filter_net_large' are alternative engines with different performance characteristics. Krisp engines ('krisp_viva_tel', 'krisp_viva_tel_lite', 'krisp_viva_promodel', 'krisp_viva_ss') provide advanced noise suppression capabilities.
     *
     * @param Engine|value-of<Engine> $engine
     */
    public function withEngine(Engine|string $engine): self
    {
        $self = clone $this;
        $self['engine'] = $engine;

        return $self;
    }
}

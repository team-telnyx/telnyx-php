<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\Direction;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngine;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Noise Suppression Start (BETA).
 *
 * @see Telnyx\Services\Calls\ActionsService::startNoiseSuppression()
 *
 * @phpstan-import-type NoiseSuppressionEngineConfigShape from \Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig
 *
 * @phpstan-type ActionStartNoiseSuppressionParamsShape = array{
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   direction?: null|Direction|value-of<Direction>,
 *   noiseSuppressionEngine?: null|NoiseSuppressionEngine|value-of<NoiseSuppressionEngine>,
 *   noiseSuppressionEngineConfig?: NoiseSuppressionEngineConfigShape|null,
 * }
 */
final class ActionStartNoiseSuppressionParams implements BaseModel
{
    /** @use SdkModel<ActionStartNoiseSuppressionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * The direction of the audio stream to be noise suppressed.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * The engine to use for noise suppression.
     * For backward compatibility, engines A and B are also supported, but are deprecated:
     *  A - Denoiser
     *  B - DeepFilterNet.
     *
     * @var value-of<NoiseSuppressionEngine>|null $noiseSuppressionEngine
     */
    #[Optional('noise_suppression_engine', enum: NoiseSuppressionEngine::class)]
    public ?string $noiseSuppressionEngine;

    /**
     * Configuration parameters for noise suppression engines.
     */
    #[Optional('noise_suppression_engine_config')]
    public ?NoiseSuppressionEngineConfig $noiseSuppressionEngineConfig;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Direction|value-of<Direction> $direction
     * @param NoiseSuppressionEngine|value-of<NoiseSuppressionEngine> $noiseSuppressionEngine
     * @param NoiseSuppressionEngineConfigShape $noiseSuppressionEngineConfig
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        Direction|string|null $direction = null,
        NoiseSuppressionEngine|string|null $noiseSuppressionEngine = null,
        NoiseSuppressionEngineConfig|array|null $noiseSuppressionEngineConfig = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $direction && $self['direction'] = $direction;
        null !== $noiseSuppressionEngine && $self['noiseSuppressionEngine'] = $noiseSuppressionEngine;
        null !== $noiseSuppressionEngineConfig && $self['noiseSuppressionEngineConfig'] = $noiseSuppressionEngineConfig;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * The direction of the audio stream to be noise suppressed.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * The engine to use for noise suppression.
     * For backward compatibility, engines A and B are also supported, but are deprecated:
     *  A - Denoiser
     *  B - DeepFilterNet.
     *
     * @param NoiseSuppressionEngine|value-of<NoiseSuppressionEngine> $noiseSuppressionEngine
     */
    public function withNoiseSuppressionEngine(
        NoiseSuppressionEngine|string $noiseSuppressionEngine
    ): self {
        $self = clone $this;
        $self['noiseSuppressionEngine'] = $noiseSuppressionEngine;

        return $self;
    }

    /**
     * Configuration parameters for noise suppression engines.
     *
     * @param NoiseSuppressionEngineConfigShape $noiseSuppressionEngineConfig
     */
    public function withNoiseSuppressionEngineConfig(
        NoiseSuppressionEngineConfig|array $noiseSuppressionEngineConfig
    ): self {
        $self = clone $this;
        $self['noiseSuppressionEngineConfig'] = $noiseSuppressionEngineConfig;

        return $self;
    }
}

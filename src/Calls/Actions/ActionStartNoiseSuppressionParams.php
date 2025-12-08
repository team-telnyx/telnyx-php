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
 * @phpstan-type ActionStartNoiseSuppressionParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   direction?: Direction|value-of<Direction>,
 *   noise_suppression_engine?: NoiseSuppressionEngine|value-of<NoiseSuppressionEngine>,
 *   noise_suppression_engine_config?: NoiseSuppressionEngineConfig|array{
 *     attenuation_limit?: int|null
 *   },
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
    #[Optional]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional]
    public ?string $command_id;

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
     * @var value-of<NoiseSuppressionEngine>|null $noise_suppression_engine
     */
    #[Optional(enum: NoiseSuppressionEngine::class)]
    public ?string $noise_suppression_engine;

    /**
     * Configuration parameters for noise suppression engines.
     */
    #[Optional]
    public ?NoiseSuppressionEngineConfig $noise_suppression_engine_config;

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
     * @param NoiseSuppressionEngine|value-of<NoiseSuppressionEngine> $noise_suppression_engine
     * @param NoiseSuppressionEngineConfig|array{
     *   attenuation_limit?: int|null
     * } $noise_suppression_engine_config
     */
    public static function with(
        ?string $client_state = null,
        ?string $command_id = null,
        Direction|string|null $direction = null,
        NoiseSuppressionEngine|string|null $noise_suppression_engine = null,
        NoiseSuppressionEngineConfig|array|null $noise_suppression_engine_config = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $direction && $obj['direction'] = $direction;
        null !== $noise_suppression_engine && $obj['noise_suppression_engine'] = $noise_suppression_engine;
        null !== $noise_suppression_engine_config && $obj['noise_suppression_engine_config'] = $noise_suppression_engine_config;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * The direction of the audio stream to be noise suppressed.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
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
        $obj = clone $this;
        $obj['noise_suppression_engine'] = $noiseSuppressionEngine;

        return $obj;
    }

    /**
     * Configuration parameters for noise suppression engines.
     *
     * @param NoiseSuppressionEngineConfig|array{
     *   attenuation_limit?: int|null
     * } $noiseSuppressionEngineConfig
     */
    public function withNoiseSuppressionEngineConfig(
        NoiseSuppressionEngineConfig|array $noiseSuppressionEngineConfig
    ): self {
        $obj = clone $this;
        $obj['noise_suppression_engine_config'] = $noiseSuppressionEngineConfig;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\Direction;
use Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngine;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Noise Suppression Start (BETA).
 *
 * @see Telnyx\Calls\Actions->startNoiseSuppression
 *
 * @phpstan-type ActionStartNoiseSuppressionParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   direction?: Direction|value-of<Direction>,
 *   noise_suppression_engine?: NoiseSuppressionEngine|value-of<NoiseSuppressionEngine>,
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * The direction of the audio stream to be noise suppressed.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    /**
     * The engine to use for noise suppression.
     * A - rnnoise engine
     * B - deepfilter engine.
     *
     * @var value-of<NoiseSuppressionEngine>|null $noise_suppression_engine
     */
    #[Api(enum: NoiseSuppressionEngine::class, optional: true)]
    public ?string $noise_suppression_engine;

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
     */
    public static function with(
        ?string $client_state = null,
        ?string $command_id = null,
        Direction|string|null $direction = null,
        NoiseSuppressionEngine|string|null $noise_suppression_engine = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $direction && $obj['direction'] = $direction;
        null !== $noise_suppression_engine && $obj['noise_suppression_engine'] = $noise_suppression_engine;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

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
     * A - rnnoise engine
     * B - deepfilter engine.
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
}

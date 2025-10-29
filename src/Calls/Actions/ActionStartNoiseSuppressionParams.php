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
 *   clientState?: string,
 *   commandID?: string,
 *   direction?: Direction|value-of<Direction>,
 *   noiseSuppressionEngine?: NoiseSuppressionEngine|value-of<NoiseSuppressionEngine>,
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
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

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
     * @var value-of<NoiseSuppressionEngine>|null $noiseSuppressionEngine
     */
    #[Api(
        'noise_suppression_engine',
        enum: NoiseSuppressionEngine::class,
        optional: true,
    )]
    public ?string $noiseSuppressionEngine;

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
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        Direction|string|null $direction = null,
        NoiseSuppressionEngine|string|null $noiseSuppressionEngine = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $direction && $obj['direction'] = $direction;
        null !== $noiseSuppressionEngine && $obj['noiseSuppressionEngine'] = $noiseSuppressionEngine;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

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
        $obj['noiseSuppressionEngine'] = $noiseSuppressionEngine;

        return $obj;
    }
}

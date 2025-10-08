<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionStopPlaybackParams); // set properties as needed
 * $client->calls.actions->stopPlayback(...$params->toArray());
 * ```
 * Stop audio being played on the call.
 *
 * **Expected Webhooks:**
 *
 * - `call.playback.ended` or `call.speak.ended`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->stopPlayback(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->stopPlayback
 *
 * @phpstan-type action_stop_playback_params = array{
 *   clientState?: string, commandID?: string, overlay?: bool, stop?: string
 * }
 */
final class ActionStopPlaybackParams implements BaseModel
{
    /** @use SdkModel<action_stop_playback_params> */
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
     * When enabled, it stops the audio being played in the overlay queue.
     */
    #[Api(optional: true)]
    public ?bool $overlay;

    /**
     * Use `current` to stop the current audio being played. Use `all` to stop the current audio file being played and clear all audio files from the queue.
     */
    #[Api(optional: true)]
    public ?string $stop;

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
        ?string $clientState = null,
        ?string $commandID = null,
        ?bool $overlay = null,
        ?string $stop = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $overlay && $obj->overlay = $overlay;
        null !== $stop && $obj->stop = $stop;

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
     * When enabled, it stops the audio being played in the overlay queue.
     */
    public function withOverlay(bool $overlay): self
    {
        $obj = clone $this;
        $obj->overlay = $overlay;

        return $obj;
    }

    /**
     * Use `current` to stop the current audio being played. Use `all` to stop the current audio file being played and clear all audio files from the queue.
     */
    public function withStop(string $stop): self
    {
        $obj = clone $this;
        $obj->stop = $stop;

        return $obj;
    }
}

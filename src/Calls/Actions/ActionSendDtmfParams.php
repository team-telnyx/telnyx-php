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
 * $params = (new ActionSendDtmfParams); // set properties as needed
 * $client->calls.actions->sendDtmf(...$params->toArray());
 * ```
 * Sends DTMF tones from this leg. DTMF tones will be heard by the other end of the call.
 *
 * **Expected Webhooks:**
 *
 * There are no webhooks associated with this command.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->sendDtmf(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->sendDtmf
 *
 * @phpstan-type action_send_dtmf_params = array{
 *   digits: string, clientState?: string, commandID?: string, durationMillis?: int
 * }
 */
final class ActionSendDtmfParams implements BaseModel
{
    /** @use SdkModel<action_send_dtmf_params> */
    use SdkModel;
    use SdkParams;

    /**
     * DTMF digits to send. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     */
    #[Api]
    public string $digits;

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
     * Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms.
     */
    #[Api('duration_millis', optional: true)]
    public ?int $durationMillis;

    /**
     * `new ActionSendDtmfParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSendDtmfParams::with(digits: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSendDtmfParams)->withDigits(...)
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
        string $digits,
        ?string $clientState = null,
        ?string $commandID = null,
        ?int $durationMillis = null,
    ): self {
        $obj = new self;

        $obj->digits = $digits;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $durationMillis && $obj->durationMillis = $durationMillis;

        return $obj;
    }

    /**
     * DTMF digits to send. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     */
    public function withDigits(string $digits): self
    {
        $obj = clone $this;
        $obj->digits = $digits;

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
     * Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $obj = clone $this;
        $obj->durationMillis = $durationMillis;

        return $obj;
    }
}

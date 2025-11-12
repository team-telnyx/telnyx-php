<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sends DTMF tones from this leg. DTMF tones will be heard by the other end of the call.
 *
 * **Expected Webhooks:**
 *
 * There are no webhooks associated with this command.
 *
 * @see Telnyx\STAINLESS_FIXME_Calls\ActionsService::sendDtmf()
 *
 * @phpstan-type ActionSendDtmfParamsShape = array{
 *   digits: string,
 *   client_state?: string,
 *   command_id?: string,
 *   duration_millis?: int,
 * }
 */
final class ActionSendDtmfParams implements BaseModel
{
    /** @use SdkModel<ActionSendDtmfParamsShape> */
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms.
     */
    #[Api(optional: true)]
    public ?int $duration_millis;

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
        ?string $client_state = null,
        ?string $command_id = null,
        ?int $duration_millis = null,
    ): self {
        $obj = new self;

        $obj->digits = $digits;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $duration_millis && $obj->duration_millis = $duration_millis;

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
     * Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $obj = clone $this;
        $obj->duration_millis = $durationMillis;

        return $obj;
    }
}

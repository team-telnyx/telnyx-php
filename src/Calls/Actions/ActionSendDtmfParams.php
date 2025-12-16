<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 * @see Telnyx\Services\Calls\ActionsService::sendDtmf()
 *
 * @phpstan-type ActionSendDtmfParamsShape = array{
 *   digits: string,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   durationMillis?: int|null,
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
    #[Required]
    public string $digits;

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
     * Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms.
     */
    #[Optional('duration_millis')]
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
        $self = new self;

        $self['digits'] = $digits;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $durationMillis && $self['durationMillis'] = $durationMillis;

        return $self;
    }

    /**
     * DTMF digits to send. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     */
    public function withDigits(string $digits): self
    {
        $self = clone $this;
        $self['digits'] = $digits;

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
     * Specifies for how many milliseconds each digit will be played in the audio stream. Ranges from 100 to 500ms.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $self = clone $this;
        $self['durationMillis'] = $durationMillis;

        return $self;
    }
}

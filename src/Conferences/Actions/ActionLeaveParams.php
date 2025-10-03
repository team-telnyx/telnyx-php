<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionLeaveParams); // set properties as needed
 * $client->conferences.actions->leave(...$params->toArray());
 * ```
 * Removes a call leg from a conference and moves it back to parked state.
 *
 * **Expected Webhooks:**
 *
 * - `conference.participant.left`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conferences.actions->leave(...$params->toArray());`
 *
 * @see Telnyx\Conferences\Actions->leave
 *
 * @phpstan-type action_leave_params = array{
 *   callControlID: string,
 *   beepEnabled?: BeepEnabled|value-of<BeepEnabled>,
 *   commandID?: string,
 * }
 */
final class ActionLeaveParams implements BaseModel
{
    /** @use SdkModel<action_leave_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Api('call_control_id')]
    public string $callControlID;

    /**
     * Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Api('beep_enabled', enum: BeepEnabled::class, optional: true)]
    public ?string $beepEnabled;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * `new ActionLeaveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionLeaveParams::with(callControlID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionLeaveParams)->withCallControlID(...)
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
     *
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled
     */
    public static function with(
        string $callControlID,
        BeepEnabled|string|null $beepEnabled = null,
        ?string $commandID = null,
    ): self {
        $obj = new self;

        $obj->callControlID = $callControlID;

        null !== $beepEnabled && $obj['beepEnabled'] = $beepEnabled;
        null !== $commandID && $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     *
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled
     */
    public function withBeepEnabled(BeepEnabled|string $beepEnabled): self
    {
        $obj = clone $this;
        $obj['beepEnabled'] = $beepEnabled;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }
}

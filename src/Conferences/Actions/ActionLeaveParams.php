<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled;
use Telnyx\Conferences\Actions\ActionLeaveParams\Region;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Removes a call leg from a conference and moves it back to parked state.
 *
 * **Expected Webhooks:**
 *
 * - `conference.participant.left`
 *
 * @see Telnyx\Conferences\Actions->leave
 *
 * @phpstan-type ActionLeaveParamsShape = array{
 *   call_control_id: string,
 *   beep_enabled?: BeepEnabled|value-of<BeepEnabled>,
 *   command_id?: string,
 *   region?: Region|value-of<Region>,
 * }
 */
final class ActionLeaveParams implements BaseModel
{
    /** @use SdkModel<ActionLeaveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Api]
    public string $call_control_id;

    /**
     * Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beep_enabled
     */
    #[Api(enum: BeepEnabled::class, optional: true)]
    public ?string $beep_enabled;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Api(enum: Region::class, optional: true)]
    public ?string $region;

    /**
     * `new ActionLeaveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionLeaveParams::with(call_control_id: ...)
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
     * @param BeepEnabled|value-of<BeepEnabled> $beep_enabled
     * @param Region|value-of<Region> $region
     */
    public static function with(
        string $call_control_id,
        BeepEnabled|string|null $beep_enabled = null,
        ?string $command_id = null,
        Region|string|null $region = null,
    ): self {
        $obj = new self;

        $obj->call_control_id = $call_control_id;

        null !== $beep_enabled && $obj['beep_enabled'] = $beep_enabled;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

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
        $obj['beep_enabled'] = $beepEnabled;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }
}

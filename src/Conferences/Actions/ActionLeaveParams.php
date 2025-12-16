<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionLeaveParams\BeepEnabled;
use Telnyx\Conferences\Actions\ActionLeaveParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 * @see Telnyx\Services\Conferences\ActionsService::leave()
 *
 * @phpstan-type ActionLeaveParamsShape = array{
 *   callControlID: string,
 *   beepEnabled?: null|BeepEnabled|value-of<BeepEnabled>,
 *   commandID?: string|null,
 *   region?: null|Region|value-of<Region>,
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
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Optional('beep_enabled', enum: BeepEnabled::class)]
    public ?string $beepEnabled;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

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
     * @param Region|value-of<Region> $region
     */
    public static function with(
        string $callControlID,
        BeepEnabled|string|null $beepEnabled = null,
        ?string $commandID = null,
        Region|string|null $region = null,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;

        null !== $beepEnabled && $self['beepEnabled'] = $beepEnabled;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
     *
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled
     */
    public function withBeepEnabled(BeepEnabled|string $beepEnabled): self
    {
        $self = clone $this;
        $self['beepEnabled'] = $beepEnabled;

        return $self;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}

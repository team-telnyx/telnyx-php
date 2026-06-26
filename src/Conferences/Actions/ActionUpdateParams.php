<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionUpdateParams\Region;
use Telnyx\Conferences\Actions\ActionUpdateParams\SupervisorRole;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update conference participant supervisor_role.
 *
 * @see Telnyx\Services\Conferences\ActionsService::update()
 *
 * @phpstan-type ActionUpdateParamsShape = array{
 *   callControlID: string,
 *   supervisorRole: SupervisorRole|value-of<SupervisorRole>,
 *   commandID?: string|null,
 *   region?: null|Region|value-of<Region>,
 *   whisperCallControlIDs?: list<string>|null,
 * }
 */
final class ActionUpdateParams implements BaseModel
{
    /** @use SdkModel<ActionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @var value-of<SupervisorRole> $supervisorRole
     */
    #[Required('supervisor_role', enum: SupervisorRole::class)]
    public string $supervisorRole;

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
     * Array of unique call_control_ids the supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @var list<string>|null $whisperCallControlIDs
     */
    #[Optional('whisper_call_control_ids', list: 'string')]
    public ?array $whisperCallControlIDs;

    /**
     * `new ActionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionUpdateParams::with(callControlID: ..., supervisorRole: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionUpdateParams)->withCallControlID(...)->withSupervisorRole(...)
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
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     * @param Region|value-of<Region>|null $region
     * @param list<string>|null $whisperCallControlIDs
     */
    public static function with(
        string $callControlID,
        SupervisorRole|string $supervisorRole,
        ?string $commandID = null,
        Region|string|null $region = null,
        ?array $whisperCallControlIDs = null,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;
        $self['supervisorRole'] = $supervisorRole;

        null !== $commandID && $self['commandID'] = $commandID;
        null !== $region && $self['region'] = $region;
        null !== $whisperCallControlIDs && $self['whisperCallControlIDs'] = $whisperCallControlIDs;

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
     * Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     */
    public function withSupervisorRole(
        SupervisorRole|string $supervisorRole
    ): self {
        $self = clone $this;
        $self['supervisorRole'] = $supervisorRole;

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

    /**
     * Array of unique call_control_ids the supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @param list<string> $whisperCallControlIDs
     */
    public function withWhisperCallControlIDs(
        array $whisperCallControlIDs
    ): self {
        $self = clone $this;
        $self['whisperCallControlIDs'] = $whisperCallControlIDs;

        return $self;
    }
}

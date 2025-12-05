<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionUpdateParams\Region;
use Telnyx\Conferences\Actions\ActionUpdateParams\SupervisorRole;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update conference participant supervisor_role.
 *
 * @see Telnyx\Services\Conferences\ActionsService::update()
 *
 * @phpstan-type ActionUpdateParamsShape = array{
 *   call_control_id: string,
 *   supervisor_role: SupervisorRole|value-of<SupervisorRole>,
 *   command_id?: string,
 *   region?: Region|value-of<Region>,
 *   whisper_call_control_ids?: list<string>,
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
    #[Api]
    public string $call_control_id;

    /**
     * Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @var value-of<SupervisorRole> $supervisor_role
     */
    #[Api(enum: SupervisorRole::class)]
    public string $supervisor_role;

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
     * Array of unique call_control_ids the supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @var list<string>|null $whisper_call_control_ids
     */
    #[Api(list: 'string', optional: true)]
    public ?array $whisper_call_control_ids;

    /**
     * `new ActionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionUpdateParams::with(call_control_id: ..., supervisor_role: ...)
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
     * @param SupervisorRole|value-of<SupervisorRole> $supervisor_role
     * @param Region|value-of<Region> $region
     * @param list<string> $whisper_call_control_ids
     */
    public static function with(
        string $call_control_id,
        SupervisorRole|string $supervisor_role,
        ?string $command_id = null,
        Region|string|null $region = null,
        ?array $whisper_call_control_ids = null,
    ): self {
        $obj = new self;

        $obj['call_control_id'] = $call_control_id;
        $obj['supervisor_role'] = $supervisor_role;

        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $region && $obj['region'] = $region;
        null !== $whisper_call_control_ids && $obj['whisper_call_control_ids'] = $whisper_call_control_ids;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     */
    public function withSupervisorRole(
        SupervisorRole|string $supervisorRole
    ): self {
        $obj = clone $this;
        $obj['supervisor_role'] = $supervisorRole;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

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

    /**
     * Array of unique call_control_ids the supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @param list<string> $whisperCallControlIDs
     */
    public function withWhisperCallControlIDs(
        array $whisperCallControlIDs
    ): self {
        $obj = clone $this;
        $obj['whisper_call_control_ids'] = $whisperCallControlIDs;

        return $obj;
    }
}

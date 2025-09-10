<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionSwitchSupervisorRoleParams\Role;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionSwitchSupervisorRoleParams); // set properties as needed
 * $client->calls.actions->switchSupervisorRole(...$params->toArray());
 * ```
 * Switch the supervisor role for a bridged call. This allows switching between different supervisor modes during an active call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->switchSupervisorRole(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->switchSupervisorRole
 *
 * @phpstan-type action_switch_supervisor_role_params = array{
 *   role: Role|value-of<Role>
 * }
 */
final class ActionSwitchSupervisorRoleParams implements BaseModel
{
    /** @use SdkModel<action_switch_supervisor_role_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The supervisor role to switch to. 'barge' allows speaking to both parties, 'whisper' allows speaking to caller only, 'monitor' allows listening only.
     *
     * @var value-of<Role> $role
     */
    #[Api(enum: Role::class)]
    public string $role;

    /**
     * `new ActionSwitchSupervisorRoleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSwitchSupervisorRoleParams::with(role: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSwitchSupervisorRoleParams)->withRole(...)
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
     * @param Role|value-of<Role> $role
     */
    public static function with(Role|string $role): self
    {
        $obj = new self;

        $obj->role = $role instanceof Role ? $role->value : $role;

        return $obj;
    }

    /**
     * The supervisor role to switch to. 'barge' allows speaking to both parties, 'whisper' allows speaking to caller only, 'monitor' allows listening only.
     *
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $obj = clone $this;
        $obj->role = $role instanceof Role ? $role->value : $role;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionRejectParams\Cause;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionRejectParams); // set properties as needed
 * $client->calls.actions->reject(...$params->toArray());
 * ```
 * Reject an incoming call.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/reject-call#callbacks) below):**
 *
 * - `call.hangup`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->reject(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->reject
 *
 * @phpstan-type action_reject_params = array{
 *   cause: Cause|value-of<Cause>, clientState?: string, commandID?: string
 * }
 */
final class ActionRejectParams implements BaseModel
{
    /** @use SdkModel<action_reject_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Cause for call rejection.
     *
     * @var value-of<Cause> $cause
     */
    #[Api(enum: Cause::class)]
    public string $cause;

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
     * `new ActionRejectParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionRejectParams::with(cause: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionRejectParams)->withCause(...)
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
     * @param Cause|value-of<Cause> $cause
     */
    public static function with(
        Cause|string $cause,
        ?string $clientState = null,
        ?string $commandID = null
    ): self {
        $obj = new self;

        $obj->cause = $cause instanceof Cause ? $cause->value : $cause;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Cause for call rejection.
     *
     * @param Cause|value-of<Cause> $cause
     */
    public function withCause(Cause|string $cause): self
    {
        $obj = clone $this;
        $obj->cause = $cause instanceof Cause ? $cause->value : $cause;

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
}

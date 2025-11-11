<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionRejectParams\Cause;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Reject an incoming call.
 *
 * **Expected Webhooks:**
 *
 * - `call.hangup`
 *
 * @see Telnyx\Calls\Actions->reject
 *
 * @phpstan-type ActionRejectParamsShape = array{
 *   cause: Cause|value-of<Cause>, client_state?: string, command_id?: string
 * }
 */
final class ActionRejectParams implements BaseModel
{
    /** @use SdkModel<ActionRejectParamsShape> */
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

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
        ?string $client_state = null,
        ?string $command_id = null
    ): self {
        $obj = new self;

        $obj['cause'] = $cause;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;

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
        $obj['cause'] = $cause;

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
}

<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionRejectParams\Cause;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 * @see Telnyx\Services\Calls\ActionsService::reject()
 *
 * @phpstan-type ActionRejectParamsShape = array{
 *   cause: Cause|value-of<Cause>, clientState?: string, commandID?: string
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
    #[Required(enum: Cause::class)]
    public string $cause;

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

        $obj['cause'] = $cause;

        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $commandID && $obj['commandID'] = $commandID;

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
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['commandID'] = $commandID;

        return $obj;
    }
}

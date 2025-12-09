<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Stop SIPREC session.
 *
 * **Expected Webhooks:**
 *
 * - `siprec.stopped`
 *
 * @see Telnyx\Services\Calls\ActionsService::stopSiprec()
 *
 * @phpstan-type ActionStopSiprecParamsShape = array{
 *   clientState?: string, commandID?: string
 * }
 */
final class ActionStopSiprecParams implements BaseModel
{
    /** @use SdkModel<ActionStopSiprecParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?string $clientState = null,
        ?string $commandID = null
    ): self {
        $obj = new self;

        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $commandID && $obj['commandID'] = $commandID;

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

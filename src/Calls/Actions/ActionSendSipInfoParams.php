<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sends SIP info from this leg.
 *
 * **Expected Webhooks:**
 *
 * - `call.sip_info.received` (to be received on the target call leg)
 *
 * @see Telnyx\Services\Calls\ActionsService::sendSipInfo()
 *
 * @phpstan-type ActionSendSipInfoParamsShape = array{
 *   body: string,
 *   contentType: string,
 *   clientState?: string|null,
 *   commandID?: string|null,
 * }
 */
final class ActionSendSipInfoParams implements BaseModel
{
    /** @use SdkModel<ActionSendSipInfoParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Content of the SIP INFO.
     */
    #[Required]
    public string $body;

    /**
     * Content type of the INFO body. Must be MIME type compliant. There is a 1,400 bytes limit.
     */
    #[Required('content_type')]
    public string $contentType;

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
     * `new ActionSendSipInfoParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSendSipInfoParams::with(body: ..., contentType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSendSipInfoParams)->withBody(...)->withContentType(...)
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
     */
    public static function with(
        string $body,
        string $contentType,
        ?string $clientState = null,
        ?string $commandID = null,
    ): self {
        $self = new self;

        $self['body'] = $body;
        $self['contentType'] = $contentType;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Content of the SIP INFO.
     */
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * Content type of the INFO body. Must be MIME type compliant. There is a 1,400 bytes limit.
     */
    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }
}

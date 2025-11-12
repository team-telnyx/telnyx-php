<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
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
 *   body: string, content_type: string, client_state?: string, command_id?: string
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
    #[Api]
    public string $body;

    /**
     * Content type of the INFO body. Must be MIME type compliant. There is a 1,400 bytes limit.
     */
    #[Api]
    public string $content_type;

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
     * `new ActionSendSipInfoParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSendSipInfoParams::with(body: ..., content_type: ...)
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
        string $content_type,
        ?string $client_state = null,
        ?string $command_id = null,
    ): self {
        $obj = new self;

        $obj->body = $body;
        $obj->content_type = $content_type;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;

        return $obj;
    }

    /**
     * Content of the SIP INFO.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    /**
     * Content type of the INFO body. Must be MIME type compliant. There is a 1,400 bytes limit.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->content_type = $contentType;

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

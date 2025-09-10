<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionSendSipInfoParams); // set properties as needed
 * $client->calls.actions->sendSipInfo(...$params->toArray());
 * ```
 * Sends SIP info from this leg.
 *
 * **Expected Webhooks:**
 *
 * - `call.sip_info.received` (to be received on the target call leg)
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->sendSipInfo(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->sendSipInfo
 *
 * @phpstan-type action_send_sip_info_params = array{
 *   body: string, contentType: string, clientState?: string, commandID?: string
 * }
 */
final class ActionSendSipInfoParams implements BaseModel
{
    /** @use SdkModel<action_send_sip_info_params> */
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
    #[Api('content_type')]
    public string $contentType;

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
        $obj = new self;

        $obj->body = $body;
        $obj->contentType = $contentType;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;

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
        $obj->contentType = $contentType;

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

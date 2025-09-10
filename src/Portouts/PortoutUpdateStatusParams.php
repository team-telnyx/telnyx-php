<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PortoutUpdateStatusParams); // set properties as needed
 * $client->portouts->updateStatus(...$params->toArray());
 * ```
 * Authorize or reject portout request.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portouts->updateStatus(...$params->toArray());`
 *
 * @see Telnyx\Portouts->updateStatus
 *
 * @phpstan-type portout_update_status_params = array{
 *   id: string, reason: string, hostMessaging?: bool
 * }
 */
final class PortoutUpdateStatusParams implements BaseModel
{
    /** @use SdkModel<portout_update_status_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * Provide a reason if rejecting the port out request.
     */
    #[Api]
    public string $reason;

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    #[Api('host_messaging', optional: true)]
    public ?bool $hostMessaging;

    /**
     * `new PortoutUpdateStatusParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortoutUpdateStatusParams::with(id: ..., reason: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortoutUpdateStatusParams)->withID(...)->withReason(...)
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
        string $id,
        string $reason,
        ?bool $hostMessaging = null
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->reason = $reason;

        null !== $hostMessaging && $obj->hostMessaging = $hostMessaging;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Provide a reason if rejecting the port out request.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    public function withHostMessaging(bool $hostMessaging): self
    {
        $obj = clone $this;
        $obj->hostMessaging = $hostMessaging;

        return $obj;
    }
}

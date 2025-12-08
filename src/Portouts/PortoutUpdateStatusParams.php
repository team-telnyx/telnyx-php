<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Authorize or reject portout request.
 *
 * @see Telnyx\Services\PortoutsService::updateStatus()
 *
 * @phpstan-type PortoutUpdateStatusParamsShape = array{
 *   id: string, reason: string, host_messaging?: bool
 * }
 */
final class PortoutUpdateStatusParams implements BaseModel
{
    /** @use SdkModel<PortoutUpdateStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * Provide a reason if rejecting the port out request.
     */
    #[Required]
    public string $reason;

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    #[Optional]
    public ?bool $host_messaging;

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
        ?bool $host_messaging = null
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['reason'] = $reason;

        null !== $host_messaging && $obj['host_messaging'] = $host_messaging;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Provide a reason if rejecting the port out request.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    public function withHostMessaging(bool $hostMessaging): self
    {
        $obj = clone $this;
        $obj['host_messaging'] = $hostMessaging;

        return $obj;
    }
}

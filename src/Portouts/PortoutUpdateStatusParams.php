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
 *   id: string, reason: string, hostMessaging?: bool|null
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
    #[Optional('host_messaging')]
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
        $self = new self;

        $self['id'] = $id;
        $self['reason'] = $reason;

        null !== $hostMessaging && $self['hostMessaging'] = $hostMessaging;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Provide a reason if rejecting the port out request.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    public function withHostMessaging(bool $hostMessaging): self
    {
        $self = clone $this;
        $self['hostMessaging'] = $hostMessaging;

        return $self;
    }
}

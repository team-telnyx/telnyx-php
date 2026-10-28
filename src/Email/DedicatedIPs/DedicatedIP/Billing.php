<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Billing\Status;

/**
 * Monthly recurring charge (MRC) state for the IP's current allocation.
 *
 * @phpstan-type BillingShape = array{
 *   charged?: bool|null,
 *   status?: null|\Telnyx\Email\DedicatedIPs\DedicatedIP\Billing\Status|value-of<\Telnyx\Email\DedicatedIPs\DedicatedIP\Billing\Status>,
 * }
 */
final class Billing implements BaseModel
{
    /** @use SdkModel<BillingShape> */
    use SdkModel;

    /**
     * True when `status` is `active`, `stopping`, or `stop_failed`. An IP carries mail only after its charge has been created.
     */
    #[Optional]
    public ?bool $charged;

    /**
     * `not_started`: no charge recorded for the current allocation. `pending`: the charge is queued. `in_progress`: the charge is being created. `active`: the MRC is active. `stopping`: release requested; the MRC stop is being processed. `stopped`: the MRC has stopped. `stop_failed`: the MRC stop failed and the charge remains. `failed`: the charge could not be created.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(
        enum: Status::class
    )]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?bool $charged = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $charged && $self['charged'] = $charged;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * True when `status` is `active`, `stopping`, or `stop_failed`. An IP carries mail only after its charge has been created.
     */
    public function withCharged(bool $charged): self
    {
        $self = clone $this;
        $self['charged'] = $charged;

        return $self;
    }

    /**
     * `not_started`: no charge recorded for the current allocation. `pending`: the charge is queued. `in_progress`: the charge is being created. `active`: the MRC is active. `stopping`: release requested; the MRC stop is being processed. `stopped`: the MRC has stopped. `stop_failed`: the MRC stop failed and the charge remains. `failed`: the charge could not be created.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status
    ): self {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}

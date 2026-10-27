<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Informational progress flags for the Telnyx-managed PTR. They do not gate `start_warmup`; use `dns_status` to check whether the IP can carry mail.
 *
 * @phpstan-type ChecklistShape = array{
 *   forwardConfirmed?: bool|null,
 *   ptrAuthored?: bool|null,
 *   ptrMerged?: bool|null,
 *   ptrRequested?: bool|null,
 * }
 */
final class Checklist implements BaseModel
{
    /** @use SdkModel<ChecklistShape> */
    use SdkModel;

    #[Optional('forward_confirmed')]
    public ?bool $forwardConfirmed;

    #[Optional('ptr_authored')]
    public ?bool $ptrAuthored;

    #[Optional('ptr_merged')]
    public ?bool $ptrMerged;

    #[Optional('ptr_requested')]
    public ?bool $ptrRequested;

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
        ?bool $forwardConfirmed = null,
        ?bool $ptrAuthored = null,
        ?bool $ptrMerged = null,
        ?bool $ptrRequested = null,
    ): self {
        $self = new self;

        null !== $forwardConfirmed && $self['forwardConfirmed'] = $forwardConfirmed;
        null !== $ptrAuthored && $self['ptrAuthored'] = $ptrAuthored;
        null !== $ptrMerged && $self['ptrMerged'] = $ptrMerged;
        null !== $ptrRequested && $self['ptrRequested'] = $ptrRequested;

        return $self;
    }

    public function withForwardConfirmed(bool $forwardConfirmed): self
    {
        $self = clone $this;
        $self['forwardConfirmed'] = $forwardConfirmed;

        return $self;
    }

    public function withPtrAuthored(bool $ptrAuthored): self
    {
        $self = clone $this;
        $self['ptrAuthored'] = $ptrAuthored;

        return $self;
    }

    public function withPtrMerged(bool $ptrMerged): self
    {
        $self = clone $this;
        $self['ptrMerged'] = $ptrMerged;

        return $self;
    }

    public function withPtrRequested(bool $ptrRequested): self
    {
        $self = clone $this;
        $self['ptrRequested'] = $ptrRequested;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning\Checklist;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning\DNSStatus;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning\PtrRequestState;

/**
 * Read-only status of the Telnyx-managed PTR record. No customer action is required to complete it.
 *
 * @phpstan-import-type ChecklistShape from \Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning\Checklist
 *
 * @phpstan-type ProvisioningShape = array{
 *   checklist?: null|Checklist|ChecklistShape,
 *   dnsStatus?: null|DNSStatus|value-of<DNSStatus>,
 *   ptrRequestPrURL?: string|null,
 *   ptrRequestState?: null|PtrRequestState|value-of<PtrRequestState>,
 * }
 */
final class Provisioning implements BaseModel
{
    /** @use SdkModel<ProvisioningShape> */
    use SdkModel;

    /**
     * Informational progress flags for the Telnyx-managed PTR. They do not gate `start_warmup`; use `dns_status` to check whether the IP can carry mail.
     */
    #[Optional]
    public ?Checklist $checklist;

    /**
     * `dns_confirmed`: the PTR is forward-confirmed and `dns_confirmed_at` is set. `pending_ptr`: the PTR record is not yet in place. `pending_dns`: the PTR record is waiting for forward confirmation. `dns_lost`: a previously confirmed PTR no longer confirms, or the PTR request was abandoned before it ever confirmed (`ptr_request_state` is `abandoned`); the IP carries no mail until DNS is confirmed. `not_applicable`: the IP is released or has no PTR record on file.
     *
     * @var value-of<DNSStatus>|null $dnsStatus
     */
    #[Optional('dns_status', enum: DNSStatus::class)]
    public ?string $dnsStatus;

    /**
     * Reference to the Telnyx PTR change request, when one exists. Informational.
     */
    #[Optional('ptr_request_pr_url', nullable: true)]
    public ?string $ptrRequestPrURL;

    /**
     * State of the Telnyx PTR change: `pending`, `pr_open`, `merged`, `confirmed`, `failed`, or `abandoned`. Informational.
     *
     * @var value-of<PtrRequestState>|null $ptrRequestState
     */
    #[Optional('ptr_request_state', enum: PtrRequestState::class, nullable: true)]
    public ?string $ptrRequestState;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|PtrRequestState|value-of<PtrRequestState>|null $ptrRequestState
     * @param Checklist|ChecklistShape|null $checklist
     * @param DNSStatus|value-of<DNSStatus>|null $dnsStatus
     */
    public static function with(
        string|Omitted|null $ptrRequestPrURL = Omitted::VALUE,
        Omitted|PtrRequestState|string|null $ptrRequestState = Omitted::VALUE,
        Checklist|array|null $checklist = null,
        DNSStatus|string|null $dnsStatus = null,
    ): self {
        $self = new self;

        null !== $checklist && $self['checklist'] = $checklist;
        null !== $dnsStatus && $self['dnsStatus'] = $dnsStatus;
        Omitted::VALUE !== $ptrRequestPrURL && $self['ptrRequestPrURL'] = $ptrRequestPrURL;
        Omitted::VALUE !== $ptrRequestState && $self['ptrRequestState'] = $ptrRequestState;

        return $self;
    }

    /**
     * Informational progress flags for the Telnyx-managed PTR. They do not gate `start_warmup`; use `dns_status` to check whether the IP can carry mail.
     *
     * @param Checklist|ChecklistShape $checklist
     */
    public function withChecklist(Checklist|array $checklist): self
    {
        $self = clone $this;
        $self['checklist'] = $checklist;

        return $self;
    }

    /**
     * `dns_confirmed`: the PTR is forward-confirmed and `dns_confirmed_at` is set. `pending_ptr`: the PTR record is not yet in place. `pending_dns`: the PTR record is waiting for forward confirmation. `dns_lost`: a previously confirmed PTR no longer confirms, or the PTR request was abandoned before it ever confirmed (`ptr_request_state` is `abandoned`); the IP carries no mail until DNS is confirmed. `not_applicable`: the IP is released or has no PTR record on file.
     *
     * @param DNSStatus|value-of<DNSStatus> $dnsStatus
     */
    public function withDNSStatus(DNSStatus|string $dnsStatus): self
    {
        $self = clone $this;
        $self['dnsStatus'] = $dnsStatus;

        return $self;
    }

    /**
     * Reference to the Telnyx PTR change request, when one exists. Informational.
     */
    public function withPtrRequestPrURL(?string $ptrRequestPrURL): self
    {
        $self = clone $this;
        $self['ptrRequestPrURL'] = $ptrRequestPrURL;

        return $self;
    }

    /**
     * State of the Telnyx PTR change: `pending`, `pr_open`, `merged`, `confirmed`, `failed`, or `abandoned`. Informational.
     *
     * @param PtrRequestState|value-of<PtrRequestState>|null $ptrRequestState
     */
    public function withPtrRequestState(
        PtrRequestState|string|null $ptrRequestState
    ): self {
        $self = clone $this;
        $self['ptrRequestState'] = $ptrRequestState;

        return $self;
    }
}

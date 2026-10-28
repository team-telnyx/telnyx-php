<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools\IPPool;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Billing;
use Telnyx\Email\DedicatedIPs\DedicatedIP\IPVersion;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning;
use Telnyx\Email\DedicatedIPs\DedicatedIP\ProvisioningStatus;
use Telnyx\Email\DedicatedIPs\DedicatedIP\RecordType;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Status;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Warmup;

/**
 * A dedicated IP as a member of a pool, with its routing weight in this pool. Weight is a positive integer (default 100).
 *
 * @phpstan-import-type BillingShape from \Telnyx\Email\DedicatedIPs\DedicatedIP\Billing
 * @phpstan-import-type ProvisioningShape from \Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning
 * @phpstan-import-type WarmupShape from \Telnyx\Email\DedicatedIPs\DedicatedIP\Warmup
 *
 * @phpstan-type IPShape = array{
 *   id?: string|null,
 *   billing?: null|Billing|BillingShape,
 *   createdAt?: \DateTimeInterface|null,
 *   dnsConfirmedAt?: \DateTimeInterface|null,
 *   ipAddress?: string|null,
 *   ipVersion?: null|IPVersion|value-of<IPVersion>,
 *   poolID?: string|null,
 *   provisioning?: null|Provisioning|ProvisioningShape,
 *   provisioningStatus?: null|ProvisioningStatus|value-of<ProvisioningStatus>,
 *   ptrHostname?: string|null,
 *   quarantineUntil?: \DateTimeInterface|null,
 *   recordType?: null|\Telnyx\Email\DedicatedIPs\DedicatedIP\RecordType|value-of<\Telnyx\Email\DedicatedIPs\DedicatedIP\RecordType>,
 *   region?: string|null,
 *   releasedAt?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 *   suspensionReason?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   warmup?: null|Warmup|WarmupShape,
 *   weight?: int|null,
 * }
 */
final class IP implements BaseModel
{
    /** @use SdkModel<IPShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Monthly recurring charge (MRC) state for the IP's current allocation.
     */
    #[Optional]
    public ?Billing $billing;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * When the PTR hostname was forward-confirmed (PTR → hostname → A record → this IP). The IP carries mail only while this is set.
     */
    #[Optional('dns_confirmed_at', nullable: true)]
    public ?\DateTimeInterface $dnsConfirmedAt;

    /**
     * The allocated IPv4/IPv6 address.
     */
    #[Optional('ip_address')]
    public ?string $ipAddress;

    /** @var value-of<IPVersion>|null $ipVersion */
    #[Optional('ip_version', enum: IPVersion::class)]
    public ?string $ipVersion;

    #[Optional('pool_id', nullable: true)]
    public ?string $poolID;

    /**
     * Read-only status of the Telnyx-managed PTR record. No customer action is required to complete it.
     */
    #[Optional]
    public ?Provisioning $provisioning;

    /**
     * Same value as `provisioning.dns_status`.
     *
     * @var value-of<ProvisioningStatus>|null $provisioningStatus
     */
    #[Optional('provisioning_status', enum: ProvisioningStatus::class)]
    public ?string $provisioningStatus;

    /**
     * Telnyx-managed reverse DNS (PTR) hostname of the IP, in the form `mta-<a-b-c-d>.msgtelnyx.com`. Also used as the EHLO hostname when sending from the IP. Managed by Telnyx and cannot be changed through the API.
     */
    #[Optional('ptr_hostname', nullable: true)]
    public ?string $ptrHostname;

    /**
     * Set on release to 30 days after `released_at`. The address is not returned to stock before this time.
     */
    #[Optional('quarantine_until', nullable: true)]
    public ?\DateTimeInterface $quarantineUntil;

    /**
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional(
        'record_type',
        enum: RecordType::class,
    )]
    public ?string $recordType;

    /**
     * Region label of the allocated IP (for example, `ewr-nj1`).
     */
    #[Optional]
    public ?string $region;

    /**
     * When the IP was released. Null until release.
     */
    #[Optional('released_at', nullable: true)]
    public ?\DateTimeInterface $releasedAt;

    /**
     * Lifecycle status. `provisioning`: purchased and billed, carries no mail until `start_warmup`. `warming_up`: warm-up ramp in progress. `active`: ramp complete. `suspended`: suspended by Telnyx; carries no mail and is still billed. `released`: returned to Telnyx; carries no mail.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Reason Telnyx recorded when suspending the IP. Null unless `status` is `suspended`.
     */
    #[Optional('suspension_reason', nullable: true)]
    public ?string $suspensionReason;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Warmup ramp state for a dedicated IP.
     */
    #[Optional]
    public ?Warmup $warmup;

    /**
     * Relative routing weight of this IP within the pool.
     */
    #[Optional]
    public ?int $weight;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Billing|BillingShape|null $billing
     * @param IPVersion|value-of<IPVersion>|null $ipVersion
     * @param Provisioning|ProvisioningShape|null $provisioning
     * @param ProvisioningStatus|value-of<ProvisioningStatus>|null $provisioningStatus
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param Status|value-of<Status>|null $status
     * @param Warmup|WarmupShape|null $warmup
     */
    public static function with(
        \DateTimeInterface|Omitted|null $dnsConfirmedAt = Omitted::VALUE,
        string|Omitted|null $poolID = Omitted::VALUE,
        string|Omitted|null $ptrHostname = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $quarantineUntil = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $releasedAt = Omitted::VALUE,
        string|Omitted|null $suspensionReason = Omitted::VALUE,
        ?string $id = null,
        Billing|array|null $billing = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $ipAddress = null,
        IPVersion|string|null $ipVersion = null,
        Provisioning|array|null $provisioning = null,
        ProvisioningStatus|string|null $provisioningStatus = null,
        RecordType|string|null $recordType = null,
        ?string $region = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        Warmup|array|null $warmup = null,
        ?int $weight = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billing && $self['billing'] = $billing;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        Omitted::VALUE !== $dnsConfirmedAt && $self['dnsConfirmedAt'] = $dnsConfirmedAt;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $ipVersion && $self['ipVersion'] = $ipVersion;
        Omitted::VALUE !== $poolID && $self['poolID'] = $poolID;
        null !== $provisioning && $self['provisioning'] = $provisioning;
        null !== $provisioningStatus && $self['provisioningStatus'] = $provisioningStatus;
        Omitted::VALUE !== $ptrHostname && $self['ptrHostname'] = $ptrHostname;
        Omitted::VALUE !== $quarantineUntil && $self['quarantineUntil'] = $quarantineUntil;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $region && $self['region'] = $region;
        Omitted::VALUE !== $releasedAt && $self['releasedAt'] = $releasedAt;
        null !== $status && $self['status'] = $status;
        Omitted::VALUE !== $suspensionReason && $self['suspensionReason'] = $suspensionReason;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $warmup && $self['warmup'] = $warmup;
        null !== $weight && $self['weight'] = $weight;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Monthly recurring charge (MRC) state for the IP's current allocation.
     *
     * @param Billing|BillingShape $billing
     */
    public function withBilling(Billing|array $billing): self
    {
        $self = clone $this;
        $self['billing'] = $billing;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * When the PTR hostname was forward-confirmed (PTR → hostname → A record → this IP). The IP carries mail only while this is set.
     */
    public function withDNSConfirmedAt(
        ?\DateTimeInterface $dnsConfirmedAt
    ): self {
        $self = clone $this;
        $self['dnsConfirmedAt'] = $dnsConfirmedAt;

        return $self;
    }

    /**
     * The allocated IPv4/IPv6 address.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    /**
     * @param IPVersion|value-of<IPVersion> $ipVersion
     */
    public function withIPVersion(IPVersion|string $ipVersion): self
    {
        $self = clone $this;
        $self['ipVersion'] = $ipVersion;

        return $self;
    }

    public function withPoolID(?string $poolID): self
    {
        $self = clone $this;
        $self['poolID'] = $poolID;

        return $self;
    }

    /**
     * Read-only status of the Telnyx-managed PTR record. No customer action is required to complete it.
     *
     * @param Provisioning|ProvisioningShape $provisioning
     */
    public function withProvisioning(Provisioning|array $provisioning): self
    {
        $self = clone $this;
        $self['provisioning'] = $provisioning;

        return $self;
    }

    /**
     * Same value as `provisioning.dns_status`.
     *
     * @param ProvisioningStatus|value-of<ProvisioningStatus> $provisioningStatus
     */
    public function withProvisioningStatus(
        ProvisioningStatus|string $provisioningStatus
    ): self {
        $self = clone $this;
        $self['provisioningStatus'] = $provisioningStatus;

        return $self;
    }

    /**
     * Telnyx-managed reverse DNS (PTR) hostname of the IP, in the form `mta-<a-b-c-d>.msgtelnyx.com`. Also used as the EHLO hostname when sending from the IP. Managed by Telnyx and cannot be changed through the API.
     */
    public function withPtrHostname(?string $ptrHostname): self
    {
        $self = clone $this;
        $self['ptrHostname'] = $ptrHostname;

        return $self;
    }

    /**
     * Set on release to 30 days after `released_at`. The address is not returned to stock before this time.
     */
    public function withQuarantineUntil(
        ?\DateTimeInterface $quarantineUntil
    ): self {
        $self = clone $this;
        $self['quarantineUntil'] = $quarantineUntil;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(
        RecordType|string $recordType
    ): self {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Region label of the allocated IP (for example, `ewr-nj1`).
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * When the IP was released. Null until release.
     */
    public function withReleasedAt(?\DateTimeInterface $releasedAt): self
    {
        $self = clone $this;
        $self['releasedAt'] = $releasedAt;

        return $self;
    }

    /**
     * Lifecycle status. `provisioning`: purchased and billed, carries no mail until `start_warmup`. `warming_up`: warm-up ramp in progress. `active`: ramp complete. `suspended`: suspended by Telnyx; carries no mail and is still billed. `released`: returned to Telnyx; carries no mail.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Reason Telnyx recorded when suspending the IP. Null unless `status` is `suspended`.
     */
    public function withSuspensionReason(?string $suspensionReason): self
    {
        $self = clone $this;
        $self['suspensionReason'] = $suspensionReason;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Warmup ramp state for a dedicated IP.
     *
     * @param Warmup|WarmupShape $warmup
     */
    public function withWarmup(Warmup|array $warmup): self
    {
        $self = clone $this;
        $self['warmup'] = $warmup;

        return $self;
    }

    /**
     * Relative routing weight of this IP within the pool.
     */
    public function withWeight(int $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }
}

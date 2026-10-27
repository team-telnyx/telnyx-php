<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Email\IPPools\IPPool\IP;
use Telnyx\Email\IPPools\IPPool\RecordType;

/**
 * An account-scoped pool of dedicated IPs. Mail uses a pool only when the pool is scoped to the sending domain (`domain_id`) or is the account default (`is_default`).
 *
 * @phpstan-import-type IPShape from \Telnyx\Email\IPPools\IPPool\IP
 *
 * @phpstan-type IPPoolShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   domainID?: string|null,
 *   ips?: list<IP|IPShape>|null,
 *   isDefault?: bool|null,
 *   name?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class IPPool implements BaseModel
{
    /** @use SdkModel<IPPoolShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Email domain this pool is scoped to. The pool carries that domain's mail. Null when the pool is not domain-scoped.
     */
    #[Optional('domain_id', nullable: true)]
    public ?string $domainID;

    /**
     * Member IPs with their routing weights. Populated by Retrieve an IP pool; list, create, and update responses return an empty array.
     *
     * @var list<IP>|null $ips
     */
    #[Optional(list: IP::class)]
    public ?array $ips;

    /**
     * Whether this is the account's default pool. The default pool carries mail for sending domains that have no domain-scoped pool. At most one per account.
     */
    #[Optional('is_default')]
    public ?bool $isDefault;

    /**
     * Pool name, unique within the account.
     */
    #[Optional]
    public ?string $name;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<IP|IPShape>|null $ips
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        string|Omitted|null $domainID = Omitted::VALUE,
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $ips = null,
        ?bool $isDefault = null,
        ?string $name = null,
        RecordType|string|null $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        Omitted::VALUE !== $domainID && $self['domainID'] = $domainID;
        null !== $ips && $self['ips'] = $ips;
        null !== $isDefault && $self['isDefault'] = $isDefault;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Email domain this pool is scoped to. The pool carries that domain's mail. Null when the pool is not domain-scoped.
     */
    public function withDomainID(?string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    /**
     * Member IPs with their routing weights. Populated by Retrieve an IP pool; list, create, and update responses return an empty array.
     *
     * @param list<IP|IPShape> $ips
     */
    public function withIPs(array $ips): self
    {
        $self = clone $this;
        $self['ips'] = $ips;

        return $self;
    }

    /**
     * Whether this is the account's default pool. The default pool carries mail for sending domains that have no domain-scoped pool. At most one per account.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $self = clone $this;
        $self['isDefault'] = $isDefault;

        return $self;
    }

    /**
     * Pool name, unique within the account.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}

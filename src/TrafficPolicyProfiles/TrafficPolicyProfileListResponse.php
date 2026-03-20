<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListResponse\Type;

/**
 * @phpstan-type TrafficPolicyProfileListResponseShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   domains?: list<string>|null,
 *   ipRanges?: list<string>|null,
 *   limitBwKbps?: int|null,
 *   recordType?: string|null,
 *   services?: list<string>|null,
 *   type?: null|Type|value-of<Type>,
 *   updatedAt?: string|null,
 * }
 */
final class TrafficPolicyProfileListResponse implements BaseModel
{
    /** @use SdkModel<TrafficPolicyProfileListResponseShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Array of domain names.
     *
     * @var list<string>|null $domains
     */
    #[Optional(list: 'string')]
    public ?array $domains;

    /**
     * Array of IP ranges in CIDR notation.
     *
     * @var list<string>|null $ipRanges
     */
    #[Optional('ip_ranges', list: 'string')]
    public ?array $ipRanges;

    /**
     * Bandwidth limit in kbps.
     */
    #[Optional('limit_bw_kbps', nullable: true)]
    public ?int $limitBwKbps;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Array of PCEF service IDs included in the profile.
     *
     * @var list<string>|null $services
     */
    #[Optional(list: 'string')]
    public ?array $services;

    /**
     * The type of the traffic policy profile.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $domains
     * @param list<string>|null $ipRanges
     * @param list<string>|null $services
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?array $domains = null,
        ?array $ipRanges = null,
        ?int $limitBwKbps = null,
        ?string $recordType = null,
        ?array $services = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $domains && $self['domains'] = $domains;
        null !== $ipRanges && $self['ipRanges'] = $ipRanges;
        null !== $limitBwKbps && $self['limitBwKbps'] = $limitBwKbps;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $services && $self['services'] = $services;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Array of domain names.
     *
     * @param list<string> $domains
     */
    public function withDomains(array $domains): self
    {
        $self = clone $this;
        $self['domains'] = $domains;

        return $self;
    }

    /**
     * Array of IP ranges in CIDR notation.
     *
     * @param list<string> $ipRanges
     */
    public function withIPRanges(array $ipRanges): self
    {
        $self = clone $this;
        $self['ipRanges'] = $ipRanges;

        return $self;
    }

    /**
     * Bandwidth limit in kbps.
     */
    public function withLimitBwKbps(?int $limitBwKbps): self
    {
        $self = clone $this;
        $self['limitBwKbps'] = $limitBwKbps;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Array of PCEF service IDs included in the profile.
     *
     * @param list<string> $services
     */
    public function withServices(array $services): self
    {
        $self = clone $this;
        $self['services'] = $services;

        return $self;
    }

    /**
     * The type of the traffic policy profile.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}

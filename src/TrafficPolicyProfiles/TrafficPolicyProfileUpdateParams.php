<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\LimitBwKbps;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\Type;

/**
 * Updates a traffic policy profile.
 *
 * @see Telnyx\Services\TrafficPolicyProfilesService::update()
 *
 * @phpstan-type TrafficPolicyProfileUpdateParamsShape = array{
 *   domains?: list<string>|null,
 *   ipRanges?: list<string>|null,
 *   limitBwKbps?: null|LimitBwKbps|value-of<LimitBwKbps>,
 *   services?: list<string>|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class TrafficPolicyProfileUpdateParams implements BaseModel
{
    /** @use SdkModel<TrafficPolicyProfileUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * Bandwidth limit in kbps. Must be 512 or 1024, or null to remove.
     *
     * @var value-of<LimitBwKbps>|null $limitBwKbps
     */
    #[Optional('limit_bw_kbps', enum: LimitBwKbps::class, nullable: true)]
    public ?int $limitBwKbps;

    /**
     * Array of PCEF service IDs to include in the profile.
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
     * @param LimitBwKbps|value-of<LimitBwKbps>|null $limitBwKbps
     * @param list<string>|null $services
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?array $domains = null,
        ?array $ipRanges = null,
        LimitBwKbps|int|null $limitBwKbps = null,
        ?array $services = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $domains && $self['domains'] = $domains;
        null !== $ipRanges && $self['ipRanges'] = $ipRanges;
        null !== $limitBwKbps && $self['limitBwKbps'] = $limitBwKbps;
        null !== $services && $self['services'] = $services;
        null !== $type && $self['type'] = $type;

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
     * Bandwidth limit in kbps. Must be 512 or 1024, or null to remove.
     *
     * @param LimitBwKbps|value-of<LimitBwKbps>|null $limitBwKbps
     */
    public function withLimitBwKbps(LimitBwKbps|int|null $limitBwKbps): self
    {
        $self = clone $this;
        $self['limitBwKbps'] = $limitBwKbps;

        return $self;
    }

    /**
     * Array of PCEF service IDs to include in the profile.
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
}

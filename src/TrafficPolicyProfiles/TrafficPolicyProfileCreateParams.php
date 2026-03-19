<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams\LimitBwKbps;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams\Type;

/**
 * Create a new traffic policy profile. At least one of `services`, `ip_ranges`, or `domains` must be provided.
 *
 * @see Telnyx\Services\TrafficPolicyProfilesService::create()
 *
 * @phpstan-type TrafficPolicyProfileCreateParamsShape = array{
 *   type: Type|value-of<Type>,
 *   domains?: list<string>|null,
 *   ipRanges?: list<string>|null,
 *   limitBwKbps?: null|LimitBwKbps|value-of<LimitBwKbps>,
 *   services?: list<string>|null,
 * }
 */
final class TrafficPolicyProfileCreateParams implements BaseModel
{
    /** @use SdkModel<TrafficPolicyProfileCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The type of the traffic policy profile.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

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
     * Bandwidth limit in kbps. Must be 512 or 1024.
     *
     * @var value-of<LimitBwKbps>|null $limitBwKbps
     */
    #[Optional('limit_bw_kbps', enum: LimitBwKbps::class)]
    public ?int $limitBwKbps;

    /**
     * Array of PCEF service IDs to include in the profile.
     *
     * @var list<string>|null $services
     */
    #[Optional(list: 'string')]
    public ?array $services;

    /**
     * `new TrafficPolicyProfileCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrafficPolicyProfileCreateParams::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrafficPolicyProfileCreateParams)->withType(...)
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
     *
     * @param Type|value-of<Type> $type
     * @param list<string>|null $domains
     * @param list<string>|null $ipRanges
     * @param LimitBwKbps|value-of<LimitBwKbps>|null $limitBwKbps
     * @param list<string>|null $services
     */
    public static function with(
        Type|string $type,
        ?array $domains = null,
        ?array $ipRanges = null,
        LimitBwKbps|int|null $limitBwKbps = null,
        ?array $services = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $domains && $self['domains'] = $domains;
        null !== $ipRanges && $self['ipRanges'] = $ipRanges;
        null !== $limitBwKbps && $self['limitBwKbps'] = $limitBwKbps;
        null !== $services && $self['services'] = $services;

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
     * Bandwidth limit in kbps. Must be 512 or 1024.
     *
     * @param LimitBwKbps|value-of<LimitBwKbps> $limitBwKbps
     */
    public function withLimitBwKbps(LimitBwKbps|int $limitBwKbps): self
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
}

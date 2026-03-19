<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrafficPolicyProfileListServicesResponseShape = array{
 *   id?: string|null,
 *   group?: string|null,
 *   name?: string|null,
 *   resourceType?: string|null,
 * }
 */
final class TrafficPolicyProfileListServicesResponse implements BaseModel
{
    /** @use SdkModel<TrafficPolicyProfileListServicesResponseShape> */
    use SdkModel;

    /**
     * The service identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * The group the service belongs to.
     */
    #[Optional]
    public ?string $group;

    /**
     * The name of the service.
     */
    #[Optional]
    public ?string $name;

    #[Optional('resource_type')]
    public ?string $resourceType;

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
        ?string $id = null,
        ?string $group = null,
        ?string $name = null,
        ?string $resourceType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $group && $self['group'] = $group;
        null !== $name && $self['name'] = $name;
        null !== $resourceType && $self['resourceType'] = $resourceType;

        return $self;
    }

    /**
     * The service identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The group the service belongs to.
     */
    public function withGroup(string $group): self
    {
        $self = clone $this;
        $self['group'] = $group;

        return $self;
    }

    /**
     * The name of the service.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withResourceType(string $resourceType): self
    {
        $self = clone $this;
        $self['resourceType'] = $resourceType;

        return $self;
    }
}

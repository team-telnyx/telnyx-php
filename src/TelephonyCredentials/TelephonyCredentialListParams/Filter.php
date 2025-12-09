<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials\TelephonyCredentialListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username].
 *
 * @phpstan-type FilterShape = array{
 *   name?: string|null,
 *   resourceID?: string|null,
 *   sipUsername?: string|null,
 *   status?: string|null,
 *   tag?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Filter by resource_id.
     */
    #[Optional('resource_id')]
    public ?string $resourceID;

    /**
     * Filter by sip_username.
     */
    #[Optional('sip_username')]
    public ?string $sipUsername;

    /**
     * Filter by status.
     */
    #[Optional]
    public ?string $status;

    /**
     * Filter by tag.
     */
    #[Optional]
    public ?string $tag;

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
        ?string $name = null,
        ?string $resourceID = null,
        ?string $sipUsername = null,
        ?string $status = null,
        ?string $tag = null,
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $resourceID && $self['resourceID'] = $resourceID;
        null !== $sipUsername && $self['sipUsername'] = $sipUsername;
        null !== $status && $self['status'] = $status;
        null !== $tag && $self['tag'] = $tag;

        return $self;
    }

    /**
     * Filter by name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Filter by resource_id.
     */
    public function withResourceID(string $resourceID): self
    {
        $self = clone $this;
        $self['resourceID'] = $resourceID;

        return $self;
    }

    /**
     * Filter by sip_username.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $self = clone $this;
        $self['sipUsername'] = $sipUsername;

        return $self;
    }

    /**
     * Filter by status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by tag.
     */
    public function withTag(string $tag): self
    {
        $self = clone $this;
        $self['tag'] = $tag;

        return $self;
    }
}

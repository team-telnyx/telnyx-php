<?php

declare(strict_types=1);

namespace Telnyx\WellKnown;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WellKnownGetProtectedResourceMetadataResponseShape = array{
 *   authorizationServers?: list<string>|null, resource?: string|null
 * }
 */
final class WellKnownGetProtectedResourceMetadataResponse implements BaseModel
{
    /** @use SdkModel<WellKnownGetProtectedResourceMetadataResponseShape> */
    use SdkModel;

    /**
     * List of authorization server URLs.
     *
     * @var list<string>|null $authorizationServers
     */
    #[Optional('authorization_servers', list: 'string')]
    public ?array $authorizationServers;

    /**
     * Protected resource URL.
     */
    #[Optional]
    public ?string $resource;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $authorizationServers
     */
    public static function with(
        ?array $authorizationServers = null,
        ?string $resource = null
    ): self {
        $self = new self;

        null !== $authorizationServers && $self['authorizationServers'] = $authorizationServers;
        null !== $resource && $self['resource'] = $resource;

        return $self;
    }

    /**
     * List of authorization server URLs.
     *
     * @param list<string> $authorizationServers
     */
    public function withAuthorizationServers(array $authorizationServers): self
    {
        $self = clone $this;
        $self['authorizationServers'] = $authorizationServers;

        return $self;
    }

    /**
     * Protected resource URL.
     */
    public function withResource(string $resource): self
    {
        $self = clone $this;
        $self['resource'] = $resource;

        return $self;
    }
}

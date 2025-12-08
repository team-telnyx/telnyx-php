<?php

declare(strict_types=1);

namespace Telnyx\WellKnown;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WellKnownGetProtectedResourceMetadataResponseShape = array{
 *   authorization_servers?: list<string>|null, resource?: string|null
 * }
 */
final class WellKnownGetProtectedResourceMetadataResponse implements BaseModel
{
    /** @use SdkModel<WellKnownGetProtectedResourceMetadataResponseShape> */
    use SdkModel;

    /**
     * List of authorization server URLs.
     *
     * @var list<string>|null $authorization_servers
     */
    #[Api(list: 'string', optional: true)]
    public ?array $authorization_servers;

    /**
     * Protected resource URL.
     */
    #[Api(optional: true)]
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
     * @param list<string> $authorization_servers
     */
    public static function with(
        ?array $authorization_servers = null,
        ?string $resource = null
    ): self {
        $obj = new self;

        null !== $authorization_servers && $obj['authorization_servers'] = $authorization_servers;
        null !== $resource && $obj['resource'] = $resource;

        return $obj;
    }

    /**
     * List of authorization server URLs.
     *
     * @param list<string> $authorizationServers
     */
    public function withAuthorizationServers(array $authorizationServers): self
    {
        $obj = clone $this;
        $obj['authorization_servers'] = $authorizationServers;

        return $obj;
    }

    /**
     * Protected resource URL.
     */
    public function withResource(string $resource): self
    {
        $obj = clone $this;
        $obj['resource'] = $resource;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\WellKnown;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type WellKnownGetProtectedResourceMetadataResponseShape = array{
 *   authorizationServers?: list<string>, resource?: string
 * }
 */
final class WellKnownGetProtectedResourceMetadataResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<WellKnownGetProtectedResourceMetadataResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * List of authorization server URLs.
     *
     * @var list<string>|null $authorizationServers
     */
    #[Api('authorization_servers', list: 'string', optional: true)]
    public ?array $authorizationServers;

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
     * @param list<string> $authorizationServers
     */
    public static function with(
        ?array $authorizationServers = null,
        ?string $resource = null
    ): self {
        $obj = new self;

        null !== $authorizationServers && $obj->authorizationServers = $authorizationServers;
        null !== $resource && $obj->resource = $resource;

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
        $obj->authorizationServers = $authorizationServers;

        return $obj;
    }

    /**
     * Protected resource URL.
     */
    public function withResource(string $resource): self
    {
        $obj = clone $this;
        $obj->resource = $resource;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnector;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PayConnectors\PayConnector\Config\AuthType;

/**
 * Redacted stored configuration. Generic connector fields are shown here. Unknown config keys are discarded. Password and token are never returned.
 *
 * @phpstan-type ConfigShape = array{
 *   authType?: null|AuthType|value-of<AuthType>,
 *   endpointURL?: string|null,
 *   timeout?: int|null,
 *   username?: string|null,
 * }
 */
final class Config implements BaseModel
{
    /** @use SdkModel<ConfigShape> */
    use SdkModel;

    /**
     * Stored processor authentication selection. Omitted if it was not explicitly configured.
     *
     * @var value-of<AuthType>|null $authType
     */
    #[Optional('auth_type', enum: AuthType::class)]
    public ?string $authType;

    /**
     * HTTP or HTTPS processor URL with a host. Use HTTPS to protect payment data in transit.
     */
    #[Optional('endpoint_url')]
    public ?string $endpointURL;

    /**
     * Stored processor HTTP timeout in milliseconds. Omitted when no timeout was configured; the effective runtime default is 10000.
     */
    #[Optional]
    public ?int $timeout;

    /**
     * Stored username, when supplied. Required to be a nonblank string for basic authentication.
     */
    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AuthType|value-of<AuthType>|null $authType
     */
    public static function with(
        AuthType|string|null $authType = null,
        ?string $endpointURL = null,
        ?int $timeout = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $authType && $self['authType'] = $authType;
        null !== $endpointURL && $self['endpointURL'] = $endpointURL;
        null !== $timeout && $self['timeout'] = $timeout;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * Stored processor authentication selection. Omitted if it was not explicitly configured.
     *
     * @param AuthType|value-of<AuthType> $authType
     */
    public function withAuthType(AuthType|string $authType): self
    {
        $self = clone $this;
        $self['authType'] = $authType;

        return $self;
    }

    /**
     * HTTP or HTTPS processor URL with a host. Use HTTPS to protect payment data in transit.
     */
    public function withEndpointURL(string $endpointURL): self
    {
        $self = clone $this;
        $self['endpointURL'] = $endpointURL;

        return $self;
    }

    /**
     * Stored processor HTTP timeout in milliseconds. Omitted when no timeout was configured; the effective runtime default is 10000.
     */
    public function withTimeout(int $timeout): self
    {
        $self = clone $this;
        $self['timeout'] = $timeout;

        return $self;
    }

    /**
     * Stored username, when supplied. Required to be a nonblank string for basic authentication.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}

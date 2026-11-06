<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\GenericPayConnectorConfig;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type BearerAuthenticationShape = array{
 *   token: string,
 *   authType: 'bearer',
 *   endpointURL?: string|null,
 *   password?: string|null,
 *   timeout?: int|null,
 *   username?: string|null,
 * }
 */
final class BearerAuthentication implements BaseModel
{
    /** @use SdkModel<BearerAuthenticationShape> */
    use SdkModel;

    /** @var 'bearer' $authType */
    #[Required('auth_type')]
    public string $authType = 'bearer';

    /**
     * Processor bearer token.
     */
    #[Required]
    public string $token;

    /**
     * HTTP or HTTPS processor URL with a host. Use HTTPS to protect payment data in transit.
     */
    #[Optional('endpoint_url')]
    public ?string $endpointURL;

    /**
     * Nonblank string required for basic authentication. Write-only; omitted from responses. Re-send when replacing a basic-auth config.
     */
    #[Optional]
    public ?string $password;

    /**
     * Processor HTTP timeout in milliseconds. Omitted or null uses 10000; null is removed before storage. Not the IVR digit-gather timeout.
     */
    #[Optional(nullable: true)]
    public ?int $timeout;

    /**
     * Nonblank string required for basic authentication. Returned in connector responses.
     */
    #[Optional]
    public ?string $username;

    /**
     * `new BearerAuthentication()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BearerAuthentication::with(token: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BearerAuthentication)->withToken(...)
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
     */
    public static function with(
        string $token,
        int|Omitted|null $timeout = Omitted::VALUE,
        ?string $endpointURL = null,
        ?string $password = null,
        ?string $username = null,
    ): self {
        $self = new self;

        $self['token'] = $token;

        null !== $endpointURL && $self['endpointURL'] = $endpointURL;
        null !== $password && $self['password'] = $password;
        Omitted::VALUE !== $timeout && $self['timeout'] = $timeout;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * Processor bearer token.
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    /**
     * @param 'bearer' $authType
     */
    public function withAuthType(string $authType): self
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
     * Nonblank string required for basic authentication. Write-only; omitted from responses. Re-send when replacing a basic-auth config.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Processor HTTP timeout in milliseconds. Omitted or null uses 10000; null is removed before storage. Not the IVR digit-gather timeout.
     */
    public function withTimeout(?int $timeout): self
    {
        $self = clone $this;
        $self['timeout'] = $timeout;

        return $self;
    }

    /**
     * Nonblank string required for basic authentication. Returned in connector responses.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}

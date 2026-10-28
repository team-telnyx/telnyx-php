<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\GenericPayConnectorConfig;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type NoProcessorAuthenticationShape = array{
 *   authType: 'none',
 *   token?: mixed,
 *   endpointURL?: string|null,
 *   password?: mixed,
 *   timeout?: int|null,
 *   username?: mixed,
 * }
 */
final class NoProcessorAuthentication implements BaseModel
{
    /** @use SdkModel<NoProcessorAuthenticationShape> */
    use SdkModel;

    /** @var 'none' $authType */
    #[Required('auth_type')]
    public string $authType = 'none';

    /**
     * Nonblank string required for bearer authentication. Write-only; omitted from responses. Re-send when replacing a bearer-auth config.
     */
    #[Optional]
    public mixed $token;

    /**
     * HTTP or HTTPS processor URL with a host. Use HTTPS to protect payment data in transit.
     */
    #[Optional('endpoint_url')]
    public ?string $endpointURL;

    /**
     * Nonblank string required for basic authentication. Write-only; omitted from responses. Re-send when replacing a basic-auth config.
     */
    #[Optional]
    public mixed $password;

    /**
     * Processor HTTP timeout in milliseconds. Omitted or null uses 10000; null is removed before storage. Not the IVR digit-gather timeout.
     */
    #[Optional(nullable: true)]
    public ?int $timeout;

    /**
     * Nonblank string required for basic authentication. Returned in connector responses.
     */
    #[Optional]
    public mixed $username;

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
        int|Omitted|null $timeout = Omitted::VALUE,
        mixed $token = null,
        ?string $endpointURL = null,
        mixed $password = null,
        mixed $username = null,
    ): self {
        $self = new self;

        null !== $token && $self['token'] = $token;
        null !== $endpointURL && $self['endpointURL'] = $endpointURL;
        null !== $password && $self['password'] = $password;
        Omitted::VALUE !== $timeout && $self['timeout'] = $timeout;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * @param 'none' $authType
     */
    public function withAuthType(string $authType): self
    {
        $self = clone $this;
        $self['authType'] = $authType;

        return $self;
    }

    /**
     * Nonblank string required for bearer authentication. Write-only; omitted from responses. Re-send when replacing a bearer-auth config.
     */
    public function withToken(mixed $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

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
    public function withPassword(mixed $password): self
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
    public function withUsername(mixed $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}

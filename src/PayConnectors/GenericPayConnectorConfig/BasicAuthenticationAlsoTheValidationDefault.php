<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\GenericPayConnectorConfig;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BasicAuthenticationAlsoTheValidationDefault\AuthType;

/**
 * @phpstan-type BasicAuthenticationAlsoTheValidationDefaultShape = array{
 *   password: string,
 *   username: string,
 *   token?: mixed,
 *   authType?: null|AuthType|value-of<AuthType>,
 *   endpointURL?: string|null,
 *   timeout?: int|null,
 * }
 */
final class BasicAuthenticationAlsoTheValidationDefault implements BaseModel
{
    /** @use SdkModel<BasicAuthenticationAlsoTheValidationDefaultShape> */
    use SdkModel;

    /**
     * Basic password.
     */
    #[Required]
    public string $password;

    /**
     * Basic username.
     */
    #[Required]
    public string $username;

    /**
     * Nonblank string required for bearer authentication. Write-only; omitted from responses. Re-send when replacing a bearer-auth config.
     */
    #[Optional]
    public mixed $token;

    /** @var value-of<AuthType>|null $authType */
    #[Optional('auth_type', enum: AuthType::class)]
    public ?string $authType;

    /**
     * HTTP or HTTPS processor URL with a host. Use HTTPS to protect payment data in transit.
     */
    #[Optional('endpoint_url')]
    public ?string $endpointURL;

    /**
     * Processor HTTP timeout in milliseconds. Omitted or null uses 10000; null is removed before storage. Not the IVR digit-gather timeout.
     */
    #[Optional(nullable: true)]
    public ?int $timeout;

    /**
     * `new BasicAuthenticationAlsoTheValidationDefault()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BasicAuthenticationAlsoTheValidationDefault::with(password: ..., username: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BasicAuthenticationAlsoTheValidationDefault)
     *   ->withPassword(...)
     *   ->withUsername(...)
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
     * @param AuthType|value-of<AuthType>|null $authType
     */
    public static function with(
        string $password,
        string $username,
        int|Omitted|null $timeout = Omitted::VALUE,
        mixed $token = null,
        AuthType|string|null $authType = null,
        ?string $endpointURL = null,
    ): self {
        $self = new self;

        $self['password'] = $password;
        $self['username'] = $username;

        null !== $token && $self['token'] = $token;
        null !== $authType && $self['authType'] = $authType;
        null !== $endpointURL && $self['endpointURL'] = $endpointURL;
        Omitted::VALUE !== $timeout && $self['timeout'] = $timeout;

        return $self;
    }

    /**
     * Basic password.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Basic username.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

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
     * Processor HTTP timeout in milliseconds. Omitted or null uses 10000; null is removed before storage. Not the IVR digit-gather timeout.
     */
    public function withTimeout(?int $timeout): self
    {
        $self = clone $this;
        $self['timeout'] = $timeout;

        return $self;
    }
}

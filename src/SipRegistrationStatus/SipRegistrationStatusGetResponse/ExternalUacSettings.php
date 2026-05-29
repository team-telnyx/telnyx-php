<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\ExternalUacSettings\Transport;

/**
 * Outward-facing SIP settings used for registration. Password is redacted.
 *
 * @phpstan-type ExternalUacSettingsShape = array{
 *   authUsername?: string|null,
 *   expirationSec?: int|null,
 *   fromUser?: string|null,
 *   outboundProxy?: string|null,
 *   password?: string|null,
 *   proxy?: string|null,
 *   transport?: null|Transport|value-of<Transport>,
 *   username?: string|null,
 * }
 */
final class ExternalUacSettings implements BaseModel
{
    /** @use SdkModel<ExternalUacSettingsShape> */
    use SdkModel;

    #[Optional('auth_username')]
    public ?string $authUsername;

    #[Optional('expiration_sec')]
    public ?int $expirationSec;

    #[Optional('from_user')]
    public ?string $fromUser;

    #[Optional('outbound_proxy')]
    public ?string $outboundProxy;

    #[Optional]
    public ?string $password;

    #[Optional]
    public ?string $proxy;

    /** @var value-of<Transport>|null $transport */
    #[Optional(enum: Transport::class)]
    public ?string $transport;

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
     * @param Transport|value-of<Transport>|null $transport
     */
    public static function with(
        ?string $authUsername = null,
        ?int $expirationSec = null,
        ?string $fromUser = null,
        ?string $outboundProxy = null,
        ?string $password = null,
        ?string $proxy = null,
        Transport|string|null $transport = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $authUsername && $self['authUsername'] = $authUsername;
        null !== $expirationSec && $self['expirationSec'] = $expirationSec;
        null !== $fromUser && $self['fromUser'] = $fromUser;
        null !== $outboundProxy && $self['outboundProxy'] = $outboundProxy;
        null !== $password && $self['password'] = $password;
        null !== $proxy && $self['proxy'] = $proxy;
        null !== $transport && $self['transport'] = $transport;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withAuthUsername(string $authUsername): self
    {
        $self = clone $this;
        $self['authUsername'] = $authUsername;

        return $self;
    }

    public function withExpirationSec(int $expirationSec): self
    {
        $self = clone $this;
        $self['expirationSec'] = $expirationSec;

        return $self;
    }

    public function withFromUser(string $fromUser): self
    {
        $self = clone $this;
        $self['fromUser'] = $fromUser;

        return $self;
    }

    public function withOutboundProxy(string $outboundProxy): self
    {
        $self = clone $this;
        $self['outboundProxy'] = $outboundProxy;

        return $self;
    }

    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    public function withProxy(string $proxy): self
    {
        $self = clone $this;
        $self['proxy'] = $proxy;

        return $self;
    }

    /**
     * @param Transport|value-of<Transport> $transport
     */
    public function withTransport(Transport|string $transport): self
    {
        $self = clone $this;
        $self['transport'] = $transport;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}

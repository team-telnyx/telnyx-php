<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnectionCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UacConnections\UacConnectionCreateParams\ExternalUacSettings\Transport;

/**
 * External SIP peer settings used by Telnyx when registering to your PBX and routing outbound calls.
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

    /**
     * The authentication username used in SIP digest authentication. If not set, the Username value will be used.
     */
    #[Optional('auth_username', nullable: true)]
    public ?string $authUsername;

    /**
     * The registration interval, in seconds, indicating how often the system refreshes the SIP registration with the external SIP peer.
     */
    #[Optional('expiration_sec', nullable: true)]
    public ?int $expirationSec;

    /**
     * The user portion of the SIP From header used in outbound requests. This controls the caller identity presented to the external SIP peer.
     */
    #[Optional('from_user', nullable: true)]
    public ?string $fromUser;

    /**
     * An optional SIP proxy used to route outbound requests before reaching the external SIP peer.
     */
    #[Optional('outbound_proxy', nullable: true)]
    public ?string $outboundProxy;

    /**
     * The SIP password used for digest authentication with the external SIP peer.
     */
    #[Optional]
    public ?string $password;

    /**
     * The SIP proxy address of the external SIP peer used for registrations and outbound call routing.
     */
    #[Optional]
    public ?string $proxy;

    /**
     * The transport protocol used for SIP signaling when communicating with the external SIP peer. One of UDP, TLS, or TCP.
     *
     * @var value-of<Transport>|null $transport
     */
    #[Optional(enum: Transport::class, nullable: true)]
    public ?string $transport;

    /**
     * The SIP username used to authenticate with the external SIP peer for registrations and outbound calls. Must start with a letter or number and contain only letters, numbers, hyphens, and underscores.
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

    /**
     * The authentication username used in SIP digest authentication. If not set, the Username value will be used.
     */
    public function withAuthUsername(?string $authUsername): self
    {
        $self = clone $this;
        $self['authUsername'] = $authUsername;

        return $self;
    }

    /**
     * The registration interval, in seconds, indicating how often the system refreshes the SIP registration with the external SIP peer.
     */
    public function withExpirationSec(?int $expirationSec): self
    {
        $self = clone $this;
        $self['expirationSec'] = $expirationSec;

        return $self;
    }

    /**
     * The user portion of the SIP From header used in outbound requests. This controls the caller identity presented to the external SIP peer.
     */
    public function withFromUser(?string $fromUser): self
    {
        $self = clone $this;
        $self['fromUser'] = $fromUser;

        return $self;
    }

    /**
     * An optional SIP proxy used to route outbound requests before reaching the external SIP peer.
     */
    public function withOutboundProxy(?string $outboundProxy): self
    {
        $self = clone $this;
        $self['outboundProxy'] = $outboundProxy;

        return $self;
    }

    /**
     * The SIP password used for digest authentication with the external SIP peer.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The SIP proxy address of the external SIP peer used for registrations and outbound call routing.
     */
    public function withProxy(string $proxy): self
    {
        $self = clone $this;
        $self['proxy'] = $proxy;

        return $self;
    }

    /**
     * The transport protocol used for SIP signaling when communicating with the external SIP peer. One of UDP, TLS, or TCP.
     *
     * @param Transport|value-of<Transport>|null $transport
     */
    public function withTransport(Transport|string|null $transport): self
    {
        $self = clone $this;
        $self['transport'] = $transport;

        return $self;
    }

    /**
     * The SIP username used to authenticate with the external SIP peer for registrations and outbound calls. Must start with a letter or number and contain only letters, numbers, hyphens, and underscores.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}

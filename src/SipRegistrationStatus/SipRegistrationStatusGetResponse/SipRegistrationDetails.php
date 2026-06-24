<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Detailed registration information reported by the registrar. The populated fields depend on `credential_type`.
 *
 * @phpstan-type SipRegistrationDetailsShape = array{
 *   authRetries?: int|null,
 *   expires?: int|null,
 *   failures?: int|null,
 *   lastModified?: string|null,
 *   nextActionAt?: int|null,
 *   node?: string|null,
 *   sipUriUserHost?: string|null,
 *   transport?: string|null,
 *   uaIP?: string|null,
 *   uaPort?: int|null,
 *   uptime?: int|null,
 * }
 */
final class SipRegistrationDetails implements BaseModel
{
    /** @use SdkModel<SipRegistrationDetailsShape> */
    use SdkModel;

    /**
     * Number of authentication retries on the last attempt.
     */
    #[Optional('auth_retries')]
    public ?int $authRetries;

    /**
     * Unix timestamp when the current registration expires.
     */
    #[Optional]
    public ?int $expires;

    /**
     * Count of consecutive registration failures.
     */
    #[Optional]
    public ?int $failures;

    /**
     * Timestamp when the registration row was last modified (telephony_credential).
     */
    #[Optional('last_modified')]
    public ?string $lastModified;

    /**
     * Unix timestamp of the next scheduled registration action.
     */
    #[Optional('next_action_at')]
    public ?int $nextActionAt;

    /**
     * Registrar node handling the registration (telephony_credential).
     */
    #[Optional]
    public ?string $node;

    /**
     * SIP URI user@host of the registered contact.
     */
    #[Optional('sip_uri_user_host')]
    public ?string $sipUriUserHost;

    /**
     * Transport used for the registration, e.g. UDP/TCP/TLS (telephony_credential).
     */
    #[Optional]
    public ?string $transport;

    /**
     * IP address of the registered user agent (telephony_credential).
     */
    #[Optional('ua_ip')]
    public ?string $uaIP;

    /**
     * Port of the registered user agent (telephony_credential).
     */
    #[Optional('ua_port')]
    public ?int $uaPort;

    /**
     * Registration uptime reported by the registrar.
     */
    #[Optional]
    public ?int $uptime;

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
        ?int $authRetries = null,
        ?int $expires = null,
        ?int $failures = null,
        ?string $lastModified = null,
        ?int $nextActionAt = null,
        ?string $node = null,
        ?string $sipUriUserHost = null,
        ?string $transport = null,
        ?string $uaIP = null,
        ?int $uaPort = null,
        ?int $uptime = null,
    ): self {
        $self = new self;

        null !== $authRetries && $self['authRetries'] = $authRetries;
        null !== $expires && $self['expires'] = $expires;
        null !== $failures && $self['failures'] = $failures;
        null !== $lastModified && $self['lastModified'] = $lastModified;
        null !== $nextActionAt && $self['nextActionAt'] = $nextActionAt;
        null !== $node && $self['node'] = $node;
        null !== $sipUriUserHost && $self['sipUriUserHost'] = $sipUriUserHost;
        null !== $transport && $self['transport'] = $transport;
        null !== $uaIP && $self['uaIP'] = $uaIP;
        null !== $uaPort && $self['uaPort'] = $uaPort;
        null !== $uptime && $self['uptime'] = $uptime;

        return $self;
    }

    /**
     * Number of authentication retries on the last attempt.
     */
    public function withAuthRetries(int $authRetries): self
    {
        $self = clone $this;
        $self['authRetries'] = $authRetries;

        return $self;
    }

    /**
     * Unix timestamp when the current registration expires.
     */
    public function withExpires(int $expires): self
    {
        $self = clone $this;
        $self['expires'] = $expires;

        return $self;
    }

    /**
     * Count of consecutive registration failures.
     */
    public function withFailures(int $failures): self
    {
        $self = clone $this;
        $self['failures'] = $failures;

        return $self;
    }

    /**
     * Timestamp when the registration row was last modified (telephony_credential).
     */
    public function withLastModified(string $lastModified): self
    {
        $self = clone $this;
        $self['lastModified'] = $lastModified;

        return $self;
    }

    /**
     * Unix timestamp of the next scheduled registration action.
     */
    public function withNextActionAt(int $nextActionAt): self
    {
        $self = clone $this;
        $self['nextActionAt'] = $nextActionAt;

        return $self;
    }

    /**
     * Registrar node handling the registration (telephony_credential).
     */
    public function withNode(string $node): self
    {
        $self = clone $this;
        $self['node'] = $node;

        return $self;
    }

    /**
     * SIP URI user@host of the registered contact.
     */
    public function withSipUriUserHost(string $sipUriUserHost): self
    {
        $self = clone $this;
        $self['sipUriUserHost'] = $sipUriUserHost;

        return $self;
    }

    /**
     * Transport used for the registration, e.g. UDP/TCP/TLS (telephony_credential).
     */
    public function withTransport(string $transport): self
    {
        $self = clone $this;
        $self['transport'] = $transport;

        return $self;
    }

    /**
     * IP address of the registered user agent (telephony_credential).
     */
    public function withUaIP(string $uaIP): self
    {
        $self = clone $this;
        $self['uaIP'] = $uaIP;

        return $self;
    }

    /**
     * Port of the registered user agent (telephony_credential).
     */
    public function withUaPort(int $uaPort): self
    {
        $self = clone $this;
        $self['uaPort'] = $uaPort;

        return $self;
    }

    /**
     * Registration uptime reported by the registrar.
     */
    public function withUptime(int $uptime): self
    {
        $self = clone $this;
        $self['uptime'] = $uptime;

        return $self;
    }
}

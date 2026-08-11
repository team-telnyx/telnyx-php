<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Detailed registration information reported by the registrar. The populated fields depend on `credential_type`: UAC external credentials report `auth_retries`, `uptime`, `next_action_at`, `failures`, and `sip_uri_user_host`; telephony credentials and SIP credential connections report `ua_ip`, `ua_port`, `transport`, and `last_modified`. All types report `expires`.
 *
 * @phpstan-type SipRegistrationDetailsShape = array{
 *   authRetries?: int|null,
 *   expires?: int|null,
 *   failures?: int|null,
 *   lastModified?: string|null,
 *   nextActionAt?: int|null,
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
     * Number of authentication retries on the last attempt (uac_external_credential).
     */
    #[Optional('auth_retries')]
    public ?int $authRetries;

    /**
     * Unix timestamp when the current registration expires.
     */
    #[Optional]
    public ?int $expires;

    /**
     * Count of consecutive registration failures (uac_external_credential).
     */
    #[Optional]
    public ?int $failures;

    /**
     * Timestamp when the registration was last modified (telephony_credential and sip_credential_connection).
     */
    #[Optional('last_modified')]
    public ?string $lastModified;

    /**
     * Unix timestamp of the next scheduled registration action (uac_external_credential).
     */
    #[Optional('next_action_at')]
    public ?int $nextActionAt;

    /**
     * SIP URI user@host of the registered contact (uac_external_credential).
     */
    #[Optional('sip_uri_user_host')]
    public ?string $sipUriUserHost;

    /**
     * Transport used for the registration, e.g. UDP/TCP/TLS (telephony_credential and sip_credential_connection).
     */
    #[Optional]
    public ?string $transport;

    /**
     * IP address of the registered user agent (telephony_credential and sip_credential_connection).
     */
    #[Optional('ua_ip')]
    public ?string $uaIP;

    /**
     * Port of the registered user agent (telephony_credential and sip_credential_connection).
     */
    #[Optional('ua_port')]
    public ?int $uaPort;

    /**
     * Registration uptime reported by the registrar (uac_external_credential).
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
        null !== $sipUriUserHost && $self['sipUriUserHost'] = $sipUriUserHost;
        null !== $transport && $self['transport'] = $transport;
        null !== $uaIP && $self['uaIP'] = $uaIP;
        null !== $uaPort && $self['uaPort'] = $uaPort;
        null !== $uptime && $self['uptime'] = $uptime;

        return $self;
    }

    /**
     * Number of authentication retries on the last attempt (uac_external_credential).
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
     * Count of consecutive registration failures (uac_external_credential).
     */
    public function withFailures(int $failures): self
    {
        $self = clone $this;
        $self['failures'] = $failures;

        return $self;
    }

    /**
     * Timestamp when the registration was last modified (telephony_credential and sip_credential_connection).
     */
    public function withLastModified(string $lastModified): self
    {
        $self = clone $this;
        $self['lastModified'] = $lastModified;

        return $self;
    }

    /**
     * Unix timestamp of the next scheduled registration action (uac_external_credential).
     */
    public function withNextActionAt(int $nextActionAt): self
    {
        $self = clone $this;
        $self['nextActionAt'] = $nextActionAt;

        return $self;
    }

    /**
     * SIP URI user@host of the registered contact (uac_external_credential).
     */
    public function withSipUriUserHost(string $sipUriUserHost): self
    {
        $self = clone $this;
        $self['sipUriUserHost'] = $sipUriUserHost;

        return $self;
    }

    /**
     * Transport used for the registration, e.g. UDP/TCP/TLS (telephony_credential and sip_credential_connection).
     */
    public function withTransport(string $transport): self
    {
        $self = clone $this;
        $self['transport'] = $transport;

        return $self;
    }

    /**
     * IP address of the registered user agent (telephony_credential and sip_credential_connection).
     */
    public function withUaIP(string $uaIP): self
    {
        $self = clone $this;
        $self['uaIP'] = $uaIP;

        return $self;
    }

    /**
     * Port of the registered user agent (telephony_credential and sip_credential_connection).
     */
    public function withUaPort(int $uaPort): self
    {
        $self = clone $this;
        $self['uaPort'] = $uaPort;

        return $self;
    }

    /**
     * Registration uptime reported by the registrar (uac_external_credential).
     */
    public function withUptime(int $uptime): self
    {
        $self = clone $this;
        $self['uptime'] = $uptime;

        return $self;
    }
}

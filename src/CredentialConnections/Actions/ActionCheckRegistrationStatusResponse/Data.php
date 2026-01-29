<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   ipAddress?: string|null,
 *   lastRegistration?: string|null,
 *   port?: int|null,
 *   recordType?: string|null,
 *   sipUsername?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   transport?: string|null,
 *   userAgent?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ip used during the SIP connection.
     */
    #[Optional('ip_address')]
    public ?string $ipAddress;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Optional('last_registration')]
    public ?string $lastRegistration;

    /**
     * The port of the SIP connection.
     */
    #[Optional]
    public ?int $port;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The user name of the SIP connection.
     */
    #[Optional('sip_username')]
    public ?string $sipUsername;

    /**
     * The current registration status of your SIP connection.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The protocol of the SIP connection.
     */
    #[Optional]
    public ?string $transport;

    /**
     * The user agent of the SIP connection.
     */
    #[Optional('user_agent')]
    public ?string $userAgent;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $ipAddress = null,
        ?string $lastRegistration = null,
        ?int $port = null,
        ?string $recordType = null,
        ?string $sipUsername = null,
        Status|string|null $status = null,
        ?string $transport = null,
        ?string $userAgent = null,
    ): self {
        $self = new self;

        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $lastRegistration && $self['lastRegistration'] = $lastRegistration;
        null !== $port && $self['port'] = $port;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sipUsername && $self['sipUsername'] = $sipUsername;
        null !== $status && $self['status'] = $status;
        null !== $transport && $self['transport'] = $transport;
        null !== $userAgent && $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * The ip used during the SIP connection.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withLastRegistration(string $lastRegistration): self
    {
        $self = clone $this;
        $self['lastRegistration'] = $lastRegistration;

        return $self;
    }

    /**
     * The port of the SIP connection.
     */
    public function withPort(int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The user name of the SIP connection.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $self = clone $this;
        $self['sipUsername'] = $sipUsername;

        return $self;
    }

    /**
     * The current registration status of your SIP connection.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The protocol of the SIP connection.
     */
    public function withTransport(string $transport): self
    {
        $self = clone $this;
        $self['transport'] = $transport;

        return $self;
    }

    /**
     * The user agent of the SIP connection.
     */
    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }
}

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
 *   status?: value-of<Status>|null,
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
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        null !== $ipAddress && $obj['ipAddress'] = $ipAddress;
        null !== $lastRegistration && $obj['lastRegistration'] = $lastRegistration;
        null !== $port && $obj['port'] = $port;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $sipUsername && $obj['sipUsername'] = $sipUsername;
        null !== $status && $obj['status'] = $status;
        null !== $transport && $obj['transport'] = $transport;
        null !== $userAgent && $obj['userAgent'] = $userAgent;

        return $obj;
    }

    /**
     * The ip used during the SIP connection.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ipAddress'] = $ipAddress;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withLastRegistration(string $lastRegistration): self
    {
        $obj = clone $this;
        $obj['lastRegistration'] = $lastRegistration;

        return $obj;
    }

    /**
     * The port of the SIP connection.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj['port'] = $port;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The user name of the SIP connection.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $obj = clone $this;
        $obj['sipUsername'] = $sipUsername;

        return $obj;
    }

    /**
     * The current registration status of your SIP connection.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The protocol of the SIP connection.
     */
    public function withTransport(string $transport): self
    {
        $obj = clone $this;
        $obj['transport'] = $transport;

        return $obj;
    }

    /**
     * The user agent of the SIP connection.
     */
    public function withUserAgent(string $userAgent): self
    {
        $obj = clone $this;
        $obj['userAgent'] = $userAgent;

        return $obj;
    }
}

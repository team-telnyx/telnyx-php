<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   ip_address?: string|null,
 *   last_registration?: string|null,
 *   port?: int|null,
 *   record_type?: string|null,
 *   sip_username?: string|null,
 *   status?: value-of<Status>|null,
 *   transport?: string|null,
 *   user_agent?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ip used during the SIP connection.
     */
    #[Optional]
    public ?string $ip_address;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Optional]
    public ?string $last_registration;

    /**
     * The port of the SIP connection.
     */
    #[Optional]
    public ?int $port;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * The user name of the SIP connection.
     */
    #[Optional]
    public ?string $sip_username;

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
    #[Optional]
    public ?string $user_agent;

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
        ?string $ip_address = null,
        ?string $last_registration = null,
        ?int $port = null,
        ?string $record_type = null,
        ?string $sip_username = null,
        Status|string|null $status = null,
        ?string $transport = null,
        ?string $user_agent = null,
    ): self {
        $obj = new self;

        null !== $ip_address && $obj['ip_address'] = $ip_address;
        null !== $last_registration && $obj['last_registration'] = $last_registration;
        null !== $port && $obj['port'] = $port;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sip_username && $obj['sip_username'] = $sip_username;
        null !== $status && $obj['status'] = $status;
        null !== $transport && $obj['transport'] = $transport;
        null !== $user_agent && $obj['user_agent'] = $user_agent;

        return $obj;
    }

    /**
     * The ip used during the SIP connection.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ip_address'] = $ipAddress;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withLastRegistration(string $lastRegistration): self
    {
        $obj = clone $this;
        $obj['last_registration'] = $lastRegistration;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The user name of the SIP connection.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $obj = clone $this;
        $obj['sip_username'] = $sipUsername;

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
        $obj['user_agent'] = $userAgent;

        return $obj;
    }
}

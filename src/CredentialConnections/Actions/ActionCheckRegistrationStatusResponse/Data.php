<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data\Status;

/**
 * @phpstan-type data_alias = array{
 *   ipAddress?: string,
 *   lastRegistration?: string,
 *   port?: int,
 *   recordType?: string,
 *   sipUsername?: string,
 *   status?: value-of<Status>,
 *   transport?: string,
 *   userAgent?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The ip used during the SIP connection.
     */
    #[Api('ip_address', optional: true)]
    public ?string $ipAddress;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Api('last_registration', optional: true)]
    public ?string $lastRegistration;

    /**
     * The port of the SIP connection.
     */
    #[Api(optional: true)]
    public ?int $port;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The user name of the SIP connection.
     */
    #[Api('sip_username', optional: true)]
    public ?string $sipUsername;

    /**
     * The current registration status of your SIP connection.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The protocol of the SIP connection.
     */
    #[Api(optional: true)]
    public ?string $transport;

    /**
     * The user agent of the SIP connection.
     */
    #[Api('user_agent', optional: true)]
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

        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $lastRegistration && $obj->lastRegistration = $lastRegistration;
        null !== $port && $obj->port = $port;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $sipUsername && $obj->sipUsername = $sipUsername;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $transport && $obj->transport = $transport;
        null !== $userAgent && $obj->userAgent = $userAgent;

        return $obj;
    }

    /**
     * The ip used during the SIP connection.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withLastRegistration(string $lastRegistration): self
    {
        $obj = clone $this;
        $obj->lastRegistration = $lastRegistration;

        return $obj;
    }

    /**
     * The port of the SIP connection.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The user name of the SIP connection.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $obj = clone $this;
        $obj->sipUsername = $sipUsername;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * The protocol of the SIP connection.
     */
    public function withTransport(string $transport): self
    {
        $obj = clone $this;
        $obj->transport = $transport;

        return $obj;
    }

    /**
     * The user agent of the SIP connection.
     */
    public function withUserAgent(string $userAgent): self
    {
        $obj = clone $this;
        $obj->userAgent = $userAgent;

        return $obj;
    }
}

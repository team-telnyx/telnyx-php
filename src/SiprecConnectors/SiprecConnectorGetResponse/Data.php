<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors\SiprecConnectorGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   appSubdomain?: string|null,
 *   createdAt?: string|null,
 *   host?: string|null,
 *   name?: string|null,
 *   port?: int|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Subdomain to route calls when using Telnyx SRS (optional).
     */
    #[Optional('app_subdomain')]
    public ?string $appSubdomain;

    /**
     * ISO 8601 formatted date/time of creation.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    #[Optional]
    public ?string $host;

    /**
     * Name for the SIPREC connector resource.
     */
    #[Optional]
    public ?string $name;

    /**
     * Port for the SIPREC SRS.
     */
    #[Optional]
    public ?int $port;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date/time of last update.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

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
        ?string $appSubdomain = null,
        ?string $createdAt = null,
        ?string $host = null,
        ?string $name = null,
        ?int $port = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $appSubdomain && $self['appSubdomain'] = $appSubdomain;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $host && $self['host'] = $host;
        null !== $name && $self['name'] = $name;
        null !== $port && $self['port'] = $port;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Subdomain to route calls when using Telnyx SRS (optional).
     */
    public function withAppSubdomain(string $appSubdomain): self
    {
        $self = clone $this;
        $self['appSubdomain'] = $appSubdomain;

        return $self;
    }

    /**
     * ISO 8601 formatted date/time of creation.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    public function withHost(string $host): self
    {
        $self = clone $this;
        $self['host'] = $host;

        return $self;
    }

    /**
     * Name for the SIPREC connector resource.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Port for the SIPREC SRS.
     */
    public function withPort(int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date/time of last update.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}

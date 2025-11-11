<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   app_subdomain?: string|null,
 *   created_at?: string|null,
 *   host?: string|null,
 *   name?: string|null,
 *   port?: int|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Subdomain to route calls when using Telnyx SRS (optional).
     */
    #[Api(optional: true)]
    public ?string $app_subdomain;

    /**
     * ISO 8601 formatted date/time of creation.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    #[Api(optional: true)]
    public ?string $host;

    /**
     * Name for the SIPREC connector resource.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Port for the SIPREC SRS.
     */
    #[Api(optional: true)]
    public ?int $port;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date/time of last update.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
        ?string $app_subdomain = null,
        ?string $created_at = null,
        ?string $host = null,
        ?string $name = null,
        ?int $port = null,
        ?string $record_type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $app_subdomain && $obj->app_subdomain = $app_subdomain;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $host && $obj->host = $host;
        null !== $name && $obj->name = $name;
        null !== $port && $obj->port = $port;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Subdomain to route calls when using Telnyx SRS (optional).
     */
    public function withAppSubdomain(string $appSubdomain): self
    {
        $obj = clone $this;
        $obj->app_subdomain = $appSubdomain;

        return $obj;
    }

    /**
     * ISO 8601 formatted date/time of creation.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    public function withHost(string $host): self
    {
        $obj = clone $this;
        $obj->host = $host;

        return $obj;
    }

    /**
     * Name for the SIPREC connector resource.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Port for the SIPREC SRS.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date/time of last update.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}

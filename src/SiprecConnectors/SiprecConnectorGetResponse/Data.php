<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors\SiprecConnectorGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   appSubdomain?: string,
 *   createdAt?: string,
 *   host?: string,
 *   name?: string,
 *   port?: int,
 *   recordType?: string,
 *   updatedAt?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Subdomain to route calls when using Telnyx SRS (optional).
     */
    #[Api('app_subdomain', optional: true)]
    public ?string $appSubdomain;

    /**
     * ISO 8601 formatted date/time of creation.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

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

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date/time of last update.
     */
    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        null !== $appSubdomain && $obj->appSubdomain = $appSubdomain;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $host && $obj->host = $host;
        null !== $name && $obj->name = $name;
        null !== $port && $obj->port = $port;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Subdomain to route calls when using Telnyx SRS (optional).
     */
    public function withAppSubdomain(string $appSubdomain): self
    {
        $obj = clone $this;
        $obj->appSubdomain = $appSubdomain;

        return $obj;
    }

    /**
     * ISO 8601 formatted date/time of creation.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date/time of last update.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}

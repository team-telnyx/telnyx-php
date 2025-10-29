<?php

declare(strict_types=1);

namespace Telnyx\Regions\RegionListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code?: string,
 *   createdAt?: string,
 *   name?: string,
 *   recordType?: string,
 *   supportedInterfaces?: list<string>,
 *   updatedAt?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * A code for the region.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * A name for the region.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * List of interface types supported in this region.
     *
     * @var list<string>|null $supportedInterfaces
     */
    #[Api('supported_interfaces', list: 'string', optional: true)]
    public ?array $supportedInterfaces;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
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
     *
     * @param list<string> $supportedInterfaces
     */
    public static function with(
        ?string $code = null,
        ?string $createdAt = null,
        ?string $name = null,
        ?string $recordType = null,
        ?array $supportedInterfaces = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $supportedInterfaces && $obj->supportedInterfaces = $supportedInterfaces;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * A code for the region.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * A name for the region.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
     * List of interface types supported in this region.
     *
     * @param list<string> $supportedInterfaces
     */
    public function withSupportedInterfaces(array $supportedInterfaces): self
    {
        $obj = clone $this;
        $obj->supportedInterfaces = $supportedInterfaces;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}

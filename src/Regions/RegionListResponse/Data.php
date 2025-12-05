<?php

declare(strict_types=1);

namespace Telnyx\Regions\RegionListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code?: string|null,
 *   created_at?: string|null,
 *   name?: string|null,
 *   record_type?: string|null,
 *   supported_interfaces?: list<string>|null,
 *   updated_at?: string|null,
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
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * A name for the region.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * List of interface types supported in this region.
     *
     * @var list<string>|null $supported_interfaces
     */
    #[Api(list: 'string', optional: true)]
    public ?array $supported_interfaces;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
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
     *
     * @param list<string> $supported_interfaces
     */
    public static function with(
        ?string $code = null,
        ?string $created_at = null,
        ?string $name = null,
        ?string $record_type = null,
        ?array $supported_interfaces = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $name && $obj['name'] = $name;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $supported_interfaces && $obj['supported_interfaces'] = $supported_interfaces;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * A code for the region.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * A name for the region.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
     * List of interface types supported in this region.
     *
     * @param list<string> $supportedInterfaces
     */
    public function withSupportedInterfaces(array $supportedInterfaces): self
    {
        $obj = clone $this;
        $obj['supported_interfaces'] = $supportedInterfaces;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}

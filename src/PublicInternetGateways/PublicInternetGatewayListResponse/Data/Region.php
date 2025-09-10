<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways\PublicInternetGatewayListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type region_alias = array{
 *   code?: string|null, name?: string|null, recordType?: string|null
 * }
 */
final class Region implements BaseModel
{
    /** @use SdkModel<region_alias> */
    use SdkModel;

    /**
     * Region code of the interface.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * Region name of the interface.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
        ?string $code = null,
        ?string $name = null,
        ?string $recordType = null
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $name && $obj->name = $name;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Region code of the interface.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * Region name of the interface.
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
}

<?php

declare(strict_types=1);

namespace Telnyx\Networks\NetworkListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type unnamed_type_with_intersection_parent14 = array{
 *   name?: string, recordType?: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent14> */
    use SdkModel;

    /**
     * A user specified name for the network.
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
        ?string $name = null,
        ?string $recordType = null
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * A user specified name for the network.
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

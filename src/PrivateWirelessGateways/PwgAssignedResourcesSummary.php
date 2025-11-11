<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The summary of the resource that have been assigned to the Private Wireless Gateway.
 *
 * @phpstan-type PwgAssignedResourcesSummaryShape = array{
 *   count?: int|null, record_type?: string|null
 * }
 */
final class PwgAssignedResourcesSummary implements BaseModel
{
    /** @use SdkModel<PwgAssignedResourcesSummaryShape> */
    use SdkModel;

    /**
     * The current count of a resource type assigned to the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?int $count;

    /**
     * The type of the resource assigned to the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?int $count = null,
        ?string $record_type = null
    ): self {
        $obj = new self;

        null !== $count && $obj->count = $count;
        null !== $record_type && $obj->record_type = $record_type;

        return $obj;
    }

    /**
     * The current count of a resource type assigned to the Private Wireless Gateway.
     */
    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * The type of the resource assigned to the Private Wireless Gateway.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The summary of the resource that have been assigned to the Private Wireless Gateway.
 *
 * @phpstan-type PwgAssignedResourcesSummaryShape = array{
 *   count?: int|null, recordType?: string|null
 * }
 */
final class PwgAssignedResourcesSummary implements BaseModel
{
    /** @use SdkModel<PwgAssignedResourcesSummaryShape> */
    use SdkModel;

    /**
     * The current count of a resource type assigned to the Private Wireless Gateway.
     */
    #[Optional]
    public ?int $count;

    /**
     * The type of the resource assigned to the Private Wireless Gateway.
     */
    #[Optional('record_type')]
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
        ?int $count = null,
        ?string $recordType = null
    ): self {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The current count of a resource type assigned to the Private Wireless Gateway.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * The type of the resource assigned to the Private Wireless Gateway.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}

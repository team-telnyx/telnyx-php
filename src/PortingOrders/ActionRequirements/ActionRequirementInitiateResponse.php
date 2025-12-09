<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse\Data;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse\Data\RecordType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse\Data\Status;

/**
 * @phpstan-type ActionRequirementInitiateResponseShape = array{data?: Data|null}
 */
final class ActionRequirementInitiateResponse implements BaseModel
{
    /** @use SdkModel<ActionRequirementInitiateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   actionType?: string|null,
     *   actionURL?: string|null,
     *   cancelReason?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   portingOrderID?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   requirementTypeID?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   actionType?: string|null,
     *   actionURL?: string|null,
     *   cancelReason?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   portingOrderID?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   requirementTypeID?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

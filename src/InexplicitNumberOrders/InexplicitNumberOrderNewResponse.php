<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse\Data;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse\Data\OrderingGroup;

/**
 * @phpstan-type InexplicitNumberOrderNewResponseShape = array{data?: Data|null}
 */
final class InexplicitNumberOrderNewResponse implements BaseModel
{
    /** @use SdkModel<InexplicitNumberOrderNewResponseShape> */
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
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   orderingGroups?: list<OrderingGroup>|null,
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
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   orderingGroups?: list<OrderingGroup>|null,
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

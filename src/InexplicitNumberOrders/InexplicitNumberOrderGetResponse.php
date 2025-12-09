<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse\OrderingGroup;

/**
 * @phpstan-type InexplicitNumberOrderGetResponseShape = array{
 *   data?: InexplicitNumberOrderResponse|null
 * }
 */
final class InexplicitNumberOrderGetResponse implements BaseModel
{
    /** @use SdkModel<InexplicitNumberOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?InexplicitNumberOrderResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InexplicitNumberOrderResponse|array{
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
    public static function with(
        InexplicitNumberOrderResponse|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param InexplicitNumberOrderResponse|array{
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
    public function withData(InexplicitNumberOrderResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

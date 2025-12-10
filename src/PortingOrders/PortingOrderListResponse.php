<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrder\AdditionalStep;
use Telnyx\PortingOrders\PortingOrder\PhoneNumberType;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-type PortingOrderListResponseShape = array{
 *   data?: list<PortingOrder>|null, meta?: PaginationMeta|null
 * }
 */
final class PortingOrderListResponse implements BaseModel
{
    /** @use SdkModel<PortingOrderListResponseShape> */
    use SdkModel;

    /** @var list<PortingOrder>|null $data */
    #[Optional(list: PortingOrder::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortingOrder|array{
     *   id?: string|null,
     *   activationSettings?: PortingOrderActivationSettings|null,
     *   additionalSteps?: list<value-of<AdditionalStep>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerGroupReference?: string|null,
     *   customerReference?: string|null,
     *   description?: string|null,
     *   documents?: PortingOrderDocuments|null,
     *   endUser?: PortingOrderEndUser|null,
     *   messaging?: PortingOrderMessaging|null,
     *   misc?: PortingOrderMisc|null,
     *   oldServiceProviderOcn?: string|null,
     *   parentSupportKey?: string|null,
     *   phoneNumberConfiguration?: PortingOrderPhoneNumberConfiguration|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portingPhoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   requirements?: list<PortingOrderRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: PortingOrderStatus|null,
     *   supportKey?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userFeedback?: PortingOrderUserFeedback|null,
     *   userID?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<PortingOrder|array{
     *   id?: string|null,
     *   activationSettings?: PortingOrderActivationSettings|null,
     *   additionalSteps?: list<value-of<AdditionalStep>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerGroupReference?: string|null,
     *   customerReference?: string|null,
     *   description?: string|null,
     *   documents?: PortingOrderDocuments|null,
     *   endUser?: PortingOrderEndUser|null,
     *   messaging?: PortingOrderMessaging|null,
     *   misc?: PortingOrderMisc|null,
     *   oldServiceProviderOcn?: string|null,
     *   parentSupportKey?: string|null,
     *   phoneNumberConfiguration?: PortingOrderPhoneNumberConfiguration|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portingPhoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   requirements?: list<PortingOrderRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: PortingOrderStatus|null,
     *   supportKey?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userFeedback?: PortingOrderUserFeedback|null,
     *   userID?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}

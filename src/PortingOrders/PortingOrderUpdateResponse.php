<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrder\AdditionalStep;
use Telnyx\PortingOrders\PortingOrder\PhoneNumberType;
use Telnyx\PortingOrders\PortingOrderUpdateResponse\Meta;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-type PortingOrderUpdateResponseShape = array{
 *   data?: PortingOrder|null, meta?: Meta|null
 * }
 */
final class PortingOrderUpdateResponse implements BaseModel
{
    /** @use SdkModel<PortingOrderUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingOrder $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrder|array{
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
     * } $data
     * @param Meta|array{phoneNumbersURL?: string|null} $meta
     */
    public static function with(
        PortingOrder|array|null $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param PortingOrder|array{
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
     * } $data
     */
    public function withData(PortingOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{phoneNumbersURL?: string|null} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}

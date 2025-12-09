<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrder\AdditionalStep;
use Telnyx\PortingOrders\PortingOrder\PhoneNumberType;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-type PortingOrderNewResponseShape = array{
 *   data?: list<PortingOrder>|null
 * }
 */
final class PortingOrderNewResponse implements BaseModel
{
    /** @use SdkModel<PortingOrderNewResponseShape> */
    use SdkModel;

    /** @var list<PortingOrder>|null $data */
    #[Optional(list: PortingOrder::class)]
    public ?array $data;

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
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

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
}

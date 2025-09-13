<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\ActivationStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\PortabilityStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\UnionMember0;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\UnionMember1;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\SupportKey;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status].
 *
 * @phpstan-type filter_alias = array{
 *   activationStatus?: value-of<ActivationStatus>,
 *   phoneNumber?: list<string>,
 *   portabilityStatus?: value-of<PortabilityStatus>,
 *   portingOrderID?: list<string>,
 *   status?: list<value-of<UnionMember1>>|value-of<UnionMember0>,
 *   supportKey?: string|list<string>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter results by activation status.
     *
     * @var value-of<ActivationStatus>|null $activationStatus
     */
    #[Api('activation_status', enum: ActivationStatus::class, optional: true)]
    public ?string $activationStatus;

    /**
     * Filter results by a list of phone numbers.
     *
     * @var list<string>|null $phoneNumber
     */
    #[Api('phone_number', list: 'string', optional: true)]
    public ?array $phoneNumber;

    /**
     * Filter results by portability status.
     *
     * @var value-of<PortabilityStatus>|null $portabilityStatus
     */
    #[Api('portability_status', enum: PortabilityStatus::class, optional: true)]
    public ?string $portabilityStatus;

    /**
     * Filter results by a list of porting order ids.
     *
     * @var list<string>|null $portingOrderID
     */
    #[Api('porting_order_id', list: 'string', optional: true)]
    public ?array $portingOrderID;

    /**
     * Filter porting orders by status(es). Originally: filter[status], filter[status][in][].
     *
     * @var list<value-of<UnionMember1>>|value-of<UnionMember0>|null $status
     */
    #[Api(union: Status::class, optional: true)]
    public array|string|null $status;

    /**
     * Filter results by support key(s). Originally: filter[support_key][eq], filter[support_key][in][].
     *
     * @var string|list<string>|null $supportKey
     */
    #[Api('support_key', union: SupportKey::class, optional: true)]
    public string|array|null $supportKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     * @param list<string> $phoneNumber
     * @param PortabilityStatus|value-of<PortabilityStatus> $portabilityStatus
     * @param list<string> $portingOrderID
     * @param UnionMember0|list<UnionMember1|value-of<UnionMember1>>|value-of<UnionMember0> $status
     * @param string|list<string> $supportKey
     */
    public static function with(
        ActivationStatus|string|null $activationStatus = null,
        ?array $phoneNumber = null,
        PortabilityStatus|string|null $portabilityStatus = null,
        ?array $portingOrderID = null,
        UnionMember0|array|string|null $status = null,
        string|array|null $supportKey = null,
    ): self {
        $obj = new self;

        null !== $activationStatus && $obj->activationStatus = $activationStatus instanceof ActivationStatus ? $activationStatus->value : $activationStatus;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $portabilityStatus && $obj->portabilityStatus = $portabilityStatus instanceof PortabilityStatus ? $portabilityStatus->value : $portabilityStatus;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $status && $obj->status = $status instanceof UnionMember0 ? $status->value : $status;
        null !== $supportKey && $obj->supportKey = $supportKey;

        return $obj;
    }

    /**
     * Filter results by activation status.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     */
    public function withActivationStatus(
        ActivationStatus|string $activationStatus
    ): self {
        $obj = clone $this;
        $obj->activationStatus = $activationStatus instanceof ActivationStatus ? $activationStatus->value : $activationStatus;

        return $obj;
    }

    /**
     * Filter results by a list of phone numbers.
     *
     * @param list<string> $phoneNumber
     */
    public function withPhoneNumber(array $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Filter results by portability status.
     *
     * @param PortabilityStatus|value-of<PortabilityStatus> $portabilityStatus
     */
    public function withPortabilityStatus(
        PortabilityStatus|string $portabilityStatus
    ): self {
        $obj = clone $this;
        $obj->portabilityStatus = $portabilityStatus instanceof PortabilityStatus ? $portabilityStatus->value : $portabilityStatus;

        return $obj;
    }

    /**
     * Filter results by a list of porting order ids.
     *
     * @param list<string> $portingOrderID
     */
    public function withPortingOrderID(array $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * Filter porting orders by status(es). Originally: filter[status], filter[status][in][].
     *
     * @param UnionMember0|list<UnionMember1|value-of<UnionMember1>>|value-of<UnionMember0> $status
     */
    public function withStatus(UnionMember0|array|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof UnionMember0 ? $status->value : $status;

        return $obj;
    }

    /**
     * Filter results by support key(s). Originally: filter[support_key][eq], filter[support_key][in][].
     *
     * @param string|list<string> $supportKey
     */
    public function withSupportKey(string|array $supportKey): self
    {
        $obj = clone $this;
        $obj->supportKey = $supportKey;

        return $obj;
    }
}

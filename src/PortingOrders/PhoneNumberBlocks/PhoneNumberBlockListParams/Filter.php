<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;

use Telnyx\Core\Attributes\Optional;
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
 * @phpstan-type FilterShape = array{
 *   activationStatus?: value-of<ActivationStatus>|null,
 *   phoneNumber?: list<string>|null,
 *   portabilityStatus?: value-of<PortabilityStatus>|null,
 *   portingOrderID?: list<string>|null,
 *   status?: null|list<value-of<UnionMember1>>|value-of<UnionMember0>,
 *   supportKey?: string|null|list<string>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by activation status.
     *
     * @var value-of<ActivationStatus>|null $activationStatus
     */
    #[Optional('activation_status', enum: ActivationStatus::class)]
    public ?string $activationStatus;

    /**
     * Filter results by a list of phone numbers.
     *
     * @var list<string>|null $phoneNumber
     */
    #[Optional('phone_number', list: 'string')]
    public ?array $phoneNumber;

    /**
     * Filter results by portability status.
     *
     * @var value-of<PortabilityStatus>|null $portabilityStatus
     */
    #[Optional('portability_status', enum: PortabilityStatus::class)]
    public ?string $portabilityStatus;

    /**
     * Filter results by a list of porting order ids.
     *
     * @var list<string>|null $portingOrderID
     */
    #[Optional('porting_order_id', list: 'string')]
    public ?array $portingOrderID;

    /**
     * Filter porting orders by status(es). Originally: filter[status], filter[status][in][].
     *
     * @var list<value-of<UnionMember1>>|value-of<UnionMember0>|null $status
     */
    #[Optional(union: Status::class)]
    public array|string|null $status;

    /**
     * Filter results by support key(s). Originally: filter[support_key][eq], filter[support_key][in][].
     *
     * @var string|list<string>|null $supportKey
     */
    #[Optional('support_key', union: SupportKey::class)]
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

        null !== $activationStatus && $obj['activationStatus'] = $activationStatus;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $portabilityStatus && $obj['portabilityStatus'] = $portabilityStatus;
        null !== $portingOrderID && $obj['portingOrderID'] = $portingOrderID;
        null !== $status && $obj['status'] = $status;
        null !== $supportKey && $obj['supportKey'] = $supportKey;

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
        $obj['activationStatus'] = $activationStatus;

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
        $obj['phoneNumber'] = $phoneNumber;

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
        $obj['portabilityStatus'] = $portabilityStatus;

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
        $obj['portingOrderID'] = $portingOrderID;

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
        $obj['status'] = $status;

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
        $obj['supportKey'] = $supportKey;

        return $obj;
    }
}

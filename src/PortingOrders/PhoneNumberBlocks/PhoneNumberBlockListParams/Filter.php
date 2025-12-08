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
 *   activation_status?: value-of<ActivationStatus>|null,
 *   phone_number?: list<string>|null,
 *   portability_status?: value-of<PortabilityStatus>|null,
 *   porting_order_id?: list<string>|null,
 *   status?: null|list<value-of<UnionMember1>>|value-of<UnionMember0>,
 *   support_key?: string|null|list<string>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by activation status.
     *
     * @var value-of<ActivationStatus>|null $activation_status
     */
    #[Optional(enum: ActivationStatus::class)]
    public ?string $activation_status;

    /**
     * Filter results by a list of phone numbers.
     *
     * @var list<string>|null $phone_number
     */
    #[Optional(list: 'string')]
    public ?array $phone_number;

    /**
     * Filter results by portability status.
     *
     * @var value-of<PortabilityStatus>|null $portability_status
     */
    #[Optional(enum: PortabilityStatus::class)]
    public ?string $portability_status;

    /**
     * Filter results by a list of porting order ids.
     *
     * @var list<string>|null $porting_order_id
     */
    #[Optional(list: 'string')]
    public ?array $porting_order_id;

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
     * @var string|list<string>|null $support_key
     */
    #[Optional(union: SupportKey::class)]
    public string|array|null $support_key;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activation_status
     * @param list<string> $phone_number
     * @param PortabilityStatus|value-of<PortabilityStatus> $portability_status
     * @param list<string> $porting_order_id
     * @param UnionMember0|list<UnionMember1|value-of<UnionMember1>>|value-of<UnionMember0> $status
     * @param string|list<string> $support_key
     */
    public static function with(
        ActivationStatus|string|null $activation_status = null,
        ?array $phone_number = null,
        PortabilityStatus|string|null $portability_status = null,
        ?array $porting_order_id = null,
        UnionMember0|array|string|null $status = null,
        string|array|null $support_key = null,
    ): self {
        $obj = new self;

        null !== $activation_status && $obj['activation_status'] = $activation_status;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $portability_status && $obj['portability_status'] = $portability_status;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $status && $obj['status'] = $status;
        null !== $support_key && $obj['support_key'] = $support_key;

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
        $obj['activation_status'] = $activationStatus;

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
        $obj['phone_number'] = $phoneNumber;

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
        $obj['portability_status'] = $portabilityStatus;

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
        $obj['porting_order_id'] = $portingOrderID;

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
        $obj['support_key'] = $supportKey;

        return $obj;
    }
}

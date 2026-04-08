<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\ActivationStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\PortabilityStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\PortingOrderSingleStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\SupportKey;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status].
 *
 * @phpstan-import-type StatusVariants from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status
 * @phpstan-import-type SupportKeyVariants from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\SupportKey
 * @phpstan-import-type StatusShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status
 * @phpstan-import-type SupportKeyShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\SupportKey
 *
 * @phpstan-type FilterShape = array{
 *   activationStatus?: null|ActivationStatus|value-of<ActivationStatus>,
 *   phoneNumber?: list<string>|null,
 *   portabilityStatus?: null|PortabilityStatus|value-of<PortabilityStatus>,
 *   portingOrderID?: list<string>|null,
 *   status?: StatusShape|null,
 *   supportKey?: SupportKeyShape|null,
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
     * @var StatusVariants|null $status
     */
    #[Optional(union: Status::class)]
    public array|string|null $status;

    /**
     * Filter results by support key(s). Originally: filter[support_key][eq], filter[support_key][in][].
     *
     * @var SupportKeyVariants|null $supportKey
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
     * @param ActivationStatus|value-of<ActivationStatus>|null $activationStatus
     * @param list<string>|null $phoneNumber
     * @param PortabilityStatus|value-of<PortabilityStatus>|null $portabilityStatus
     * @param list<string>|null $portingOrderID
     * @param StatusShape|null $status
     * @param SupportKeyShape|null $supportKey
     */
    public static function with(
        ActivationStatus|string|null $activationStatus = null,
        ?array $phoneNumber = null,
        PortabilityStatus|string|null $portabilityStatus = null,
        ?array $portingOrderID = null,
        PortingOrderSingleStatus|array|string|null $status = null,
        string|array|null $supportKey = null,
    ): self {
        $self = new self;

        null !== $activationStatus && $self['activationStatus'] = $activationStatus;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $portabilityStatus && $self['portabilityStatus'] = $portabilityStatus;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $status && $self['status'] = $status;
        null !== $supportKey && $self['supportKey'] = $supportKey;

        return $self;
    }

    /**
     * Filter results by activation status.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     */
    public function withActivationStatus(
        ActivationStatus|string $activationStatus
    ): self {
        $self = clone $this;
        $self['activationStatus'] = $activationStatus;

        return $self;
    }

    /**
     * Filter results by a list of phone numbers.
     *
     * @param list<string> $phoneNumber
     */
    public function withPhoneNumber(array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Filter results by portability status.
     *
     * @param PortabilityStatus|value-of<PortabilityStatus> $portabilityStatus
     */
    public function withPortabilityStatus(
        PortabilityStatus|string $portabilityStatus
    ): self {
        $self = clone $this;
        $self['portabilityStatus'] = $portabilityStatus;

        return $self;
    }

    /**
     * Filter results by a list of porting order ids.
     *
     * @param list<string> $portingOrderID
     */
    public function withPortingOrderID(array $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Filter porting orders by status(es). Originally: filter[status], filter[status][in][].
     *
     * @param StatusShape $status
     */
    public function withStatus(
        PortingOrderSingleStatus|array|string $status
    ): self {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter results by support key(s). Originally: filter[support_key][eq], filter[support_key][in][].
     *
     * @param SupportKeyShape $supportKey
     */
    public function withSupportKey(string|array $supportKey): self
    {
        $self = clone $this;
        $self['supportKey'] = $supportKey;

        return $self;
    }
}

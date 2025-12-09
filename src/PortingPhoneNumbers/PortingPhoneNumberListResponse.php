<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\ActivationStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\PhoneNumberType;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\PortabilityStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\PortingOrderStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data\RequirementsStatus;

/**
 * @phpstan-type PortingPhoneNumberListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class PortingPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<PortingPhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
     *   activationStatus?: value-of<ActivationStatus>|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portabilityStatus?: value-of<PortabilityStatus>|null,
     *   portingOrderID?: string|null,
     *   portingOrderStatus?: value-of<PortingOrderStatus>|null,
     *   recordType?: string|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   supportKey?: string|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   activationStatus?: value-of<ActivationStatus>|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portabilityStatus?: value-of<PortabilityStatus>|null,
     *   portingOrderID?: string|null,
     *   portingOrderStatus?: value-of<PortingOrderStatus>|null,
     *   recordType?: string|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   supportKey?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}

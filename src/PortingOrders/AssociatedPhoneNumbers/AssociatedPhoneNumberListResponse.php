<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberType;

/**
 * @phpstan-type AssociatedPhoneNumberListResponseShape = array{
 *   data?: list<PortingAssociatedPhoneNumber>|null, meta?: PaginationMeta|null
 * }
 */
final class AssociatedPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<AssociatedPhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<PortingAssociatedPhoneNumber>|null $data */
    #[Api(list: PortingAssociatedPhoneNumber::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   phone_number_range?: PhoneNumberRange|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     * @param list<PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   phone_number_range?: PhoneNumberRange|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}

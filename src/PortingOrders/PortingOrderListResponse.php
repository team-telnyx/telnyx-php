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
     *   activation_settings?: PortingOrderActivationSettings|null,
     *   additional_steps?: list<value-of<AdditionalStep>>|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_group_reference?: string|null,
     *   customer_reference?: string|null,
     *   description?: string|null,
     *   documents?: PortingOrderDocuments|null,
     *   end_user?: PortingOrderEndUser|null,
     *   messaging?: PortingOrderMessaging|null,
     *   misc?: PortingOrderMisc|null,
     *   old_service_provider_ocn?: string|null,
     *   parent_support_key?: string|null,
     *   phone_number_configuration?: PortingOrderPhoneNumberConfiguration|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   porting_phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   requirements?: list<PortingOrderRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: PortingOrderStatus|null,
     *   support_key?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_feedback?: PortingOrderUserFeedback|null,
     *   user_id?: string|null,
     *   webhook_url?: string|null,
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
     * @param list<PortingOrder|array{
     *   id?: string|null,
     *   activation_settings?: PortingOrderActivationSettings|null,
     *   additional_steps?: list<value-of<AdditionalStep>>|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_group_reference?: string|null,
     *   customer_reference?: string|null,
     *   description?: string|null,
     *   documents?: PortingOrderDocuments|null,
     *   end_user?: PortingOrderEndUser|null,
     *   messaging?: PortingOrderMessaging|null,
     *   misc?: PortingOrderMisc|null,
     *   old_service_provider_ocn?: string|null,
     *   parent_support_key?: string|null,
     *   phone_number_configuration?: PortingOrderPhoneNumberConfiguration|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   porting_phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   requirements?: list<PortingOrderRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: PortingOrderStatus|null,
     *   support_key?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_feedback?: PortingOrderUserFeedback|null,
     *   user_id?: string|null,
     *   webhook_url?: string|null,
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

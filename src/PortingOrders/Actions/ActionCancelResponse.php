<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PortingOrders\Actions\ActionCancelResponse\Meta;
use Telnyx\PortingOrders\PortingOrder;
use Telnyx\PortingOrders\PortingOrder\AdditionalStep;
use Telnyx\PortingOrders\PortingOrder\PhoneNumberType;
use Telnyx\PortingOrders\PortingOrderActivationSettings;
use Telnyx\PortingOrders\PortingOrderDocuments;
use Telnyx\PortingOrders\PortingOrderEndUser;
use Telnyx\PortingOrders\PortingOrderMessaging;
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration;
use Telnyx\PortingOrders\PortingOrderRequirement;
use Telnyx\PortingOrders\PortingOrderUserFeedback;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-type ActionCancelResponseShape = array{
 *   data?: PortingOrder|null, meta?: Meta|null
 * }
 */
final class ActionCancelResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionCancelResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortingOrder $data;

    #[Api(optional: true)]
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
     * } $data
     * @param Meta|array{phone_numbers_url?: string|null} $meta
     */
    public static function with(
        PortingOrder|array|null $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param PortingOrder|array{
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
     * } $data
     */
    public function withData(PortingOrder|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{phone_numbers_url?: string|null} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}

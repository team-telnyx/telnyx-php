<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NumberHealthMetrics;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\PhoneNumberWithMessagingSettings\Features;
use Telnyx\PhoneNumberWithMessagingSettings\RecordType;
use Telnyx\PhoneNumberWithMessagingSettings\Type;

/**
 * @phpstan-type MessagingGetResponseShape = array{
 *   data?: PhoneNumberWithMessagingSettings|null
 * }
 */
final class MessagingGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PhoneNumberWithMessagingSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberWithMessagingSettings|array{
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   eligible_messaging_products?: list<string>|null,
     *   features?: Features|null,
     *   health?: NumberHealthMetrics|null,
     *   messaging_product?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   traffic_type?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PhoneNumberWithMessagingSettings|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PhoneNumberWithMessagingSettings|array{
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   eligible_messaging_products?: list<string>|null,
     *   features?: Features|null,
     *   health?: NumberHealthMetrics|null,
     *   messaging_product?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   traffic_type?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PhoneNumberWithMessagingSettings|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
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
final class MessagingGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingGetResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eligibleMessagingProducts?: list<string>|null,
     *   features?: Features|null,
     *   health?: NumberHealthMetrics|null,
     *   messagingProduct?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   trafficType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PhoneNumberWithMessagingSettings|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumberWithMessagingSettings|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eligibleMessagingProducts?: list<string>|null,
     *   features?: Features|null,
     *   health?: NumberHealthMetrics|null,
     *   messagingProduct?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   trafficType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PhoneNumberWithMessagingSettings|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

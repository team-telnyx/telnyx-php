<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersResponse\Meta;
use Telnyx\NumberHealthMetrics;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\PhoneNumberWithMessagingSettings\Features;
use Telnyx\PhoneNumberWithMessagingSettings\RecordType;
use Telnyx\PhoneNumberWithMessagingSettings\Type;

/**
 * @phpstan-type MessagingProfileListPhoneNumbersResponseShape = array{
 *   data?: list<PhoneNumberWithMessagingSettings>|null, meta?: Meta|null
 * }
 */
final class MessagingProfileListPhoneNumbersResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileListPhoneNumbersResponseShape> */
    use SdkModel;

    /** @var list<PhoneNumberWithMessagingSettings>|null $data */
    #[Optional(list: PhoneNumberWithMessagingSettings::class)]
    public ?array $data;

    #[Optional]
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
     * @param list<PhoneNumberWithMessagingSettings|array{
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
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<PhoneNumberWithMessagingSettings|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}

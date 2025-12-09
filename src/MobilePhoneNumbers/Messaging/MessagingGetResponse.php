<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse\Data;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse\Data\Features;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse\Data\RecordType;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse\Data\Type;

/**
 * @phpstan-type MessagingGetResponseShape = array{data?: Data|null}
 */
final class MessagingGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   features?: Features|null,
     *   messagingProduct?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   trafficType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   features?: Features|null,
     *   messagingProduct?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   trafficType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\Features;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\RecordType;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\Type;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Meta;

/**
 * @phpstan-type MessagingListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class MessagingListResponse implements BaseModel
{
    /** @use SdkModel<MessagingListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
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
     * @param list<Data|array{
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

<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\HostedNumber;
use Telnyx\MessagingHostedNumberOrder;
use Telnyx\MessagingHostedNumberOrder\Status;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListResponse\Meta;

/**
 * @phpstan-type MessagingHostedNumberOrderListResponseShape = array{
 *   data?: list<MessagingHostedNumberOrder>|null, meta?: Meta|null
 * }
 */
final class MessagingHostedNumberOrderListResponse implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderListResponseShape> */
    use SdkModel;

    /** @var list<MessagingHostedNumberOrder>|null $data */
    #[Optional(list: MessagingHostedNumberOrder::class)]
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
     * @param list<MessagingHostedNumberOrder|array{
     *   id?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<HostedNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
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
     * @param list<MessagingHostedNumberOrder|array{
     *   id?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<HostedNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
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

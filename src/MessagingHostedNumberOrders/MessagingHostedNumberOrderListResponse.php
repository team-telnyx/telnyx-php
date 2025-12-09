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
     *   messaging_profile_id?: string|null,
     *   phone_numbers?: list<HostedNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     * }> $data
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<MessagingHostedNumberOrder|array{
     *   id?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers?: list<HostedNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}

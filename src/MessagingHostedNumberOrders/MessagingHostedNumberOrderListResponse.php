<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrder;

/**
 * @phpstan-type messaging_hosted_number_order_list_response = array{
 *   data?: list<MessagingHostedNumberOrder>|null, meta?: PaginationMeta|null
 * }
 */
final class MessagingHostedNumberOrderListResponse implements BaseModel
{
    /** @use SdkModel<messaging_hosted_number_order_list_response> */
    use SdkModel;

    /** @var list<MessagingHostedNumberOrder>|null $data */
    #[Api(list: MessagingHostedNumberOrder::class, optional: true)]
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
     * @param list<MessagingHostedNumberOrder> $data
     */
    public static function with(
        ?array $data = null,
        ?PaginationMeta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<MessagingHostedNumberOrder> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type BillingGroupListResponseShape = array{
 *   data?: list<BillingGroup>|null, meta?: PaginationMeta|null
 * }
 */
final class BillingGroupListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BillingGroupListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<BillingGroup>|null $data */
    #[Api(list: BillingGroup::class, optional: true)]
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
     * @param list<BillingGroup> $data
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
     * @param list<BillingGroup> $data
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

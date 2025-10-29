<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Metadata;

/**
 * @phpstan-type PortoutListResponseShape = array{
 *   data?: list<PortoutDetails>, meta?: Metadata
 * }
 */
final class PortoutListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PortoutListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PortoutDetails>|null $data */
    #[Api(list: PortoutDetails::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Metadata $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortoutDetails> $data
     */
    public static function with(?array $data = null, ?Metadata $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<PortoutDetails> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Metadata $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}

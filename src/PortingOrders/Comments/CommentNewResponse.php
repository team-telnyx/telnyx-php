<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PortingOrders\Comments\CommentNewResponse\Data;
use Telnyx\PortingOrders\Comments\CommentNewResponse\Data\UserType;

/**
 * @phpstan-type CommentNewResponseShape = array{data?: Data|null}
 */
final class CommentNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CommentNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   body?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   user_type?: value-of<UserType>|null,
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
     *   body?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   user_type?: value-of<UserType>|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

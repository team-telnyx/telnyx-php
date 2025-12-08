<?php

declare(strict_types=1);

namespace Telnyx\Porting;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\PortingListUkCarriersResponse\Data;

/**
 * @phpstan-type PortingListUkCarriersResponseShape = array{data?: list<Data>|null}
 */
final class PortingListUkCarriersResponse implements BaseModel
{
    /** @use SdkModel<PortingListUkCarriersResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

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
     *   alternative_cupids?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   cupid?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   alternative_cupids?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   cupid?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

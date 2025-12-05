<?php

declare(strict_types=1);

namespace Telnyx\Wireless;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Wireless\WirelessGetRegionsResponse\Data;

/**
 * @phpstan-type WirelessGetRegionsResponseShape = array{data?: list<Data>|null}
 */
final class WirelessGetRegionsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<WirelessGetRegionsResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
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
     *   code: string,
     *   name: string,
     *   inserted_at?: \DateTimeInterface|null,
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
     *   code: string,
     *   name: string,
     *   inserted_at?: \DateTimeInterface|null,
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

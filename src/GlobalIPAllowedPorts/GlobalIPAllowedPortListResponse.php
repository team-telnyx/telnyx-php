<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAllowedPorts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse\Data;

/**
 * @phpstan-type GlobalIPAllowedPortListResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class GlobalIPAllowedPortListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<GlobalIPAllowedPortListResponseShape> */
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
     *   id?: string|null,
     *   first_port?: int|null,
     *   last_port?: int|null,
     *   name?: string|null,
     *   protocol_code?: string|null,
     *   record_type?: string|null,
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
     *   first_port?: int|null,
     *   last_port?: int|null,
     *   name?: string|null,
     *   protocol_code?: string|null,
     *   record_type?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

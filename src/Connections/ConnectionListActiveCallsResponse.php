<?php

declare(strict_types=1);

namespace Telnyx\Connections;

use Telnyx\Connections\ConnectionListActiveCallsResponse\Data;
use Telnyx\Connections\ConnectionListActiveCallsResponse\Data\RecordType;
use Telnyx\Connections\ConnectionListActiveCallsResponse\Meta;
use Telnyx\Connections\ConnectionListActiveCallsResponse\Meta\Cursors;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConnectionListActiveCallsResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class ConnectionListActiveCallsResponse implements BaseModel
{
    /** @use SdkModel<ConnectionListActiveCallsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   call_control_id: string,
     *   call_duration: int,
     *   call_leg_id: string,
     *   call_session_id: string,
     *   client_state: string,
     *   record_type: value-of<RecordType>,
     * }> $data
     * @param Meta|array{
     *   cursors?: Cursors|null,
     *   next?: string|null,
     *   previous?: string|null,
     *   total_items?: int|null,
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
     * @param list<Data|array{
     *   call_control_id: string,
     *   call_duration: int,
     *   call_leg_id: string,
     *   call_session_id: string,
     *   client_state: string,
     *   record_type: value-of<RecordType>,
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
     *   cursors?: Cursors|null,
     *   next?: string|null,
     *   previous?: string|null,
     *   total_items?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}

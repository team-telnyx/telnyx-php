<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\Fax\Direction;
use Telnyx\Faxes\Fax\Quality;
use Telnyx\Faxes\Fax\RecordType;
use Telnyx\Faxes\Fax\Status;

/**
 * @phpstan-type FaxListResponseShape = array{data?: list<Fax>|null, meta?: mixed}
 */
final class FaxListResponse implements BaseModel
{
    /** @use SdkModel<FaxListResponseShape> */
    use SdkModel;

    /** @var list<Fax>|null $data */
    #[Api(list: Fax::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public mixed $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Fax|array{
     *   id?: string|null,
     *   client_state?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   direction?: value-of<Direction>|null,
     *   from?: string|null,
     *   from_display_name?: string|null,
     *   media_name?: string|null,
     *   media_url?: string|null,
     *   preview_url?: string|null,
     *   quality?: value-of<Quality>|null,
     *   record_type?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   store_media?: bool|null,
     *   stored_media_url?: string|null,
     *   to?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }> $data
     */
    public static function with(?array $data = null, mixed $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Fax|array{
     *   id?: string|null,
     *   client_state?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   direction?: value-of<Direction>|null,
     *   from?: string|null,
     *   from_display_name?: string|null,
     *   media_name?: string|null,
     *   media_url?: string|null,
     *   preview_url?: string|null,
     *   quality?: value-of<Quality>|null,
     *   record_type?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   store_media?: bool|null,
     *   stored_media_url?: string|null,
     *   to?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    public function withMeta(mixed $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}

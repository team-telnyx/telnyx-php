<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Faxes\Fax\Direction;
use Telnyx\Faxes\Fax\Quality;
use Telnyx\Faxes\Fax\RecordType;
use Telnyx\Faxes\Fax\Status;

/**
 * @phpstan-type FaxGetResponseShape = array{data?: Fax|null}
 */
final class FaxGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<FaxGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Fax $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Fax|array{
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
     * } $data
     */
    public static function with(Fax|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Fax|array{
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
     * } $data
     */
    public function withData(Fax|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

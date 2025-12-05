<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Portouts\PortoutDetails\Status;

/**
 * @phpstan-type PortoutGetResponseShape = array{data?: PortoutDetails|null}
 */
final class PortoutGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PortoutGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortoutDetails $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortoutDetails|array{
     *   id?: string|null,
     *   already_ported?: bool|null,
     *   authorized_name?: string|null,
     *   carrier_name?: string|null,
     *   city?: string|null,
     *   created_at?: string|null,
     *   current_carrier?: string|null,
     *   end_user_name?: string|null,
     *   foc_date?: string|null,
     *   host_messaging?: bool|null,
     *   inserted_at?: string|null,
     *   lsr?: list<string>|null,
     *   phone_numbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   record_type?: string|null,
     *   rejection_code?: int|null,
     *   requested_foc_date?: string|null,
     *   service_address?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   support_key?: string|null,
     *   updated_at?: string|null,
     *   user_id?: string|null,
     *   vendor?: string|null,
     *   zip?: string|null,
     * } $data
     */
    public static function with(PortoutDetails|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortoutDetails|array{
     *   id?: string|null,
     *   already_ported?: bool|null,
     *   authorized_name?: string|null,
     *   carrier_name?: string|null,
     *   city?: string|null,
     *   created_at?: string|null,
     *   current_carrier?: string|null,
     *   end_user_name?: string|null,
     *   foc_date?: string|null,
     *   host_messaging?: bool|null,
     *   inserted_at?: string|null,
     *   lsr?: list<string>|null,
     *   phone_numbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   record_type?: string|null,
     *   rejection_code?: int|null,
     *   requested_foc_date?: string|null,
     *   service_address?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   support_key?: string|null,
     *   updated_at?: string|null,
     *   user_id?: string|null,
     *   vendor?: string|null,
     *   zip?: string|null,
     * } $data
     */
    public function withData(PortoutDetails|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

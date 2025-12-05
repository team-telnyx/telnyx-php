<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse\Data;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse\Data\RecordType;

/**
 * @phpstan-type RcInviteTestNumberResponseShape = array{data: Data}
 */
final class RcInviteTestNumberResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RcInviteTestNumberResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Data $data;

    /**
     * `new RcInviteTestNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcInviteTestNumberResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcInviteTestNumberResponse)->withData(...)
     * ```
     */
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
     *   agent_id?: string|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   status?: string|null,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   agent_id?: string|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   status?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Messaging\Rcs\RcsCapabilities\RecordType;

/**
 * @phpstan-type RcGetCapabilitiesResponseShape = array{
 *   data?: RcsCapabilities|null
 * }
 */
final class RcGetCapabilitiesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RcGetCapabilitiesResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?RcsCapabilities $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RcsCapabilities|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   features?: list<string>|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     * } $data
     */
    public static function with(RcsCapabilities|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param RcsCapabilities|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   features?: list<string>|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(RcsCapabilities|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

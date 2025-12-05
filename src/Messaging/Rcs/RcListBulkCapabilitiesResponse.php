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
 * @phpstan-type RcListBulkCapabilitiesResponseShape = array{
 *   data?: list<RcsCapabilities>|null
 * }
 */
final class RcListBulkCapabilitiesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RcListBulkCapabilitiesResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<RcsCapabilities>|null $data */
    #[Api(list: RcsCapabilities::class, optional: true)]
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
     * @param list<RcsCapabilities|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   features?: list<string>|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<RcsCapabilities|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   features?: list<string>|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

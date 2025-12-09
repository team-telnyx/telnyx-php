<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcsCapabilities\RecordType;

/**
 * @phpstan-type RcListBulkCapabilitiesResponseShape = array{
 *   data?: list<RcsCapabilities>|null
 * }
 */
final class RcListBulkCapabilitiesResponse implements BaseModel
{
    /** @use SdkModel<RcListBulkCapabilitiesResponseShape> */
    use SdkModel;

    /** @var list<RcsCapabilities>|null $data */
    #[Optional(list: RcsCapabilities::class)]
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
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   features?: list<string>|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
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
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   features?: list<string>|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

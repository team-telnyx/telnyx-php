<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcsCapabilities\RecordType;

/**
 * @phpstan-type RcGetCapabilitiesResponseShape = array{
 *   data?: RcsCapabilities|null
 * }
 */
final class RcGetCapabilitiesResponse implements BaseModel
{
    /** @use SdkModel<RcGetCapabilitiesResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   features?: list<string>|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public static function with(RcsCapabilities|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RcsCapabilities|array{
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   features?: list<string>|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(RcsCapabilities|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Calls\CallDialResponse\Data;
use Telnyx\Calls\CallDialResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallDialResponseShape = array{data?: Data|null}
 */
final class CallDialResponse implements BaseModel
{
    /** @use SdkModel<CallDialResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

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
     *   callControlID: string,
     *   callLegID: string,
     *   callSessionID: string,
     *   isAlive: bool,
     *   recordType: value-of<RecordType>,
     *   callDuration?: int|null,
     *   clientState?: string|null,
     *   endTime?: string|null,
     *   recordingID?: string|null,
     *   startTime?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   callControlID: string,
     *   callLegID: string,
     *   callSessionID: string,
     *   isAlive: bool,
     *   recordType: value-of<RecordType>,
     *   callDuration?: int|null,
     *   clientState?: string|null,
     *   endTime?: string|null,
     *   recordingID?: string|null,
     *   startTime?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

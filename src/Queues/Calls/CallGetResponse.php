<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\Calls\CallGetResponse\Data;
use Telnyx\Queues\Calls\CallGetResponse\Data\RecordType;

/**
 * @phpstan-type CallGetResponseShape = array{data?: Data|null}
 */
final class CallGetResponse implements BaseModel
{
    /** @use SdkModel<CallGetResponseShape> */
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
     *   connectionID: string,
     *   enqueuedAt: string,
     *   from: string,
     *   queueID: string,
     *   queuePosition: int,
     *   recordType: value-of<RecordType>,
     *   to: string,
     *   waitTimeSecs: int,
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
     *   connectionID: string,
     *   enqueuedAt: string,
     *   from: string,
     *   queueID: string,
     *   queuePosition: int,
     *   recordType: value-of<RecordType>,
     *   to: string,
     *   waitTimeSecs: int,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

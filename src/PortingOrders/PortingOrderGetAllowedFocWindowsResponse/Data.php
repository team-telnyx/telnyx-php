<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   endedAt?: \DateTimeInterface,
 *   recordType?: string,
 *   startedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating the end of the range of foc window.
     */
    #[Api('ended_at', optional: true)]
    public ?\DateTimeInterface $endedAt;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating the start of the range of foc window.
     */
    #[Api('started_at', optional: true)]
    public ?\DateTimeInterface $startedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?\DateTimeInterface $endedAt = null,
        ?string $recordType = null,
        ?\DateTimeInterface $startedAt = null,
    ): self {
        $obj = new self;

        null !== $endedAt && $obj->endedAt = $endedAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $startedAt && $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating the end of the range of foc window.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj->endedAt = $endedAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating the start of the range of foc window.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }
}

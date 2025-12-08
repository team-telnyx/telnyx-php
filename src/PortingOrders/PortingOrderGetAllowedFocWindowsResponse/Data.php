<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   ended_at?: \DateTimeInterface|null,
 *   record_type?: string|null,
 *   started_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating the end of the range of foc window.
     */
    #[Optional]
    public ?\DateTimeInterface $ended_at;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating the start of the range of foc window.
     */
    #[Optional]
    public ?\DateTimeInterface $started_at;

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
        ?\DateTimeInterface $ended_at = null,
        ?string $record_type = null,
        ?\DateTimeInterface $started_at = null,
    ): self {
        $obj = new self;

        null !== $ended_at && $obj['ended_at'] = $ended_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $started_at && $obj['started_at'] = $started_at;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating the end of the range of foc window.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj['ended_at'] = $endedAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating the start of the range of foc window.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['started_at'] = $startedAt;

        return $obj;
    }
}

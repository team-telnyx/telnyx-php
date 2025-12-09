<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   endedAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   startedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating the end of the range of foc window.
     */
    #[Optional('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating the start of the range of foc window.
     */
    #[Optional('started_at')]
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
        $self = new self;

        null !== $endedAt && $self['endedAt'] = $endedAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $startedAt && $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating the end of the range of foc window.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating the start of the range of foc window.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }
}

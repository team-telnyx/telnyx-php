<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse;

use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   level?: string|null,
 *   message?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $level;

    #[Optional]
    public ?string $message;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    #[Optional]
    public ?\DateTimeInterface $timestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $level = null,
        ?string $message = null,
        RecordType|string|null $recordType = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        null !== $level && $self['level'] = $level;
        null !== $message && $self['message'] = $message;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withLevel(string $level): self
    {
        $self = clone $this;
        $self['level'] = $level;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}

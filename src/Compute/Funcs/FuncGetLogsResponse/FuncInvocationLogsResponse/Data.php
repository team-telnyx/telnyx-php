<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse;

use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   durationMs?: float|null,
 *   method?: string|null,
 *   path?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   region?: string|null,
 *   requestSizeBytes?: int|null,
 *   responseSizeBytes?: int|null,
 *   statusCode?: int|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('duration_ms')]
    public ?float $durationMs;

    #[Optional]
    public ?string $method;

    #[Optional]
    public ?string $path;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    #[Optional]
    public ?string $region;

    #[Optional('request_size_bytes')]
    public ?int $requestSizeBytes;

    #[Optional('response_size_bytes')]
    public ?int $responseSizeBytes;

    #[Optional('status_code')]
    public ?int $statusCode;

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
        ?float $durationMs = null,
        ?string $method = null,
        ?string $path = null,
        RecordType|string|null $recordType = null,
        ?string $region = null,
        ?int $requestSizeBytes = null,
        ?int $responseSizeBytes = null,
        ?int $statusCode = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        null !== $durationMs && $self['durationMs'] = $durationMs;
        null !== $method && $self['method'] = $method;
        null !== $path && $self['path'] = $path;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $region && $self['region'] = $region;
        null !== $requestSizeBytes && $self['requestSizeBytes'] = $requestSizeBytes;
        null !== $responseSizeBytes && $self['responseSizeBytes'] = $responseSizeBytes;
        null !== $statusCode && $self['statusCode'] = $statusCode;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withDurationMs(float $durationMs): self
    {
        $self = clone $this;
        $self['durationMs'] = $durationMs;

        return $self;
    }

    public function withMethod(string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }

    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

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

    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    public function withRequestSizeBytes(int $requestSizeBytes): self
    {
        $self = clone $this;
        $self['requestSizeBytes'] = $requestSizeBytes;

        return $self;
    }

    public function withResponseSizeBytes(int $responseSizeBytes): self
    {
        $self = clone $this;
        $self['responseSizeBytes'] = $responseSizeBytes;

        return $self;
    }

    public function withStatusCode(int $statusCode): self
    {
        $self = clone $this;
        $self['statusCode'] = $statusCode;

        return $self;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}

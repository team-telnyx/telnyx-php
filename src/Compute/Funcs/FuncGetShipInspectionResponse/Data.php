<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetShipInspectionResponse;

use Telnyx\Compute\Funcs\FuncGetShipInspectionResponse\Data\RecordType;
use Telnyx\Compute\Funcs\FuncGetShipInspectionResponse\Data\Stage;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   reason?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   runtime?: string|null,
 *   snippet?: string|null,
 *   stage?: null|Stage|value-of<Stage>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $reason;

    /**
     * Stable record type retained by both inspection path aliases.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    #[Optional]
    public ?string $runtime;

    #[Optional]
    public ?string $snippet;

    /** @var value-of<Stage>|null $stage */
    #[Optional(enum: Stage::class)]
    public ?string $stage;

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
     * @param Stage|value-of<Stage>|null $stage
     */
    public static function with(
        ?\DateTimeInterface $createdAt = null,
        ?string $reason = null,
        RecordType|string|null $recordType = null,
        ?string $runtime = null,
        ?string $snippet = null,
        Stage|string|null $stage = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $reason && $self['reason'] = $reason;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $runtime && $self['runtime'] = $runtime;
        null !== $snippet && $self['snippet'] = $snippet;
        null !== $stage && $self['stage'] = $stage;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Stable record type retained by both inspection path aliases.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRuntime(string $runtime): self
    {
        $self = clone $this;
        $self['runtime'] = $runtime;

        return $self;
    }

    public function withSnippet(string $snippet): self
    {
        $self = clone $this;
        $self['snippet'] = $snippet;

        return $self;
    }

    /**
     * @param Stage|value-of<Stage> $stage
     */
    public function withStage(Stage|string $stage): self
    {
        $self = clone $this;
        $self['stage'] = $stage;

        return $self;
    }
}

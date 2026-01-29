<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   accepted?: bool|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The UUID of the location.
     */
    #[Optional]
    public ?string $id;

    /**
     * Indicates if the address suggestions are accepted.
     */
    #[Optional]
    public ?bool $accepted;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

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
        ?string $id = null,
        ?bool $accepted = null,
        RecordType|string|null $recordType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $accepted && $self['accepted'] = $accepted;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The UUID of the location.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Indicates if the address suggestions are accepted.
     */
    public function withAccepted(bool $accepted): self
    {
        $self = clone $this;
        $self['accepted'] = $accepted;

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
}

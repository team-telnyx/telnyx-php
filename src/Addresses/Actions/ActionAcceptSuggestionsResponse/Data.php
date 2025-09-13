<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse\Data\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id?: string, accepted?: bool, recordType?: value-of<RecordType>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The UUID of the location.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Indicates if the address suggestions are accepted.
     */
    #[Api(optional: true)]
    public ?bool $accepted;

    /** @var value-of<RecordType>|null $recordType */
    #[Api('record_type', enum: RecordType::class, optional: true)]
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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $id = null,
        ?bool $accepted = null,
        RecordType|string|null $recordType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $accepted && $obj->accepted = $accepted;
        null !== $recordType && $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * The UUID of the location.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Indicates if the address suggestions are accepted.
     */
    public function withAccepted(bool $accepted): self
    {
        $obj = clone $this;
        $obj->accepted = $accepted;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }
}

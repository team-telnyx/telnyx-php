<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   labels: list<string>,
 *   recordType: RecordType|value-of<RecordType>,
 *   inboxID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<string> $labels */
    #[Required(list: 'string')]
    public array $labels;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Optional('inbox_id')]
    public ?string $inboxID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., labels: ..., recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withLabels(...)->withRecordType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $labels
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        array $labels,
        RecordType|string $recordType,
        ?string $inboxID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['labels'] = $labels;
        $self['recordType'] = $recordType;

        null !== $inboxID && $self['inboxID'] = $inboxID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

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

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }
}

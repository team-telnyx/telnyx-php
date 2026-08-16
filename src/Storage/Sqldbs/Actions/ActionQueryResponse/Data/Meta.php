<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   changes?: int|null,
 *   duration?: float|null,
 *   lastRowID?: int|null,
 *   rowsRead?: int|null,
 *   rowsWritten?: int|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Number of rows added, changed, or removed by the statement.
     */
    #[Optional]
    public ?int $changes;

    /**
     * Wall-clock duration of the statement, in milliseconds.
     */
    #[Optional]
    public ?float $duration;

    /**
     * Rowid of the last inserted row, when applicable.
     */
    #[Optional('last_row_id')]
    public ?int $lastRowID;

    #[Optional('rows_read')]
    public ?int $rowsRead;

    #[Optional('rows_written')]
    public ?int $rowsWritten;

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
        ?int $changes = null,
        ?float $duration = null,
        ?int $lastRowID = null,
        ?int $rowsRead = null,
        ?int $rowsWritten = null,
    ): self {
        $self = new self;

        null !== $changes && $self['changes'] = $changes;
        null !== $duration && $self['duration'] = $duration;
        null !== $lastRowID && $self['lastRowID'] = $lastRowID;
        null !== $rowsRead && $self['rowsRead'] = $rowsRead;
        null !== $rowsWritten && $self['rowsWritten'] = $rowsWritten;

        return $self;
    }

    /**
     * Number of rows added, changed, or removed by the statement.
     */
    public function withChanges(int $changes): self
    {
        $self = clone $this;
        $self['changes'] = $changes;

        return $self;
    }

    /**
     * Wall-clock duration of the statement, in milliseconds.
     */
    public function withDuration(float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * Rowid of the last inserted row, when applicable.
     */
    public function withLastRowID(int $lastRowID): self
    {
        $self = clone $this;
        $self['lastRowID'] = $lastRowID;

        return $self;
    }

    public function withRowsRead(int $rowsRead): self
    {
        $self = clone $this;
        $self['rowsRead'] = $rowsRead;

        return $self;
    }

    public function withRowsWritten(int $rowsWritten): self
    {
        $self = clone $this;
        $self['rowsWritten'] = $rowsWritten;

        return $self;
    }
}

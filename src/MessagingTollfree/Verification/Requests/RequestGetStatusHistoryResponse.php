<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingTollfree\Verification\Requests\RequestGetStatusHistoryResponse\Record;

/**
 * A paginated response.
 *
 * @phpstan-import-type RecordShape from \Telnyx\MessagingTollfree\Verification\Requests\RequestGetStatusHistoryResponse\Record
 *
 * @phpstan-type RequestGetStatusHistoryResponseShape = array{
 *   records: list<Record|RecordShape>, totalRecords: int
 * }
 */
final class RequestGetStatusHistoryResponse implements BaseModel
{
    /** @use SdkModel<RequestGetStatusHistoryResponseShape> */
    use SdkModel;

    /**
     * The records yielded by this request.
     *
     * @var list<Record> $records
     */
    #[Required(list: Record::class)]
    public array $records;

    /**
     * The total amount of records for these query parameters.
     */
    #[Required('total_records')]
    public int $totalRecords;

    /**
     * `new RequestGetStatusHistoryResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequestGetStatusHistoryResponse::with(records: ..., totalRecords: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RequestGetStatusHistoryResponse)->withRecords(...)->withTotalRecords(...)
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
     * @param list<Record|RecordShape> $records
     */
    public static function with(
        array $records = [],
        int $totalRecords = 0
    ): self {
        $self = new self;

        $self['records'] = $records;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }

    /**
     * The records yielded by this request.
     *
     * @param list<Record|RecordShape> $records
     */
    public function withRecords(array $records): self
    {
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }

    /**
     * The total amount of records for these query parameters.
     */
    public function withTotalRecords(int $totalRecords): self
    {
        $self = clone $this;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }
}

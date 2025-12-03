<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * A paginated response.
 *
 * @phpstan-type RequestListResponseShape = array{
 *   records?: list<VerificationRequestStatus>|null, total_records?: int|null
 * }
 */
final class RequestListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RequestListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The records yielded by this request.
     *
     * @var list<VerificationRequestStatus>|null $records
     */
    #[Api(list: VerificationRequestStatus::class, optional: true)]
    public ?array $records;

    /**
     * The total amount of records for these query parameters.
     */
    #[Api(optional: true)]
    public ?int $total_records;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<VerificationRequestStatus> $records
     */
    public static function with(
        ?array $records = null,
        ?int $total_records = null
    ): self {
        $obj = new self;

        null !== $records && $obj->records = $records;
        null !== $total_records && $obj->total_records = $total_records;

        return $obj;
    }

    /**
     * The records yielded by this request.
     *
     * @param list<VerificationRequestStatus> $records
     */
    public function withRecords(array $records): self
    {
        $obj = clone $this;
        $obj->records = $records;

        return $obj;
    }

    /**
     * The total amount of records for these query parameters.
     */
    public function withTotalRecords(int $totalRecords): self
    {
        $obj = clone $this;
        $obj->total_records = $totalRecords;

        return $obj;
    }
}

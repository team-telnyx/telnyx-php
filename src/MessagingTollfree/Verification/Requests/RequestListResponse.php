<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A paginated response.
 *
 * @phpstan-type request_list_response = array{
 *   records?: list<VerificationRequestStatus>, totalRecords?: int
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class RequestListResponse implements BaseModel
{
    /** @use SdkModel<request_list_response> */
    use SdkModel;

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
    #[Api('total_records', optional: true)]
    public ?int $totalRecords;

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
        ?int $totalRecords = null
    ): self {
        $obj = new self;

        null !== $records && $obj->records = $records;
        null !== $totalRecords && $obj->totalRecords = $totalRecords;

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
        $obj->totalRecords = $totalRecords;

        return $obj;
    }
}

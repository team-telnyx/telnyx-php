<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get the history of status changes for a verification request.
 *
 * Returns a paginated list of historical status changes including the reason for each change and when it occurred.
 *
 * @see Telnyx\Services\MessagingTollfree\Verification\RequestsService::retrieveStatusHistory()
 *
 * @phpstan-type RequestRetrieveStatusHistoryParamsShape = array{
 *   pageNumber: int, pageSize: int
 * }
 */
final class RequestRetrieveStatusHistoryParams implements BaseModel
{
    /** @use SdkModel<RequestRetrieveStatusHistoryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $pageNumber;

    /**
     * Request this many records per page. This value is automatically clamped if the provided value is too large.
     */
    #[Required]
    public int $pageSize;

    /**
     * `new RequestRetrieveStatusHistoryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequestRetrieveStatusHistoryParams::with(pageNumber: ..., pageSize: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RequestRetrieveStatusHistoryParams)->withPageNumber(...)->withPageSize(...)
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
     */
    public static function with(int $pageNumber, int $pageSize): self
    {
        $self = new self;

        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Request this many records per page. This value is automatically clamped if the provided value is too large.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}

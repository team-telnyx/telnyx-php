<?php

declare(strict_types=1);

namespace Telnyx\CallReasons;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telnyx maintains a library of pre-vetted call-reason phrases (e.g. "Appointment reminders", "Billing inquiries") that carry through DIR vetting smoothly. You can use any string that fits your use case in `DirCreateRequest.call_reasons`, but matching one of these reduces the chance the vetting team flags the phrasing for clarification.
 *
 * @see Telnyx\Services\CallReasonsService::list()
 *
 * @phpstan-type CallReasonListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class CallReasonListParams implements BaseModel
{
    /** @use SdkModel<CallReasonListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Default `100` for this endpoint (the call-reason library is small and most callers want the whole list in one call). Maximum 250; values above are clamped to 250.
     */
    #[Optional]
    public ?int $pageSize;

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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Items per page. Default `100` for this endpoint (the call-reason library is small and most callers want the whole list in one call). Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;

/**
 * @phpstan-type VoiceGetResponseShape = array{data?: CdrDetailedReqResponse|null}
 */
final class VoiceGetResponse implements BaseModel
{
    /** @use SdkModel<VoiceGetResponseShape> */
    use SdkModel;

    /**
     * Response object for CDR detailed report.
     */
    #[Optional]
    public ?CdrDetailedReqResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CdrDetailedReqResponse|array{
     *   id?: string|null,
     *   call_types?: list<int>|null,
     *   connections?: list<int>|null,
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   filters?: list<Filter>|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   record_types?: list<int>|null,
     *   report_name?: string|null,
     *   report_url?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   start_time?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(CdrDetailedReqResponse|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * Response object for CDR detailed report.
     *
     * @param CdrDetailedReqResponse|array{
     *   id?: string|null,
     *   call_types?: list<int>|null,
     *   connections?: list<int>|null,
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   filters?: list<Filter>|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   record_types?: list<int>|null,
     *   report_name?: string|null,
     *   report_url?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   start_time?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(CdrDetailedReqResponse|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

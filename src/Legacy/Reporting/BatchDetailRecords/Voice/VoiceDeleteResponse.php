<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;

/**
 * @phpstan-type VoiceDeleteResponseShape = array{
 *   data?: CdrDetailedReqResponse|null
 * }
 */
final class VoiceDeleteResponse implements BaseModel
{
    /** @use SdkModel<VoiceDeleteResponseShape> */
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
     *   callTypes?: list<int>|null,
     *   connections?: list<int>|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   filters?: list<Filter>|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   recordTypes?: list<int>|null,
     *   reportName?: string|null,
     *   reportURL?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   startTime?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updatedAt?: string|null,
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
     *   callTypes?: list<int>|null,
     *   connections?: list<int>|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   filters?: list<Filter>|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   recordTypes?: list<int>|null,
     *   reportName?: string|null,
     *   reportURL?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   startTime?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(CdrDetailedReqResponse|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

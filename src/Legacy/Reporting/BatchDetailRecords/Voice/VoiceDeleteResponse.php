<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CdrDetailedReqResponseShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\CdrDetailedReqResponse
 *
 * @phpstan-type VoiceDeleteResponseShape = array{
 *   data?: null|CdrDetailedReqResponse|CdrDetailedReqResponseShape
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
     * @param CdrDetailedReqResponse|CdrDetailedReqResponseShape|null $data
     */
    public static function with(CdrDetailedReqResponse|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Response object for CDR detailed report.
     *
     * @param CdrDetailedReqResponse|CdrDetailedReqResponseShape $data
     */
    public function withData(CdrDetailedReqResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

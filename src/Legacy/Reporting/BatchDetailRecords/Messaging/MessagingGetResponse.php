<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MdrDetailReportResponseShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse
 *
 * @phpstan-type MessagingGetResponseShape = array{
 *   data?: null|MdrDetailReportResponse|MdrDetailReportResponseShape
 * }
 */
final class MessagingGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MdrDetailReportResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MdrDetailReportResponse|MdrDetailReportResponseShape|null $data
     */
    public static function with(
        MdrDetailReportResponse|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MdrDetailReportResponse|MdrDetailReportResponseShape $data
     */
    public function withData(MdrDetailReportResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

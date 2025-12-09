<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\PortingReport\ReportType;
use Telnyx\Porting\Reports\PortingReport\Status;

/**
 * @phpstan-type ReportNewResponseShape = array{data?: PortingReport|null}
 */
final class ReportNewResponse implements BaseModel
{
    /** @use SdkModel<ReportNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   params?: ExportPortingOrdersCsvReport|null,
     *   recordType?: string|null,
     *   reportType?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(PortingReport|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   params?: ExportPortingOrdersCsvReport|null,
     *   recordType?: string|null,
     *   reportType?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

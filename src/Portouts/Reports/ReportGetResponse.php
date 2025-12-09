<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\PortoutReport\ReportType;
use Telnyx\Portouts\Reports\PortoutReport\Status;

/**
 * @phpstan-type ReportGetResponseShape = array{data?: PortoutReport|null}
 */
final class ReportGetResponse implements BaseModel
{
    /** @use SdkModel<ReportGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortoutReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortoutReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   recordType?: string|null,
     *   reportType?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(PortoutReport|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortoutReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   recordType?: string|null,
     *   reportType?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortoutReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

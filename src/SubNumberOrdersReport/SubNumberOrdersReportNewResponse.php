<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data\Filters;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data\Status;

/**
 * @phpstan-type SubNumberOrdersReportNewResponseShape = array{data?: Data|null}
 */
final class SubNumberOrdersReportNewResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrdersReportNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   filters?: Filters|null,
     *   orderType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   filters?: Filters|null,
     *   orderType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

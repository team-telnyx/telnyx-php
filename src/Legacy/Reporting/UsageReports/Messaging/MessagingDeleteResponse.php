<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingDeleteResponseShape = array{
 *   data?: MdrUsageReportResponseLegacy|null
 * }
 */
final class MessagingDeleteResponse implements BaseModel
{
    /** @use SdkModel<MessagingDeleteResponseShape> */
    use SdkModel;

    /**
     * Legacy V2 MDR usage report response.
     */
    #[Optional]
    public ?MdrUsageReportResponseLegacy $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregationType?: int|null,
     *   connections?: list<string>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: array<string,mixed>|null,
     *   startTime?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        MdrUsageReportResponseLegacy|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Legacy V2 MDR usage report response.
     *
     * @param MdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregationType?: int|null,
     *   connections?: list<string>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: array<string,mixed>|null,
     *   startTime?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(MdrUsageReportResponseLegacy|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

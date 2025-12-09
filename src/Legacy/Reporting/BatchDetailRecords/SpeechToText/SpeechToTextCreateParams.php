<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new Speech to Text batch report request with the specified filters.
 *
 * @see Telnyx\Services\Legacy\Reporting\BatchDetailRecords\SpeechToTextService::create()
 *
 * @phpstan-type SpeechToTextCreateParamsShape = array{
 *   endDate: \DateTimeInterface, startDate: \DateTimeInterface
 * }
 */
final class SpeechToTextCreateParams implements BaseModel
{
    /** @use SdkModel<SpeechToTextCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End date in ISO format with timezone (date range must be up to one month).
     */
    #[Required('end_date')]
    public \DateTimeInterface $endDate;

    /**
     * Start date in ISO format with timezone.
     */
    #[Required('start_date')]
    public \DateTimeInterface $startDate;

    /**
     * `new SpeechToTextCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpeechToTextCreateParams::with(endDate: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpeechToTextCreateParams)->withEndDate(...)->withStartDate(...)
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
    public static function with(
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * End date in ISO format with timezone (date range must be up to one month).
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Start date in ISO format with timezone.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}

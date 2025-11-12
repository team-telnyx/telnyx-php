<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new Speech to Text batch report request with the specified filters.
 *
 * @see Telnyx\STAINLESS_FIXME_Legacy\STAINLESS_FIXME_Reporting\STAINLESS_FIXME_BatchDetailRecords\SpeechToTextService::create()
 *
 * @phpstan-type SpeechToTextCreateParamsShape = array{
 *   end_date: \DateTimeInterface, start_date: \DateTimeInterface
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
    #[Api]
    public \DateTimeInterface $end_date;

    /**
     * Start date in ISO format with timezone.
     */
    #[Api]
    public \DateTimeInterface $start_date;

    /**
     * `new SpeechToTextCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpeechToTextCreateParams::with(end_date: ..., start_date: ...)
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
        \DateTimeInterface $end_date,
        \DateTimeInterface $start_date
    ): self {
        $obj = new self;

        $obj->end_date = $end_date;
        $obj->start_date = $start_date;

        return $obj;
    }

    /**
     * End date in ISO format with timezone (date range must be up to one month).
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->end_date = $endDate;

        return $obj;
    }

    /**
     * Start date in ISO format with timezone.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->start_date = $startDate;

        return $obj;
    }
}

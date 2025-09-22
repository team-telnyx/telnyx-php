<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UsageReportRetrieveSpeechToTextParams); // set properties as needed
 * $client->STAINLESS_FIXME_legacy.reporting.usageReports->retrieveSpeechToText(...$params->toArray());
 * ```
 * Generate and fetch speech to text usage report synchronously. This endpoint will both generate and fetch the speech to text report over a specified time period.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->STAINLESS_FIXME_legacy.reporting.usageReports->retrieveSpeechToText(...$params->toArray());`
 *
 * @see Telnyx\Legacy\Reporting\UsageReports->retrieveSpeechToText
 *
 * @phpstan-type usage_report_retrieve_speech_to_text_params = array{
 *   endDate?: \DateTimeInterface, startDate?: \DateTimeInterface
 * }
 */
final class UsageReportRetrieveSpeechToTextParams implements BaseModel
{
    /** @use SdkModel<usage_report_retrieve_speech_to_text_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?\DateTimeInterface $endDate;

    #[Api(optional: true)]
    public ?\DateTimeInterface $startDate;

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
        ?\DateTimeInterface $endDate = null,
        ?\DateTimeInterface $startDate = null
    ): self {
        $obj = new self;

        null !== $endDate && $obj->endDate = $endDate;
        null !== $startDate && $obj->startDate = $startDate;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }
}

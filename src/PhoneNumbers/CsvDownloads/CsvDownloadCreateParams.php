<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\CsvFormat;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter;

/**
 * Create a CSV download.
 *
 * @see Telnyx\PhoneNumbers\CsvDownloads->create
 *
 * @phpstan-type csv_download_create_params = array{
 *   csvFormat?: CsvFormat|value-of<CsvFormat>, filter?: Filter
 * }
 */
final class CsvDownloadCreateParams implements BaseModel
{
    /** @use SdkModel<csv_download_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'.
     *
     * @var value-of<CsvFormat>|null $csvFormat
     */
    #[Api(enum: CsvFormat::class, optional: true)]
    public ?string $csvFormat;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CsvFormat|value-of<CsvFormat> $csvFormat
     */
    public static function with(
        CsvFormat|string|null $csvFormat = null,
        ?Filter $filter = null
    ): self {
        $obj = new self;

        null !== $csvFormat && $obj['csvFormat'] = $csvFormat;
        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'.
     *
     * @param CsvFormat|value-of<CsvFormat> $csvFormat
     */
    public function withCsvFormat(CsvFormat|string $csvFormat): self
    {
        $obj = clone $this;
        $obj['csvFormat'] = $csvFormat;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}

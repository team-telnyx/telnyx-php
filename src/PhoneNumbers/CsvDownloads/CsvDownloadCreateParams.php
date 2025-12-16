<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\CsvFormat;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter;

/**
 * Create a CSV download.
 *
 * @see Telnyx\Services\PhoneNumbers\CsvDownloadsService::create()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter
 *
 * @phpstan-type CsvDownloadCreateParamsShape = array{
 *   csvFormat?: null|CsvFormat|value-of<CsvFormat>, filter?: FilterShape|null
 * }
 */
final class CsvDownloadCreateParams implements BaseModel
{
    /** @use SdkModel<CsvDownloadCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'.
     *
     * @var value-of<CsvFormat>|null $csvFormat
     */
    #[Optional(enum: CsvFormat::class)]
    public ?string $csvFormat;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     */
    #[Optional]
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
     * @param FilterShape $filter
     */
    public static function with(
        CsvFormat|string|null $csvFormat = null,
        Filter|array|null $filter = null
    ): self {
        $self = new self;

        null !== $csvFormat && $self['csvFormat'] = $csvFormat;
        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'.
     *
     * @param CsvFormat|value-of<CsvFormat> $csvFormat
     */
    public function withCsvFormat(CsvFormat|string $csvFormat): self
    {
        $self = clone $this;
        $self['csvFormat'] = $csvFormat;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}

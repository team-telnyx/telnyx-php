<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams\Page;

/**
 * List CSV downloads.
 *
 * @see Telnyx\Services\PhoneNumbers\CsvDownloadsService::list()
 *
 * @phpstan-type CsvDownloadListParamsShape = array{
 *   page?: Page|array{number?: int|null, size?: int|null}
 * }
 */
final class CsvDownloadListParams implements BaseModel
{
    /** @use SdkModel<CsvDownloadListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $obj = new self;

        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}

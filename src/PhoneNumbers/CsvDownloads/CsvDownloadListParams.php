<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams\Page;

/**
 * List CSV downloads.
 *
 * @see Telnyx\Services\PhoneNumbers\CsvDownloadsService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadListParams\Page
 *
 * @phpstan-type CsvDownloadListParamsShape = array{page?: PageShape|null}
 */
final class CsvDownloadListParams implements BaseModel
{
    /** @use SdkModel<CsvDownloadListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
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
     * @param PageShape $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}

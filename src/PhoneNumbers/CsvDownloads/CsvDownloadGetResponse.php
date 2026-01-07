<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CsvDownloadShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownload
 *
 * @phpstan-type CsvDownloadGetResponseShape = array{
 *   data?: list<CsvDownload|CsvDownloadShape>|null
 * }
 */
final class CsvDownloadGetResponse implements BaseModel
{
    /** @use SdkModel<CsvDownloadGetResponseShape> */
    use SdkModel;

    /** @var list<CsvDownload>|null $data */
    #[Optional(list: CsvDownload::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CsvDownload|CsvDownloadShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<CsvDownload|CsvDownloadShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

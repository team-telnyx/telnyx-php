<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CsvDownloadShape from \Telnyx\PhoneNumbers\CsvDownloads\CsvDownload
 *
 * @phpstan-type CsvDownloadNewResponseShape = array{
 *   data?: list<CsvDownloadShape>|null
 * }
 */
final class CsvDownloadNewResponse implements BaseModel
{
    /** @use SdkModel<CsvDownloadNewResponseShape> */
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
     * @param list<CsvDownloadShape> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<CsvDownloadShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

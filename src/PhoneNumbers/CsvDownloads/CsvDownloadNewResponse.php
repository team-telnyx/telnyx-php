<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownload\Status;

/**
 * @phpstan-type CsvDownloadNewResponseShape = array{data?: list<CsvDownload>|null}
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
     * @param list<CsvDownload|array{
     *   id?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   url?: string|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<CsvDownload|array{
     *   id?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   url?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}

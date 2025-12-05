<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownload\Status;

/**
 * @phpstan-type CsvDownloadGetResponseShape = array{data?: list<CsvDownload>|null}
 */
final class CsvDownloadGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CsvDownloadGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CsvDownload>|null $data */
    #[Api(list: CsvDownload::class, optional: true)]
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

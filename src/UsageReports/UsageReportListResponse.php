<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\UsageReports\UsageReportListResponse\Meta;

/**
 * @phpstan-type UsageReportListResponseShape = array{
 *   data?: list<array<string,mixed>>|null, meta?: Meta|null
 * }
 */
final class UsageReportListResponse implements BaseModel
{
    /** @use SdkModel<UsageReportListResponseShape> */
    use SdkModel;

    /** @var list<array<string,mixed>>|null $data */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<array<string,mixed>> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<array<string,mixed>> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}

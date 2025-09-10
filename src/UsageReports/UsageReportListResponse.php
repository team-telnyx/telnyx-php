<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\UsageReports\UsageReportListResponse\Meta;

/**
 * @phpstan-type usage_report_list_response = array{
 *   data?: list<array<string, mixed>>|null, meta?: Meta|null
 * }
 */
final class UsageReportListResponse implements BaseModel
{
    /** @use SdkModel<usage_report_list_response> */
    use SdkModel;

    /** @var list<array<string, mixed>>|null $data */
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
     * @param list<array<string, mixed>> $data
     */
    public static function with(?array $data = null, ?Meta $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<array<string, mixed>> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}

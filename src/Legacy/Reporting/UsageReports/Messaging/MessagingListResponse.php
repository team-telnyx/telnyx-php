<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingListResponse\Meta;

/**
 * @phpstan-type messaging_list_response = array{
 *   data?: list<MdrUsageReportResponseLegacy>, meta?: Meta
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MessagingListResponse implements BaseModel
{
    /** @use SdkModel<messaging_list_response> */
    use SdkModel;

    /** @var list<MdrUsageReportResponseLegacy>|null $data */
    #[Api(list: MdrUsageReportResponseLegacy::class, optional: true)]
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
     * @param list<MdrUsageReportResponseLegacy> $data
     */
    public static function with(?array $data = null, ?Meta $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<MdrUsageReportResponseLegacy> $data
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

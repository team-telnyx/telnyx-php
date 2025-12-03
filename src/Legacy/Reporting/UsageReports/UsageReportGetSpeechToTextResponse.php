<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type UsageReportGetSpeechToTextResponseShape = array{
 *   data?: array<string,mixed>|null
 * }
 */
final class UsageReportGetSpeechToTextResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UsageReportGetSpeechToTextResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var array<string,mixed>|null $data */
    #[Api(map: 'mixed', optional: true)]
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
     * @param array<string,mixed> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * @param array<string,mixed> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UsageReportGetSpeechToTextResponseShape = array{
 *   data?: array<string,mixed>|null
 * }
 */
final class UsageReportGetSpeechToTextResponse implements BaseModel
{
    /** @use SdkModel<UsageReportGetSpeechToTextResponseShape> */
    use SdkModel;

    /** @var array<string,mixed>|null $data */
    #[Optional(map: 'mixed')]
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
     * @param array<string,mixed>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param array<string,mixed> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

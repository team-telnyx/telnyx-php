<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\AI\AISummarizeResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AISummarizeResponseShape = array{data: Data}
 */
final class AISummarizeResponse implements BaseModel
{
    /** @use SdkModel<AISummarizeResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new AISummarizeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AISummarizeResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AISummarizeResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{summary: string} $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{summary: string} $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

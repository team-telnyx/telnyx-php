<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\AI\AISummarizeResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ai_summarize_response = array{data: Data}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AISummarizeResponse implements BaseModel
{
    /** @use SdkModel<ai_summarize_response> */
    use SdkModel;

    #[Api]
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
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}

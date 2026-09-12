<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * JSON mode: the model output is valid JSON, without a schema.
 *
 * @phpstan-type ResponseFormatJsonObjectShape = array{type: 'json_object'}
 */
final class ResponseFormatJsonObject implements BaseModel
{
    /** @use SdkModel<ResponseFormatJsonObjectShape> */
    use SdkModel;

    /** @var 'json_object' $type */
    #[Required]
    public string $type = 'json_object';

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(): self
    {
        return new self;
    }

    /**
     * @param 'json_object' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}

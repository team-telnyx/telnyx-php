<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Plain text output.
 *
 * @phpstan-type ResponseFormatTextShape = array{type: 'text'}
 */
final class ResponseFormatText implements BaseModel
{
    /** @use SdkModel<ResponseFormatTextShape> */
    use SdkModel;

    /** @var 'text' $type */
    #[Required]
    public string $type = 'text';

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
     * @param 'text' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}

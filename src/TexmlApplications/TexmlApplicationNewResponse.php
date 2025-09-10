<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type texml_application_new_response = array{
 *   data?: TexmlApplication|null
 * }
 */
final class TexmlApplicationNewResponse implements BaseModel
{
    /** @use SdkModel<texml_application_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?TexmlApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?TexmlApplication $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(TexmlApplication $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}

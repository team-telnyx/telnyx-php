<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type verify_profile_update_template_response = array{
 *   data?: VerifyProfileMessageTemplateResponse
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerifyProfileUpdateTemplateResponse implements BaseModel
{
    /** @use SdkModel<verify_profile_update_template_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?VerifyProfileMessageTemplateResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?VerifyProfileMessageTemplateResponse $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(VerifyProfileMessageTemplateResponse $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}

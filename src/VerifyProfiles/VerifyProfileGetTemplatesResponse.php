<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A list of Verify profile message templates.
 *
 * @phpstan-type verify_profile_get_templates_response = array{
 *   data: list<VerifyProfileMessageTemplateResponse>
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerifyProfileGetTemplatesResponse implements BaseModel
{
    /** @use SdkModel<verify_profile_get_templates_response> */
    use SdkModel;

    /** @var list<VerifyProfileMessageTemplateResponse> $data */
    #[Api(list: VerifyProfileMessageTemplateResponse::class)]
    public array $data;

    /**
     * `new VerifyProfileGetTemplatesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyProfileGetTemplatesResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyProfileGetTemplatesResponse)->withData(...)
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
     * @param list<VerifyProfileMessageTemplateResponse> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<VerifyProfileMessageTemplateResponse> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}

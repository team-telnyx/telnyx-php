<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A list of Verify profile message templates.
 *
 * @phpstan-import-type VerifyProfileMessageTemplateResponseShape from \Telnyx\VerifyProfiles\VerifyProfileMessageTemplateResponse
 *
 * @phpstan-type VerifyProfileGetTemplatesResponseShape = array{
 *   data: list<VerifyProfileMessageTemplateResponseShape>
 * }
 */
final class VerifyProfileGetTemplatesResponse implements BaseModel
{
    /** @use SdkModel<VerifyProfileGetTemplatesResponseShape> */
    use SdkModel;

    /** @var list<VerifyProfileMessageTemplateResponse> $data */
    #[Required(list: VerifyProfileMessageTemplateResponse::class)]
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
     * @param list<VerifyProfileMessageTemplateResponseShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<VerifyProfileMessageTemplateResponseShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}

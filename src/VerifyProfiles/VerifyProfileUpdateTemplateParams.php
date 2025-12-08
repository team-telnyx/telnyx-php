<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an existing Verify profile message template.
 *
 * @see Telnyx\Services\VerifyProfilesService::updateTemplate()
 *
 * @phpstan-type VerifyProfileUpdateTemplateParamsShape = array{text: string}
 */
final class VerifyProfileUpdateTemplateParams implements BaseModel
{
    /** @use SdkModel<VerifyProfileUpdateTemplateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The text content of the message template.
     */
    #[Required]
    public string $text;

    /**
     * `new VerifyProfileUpdateTemplateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyProfileUpdateTemplateParams::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyProfileUpdateTemplateParams)->withText(...)
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
    public static function with(string $text): self
    {
        $obj = new self;

        $obj['text'] = $text;

        return $obj;
    }

    /**
     * The text content of the message template.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }
}

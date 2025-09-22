<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VerifyProfileCreateTemplateParams); // set properties as needed
 * $client->verifyProfiles->createTemplate(...$params->toArray());
 * ```
 * Create a new Verify profile message template.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->verifyProfiles->createTemplate(...$params->toArray());`
 *
 * @see Telnyx\VerifyProfiles->createTemplate
 *
 * @phpstan-type verify_profile_create_template_params = array{text: string}
 */
final class VerifyProfileCreateTemplateParams implements BaseModel
{
    /** @use SdkModel<verify_profile_create_template_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The text content of the message template.
     */
    #[Api]
    public string $text;

    /**
     * `new VerifyProfileCreateTemplateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyProfileCreateTemplateParams::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyProfileCreateTemplateParams)->withText(...)
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

        $obj->text = $text;

        return $obj;
    }

    /**
     * The text content of the message template.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}

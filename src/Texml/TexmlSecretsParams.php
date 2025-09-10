<?php

declare(strict_types=1);

namespace Telnyx\Texml;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TexmlSecretsParams); // set properties as needed
 * $client->texml->secrets(...$params->toArray());
 * ```
 * Create a TeXML secret which can be later used as a Dynamic Parameter for TeXML when using Mustache Templates in your TeXML. In your TeXML you will be able to use your secret name, and this name will be replaced by the actual secret value when processing the TeXML on Telnyx side.  The secrets are not visible in any logs.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml->secrets(...$params->toArray());`
 *
 * @see Telnyx\Texml->secrets
 *
 * @phpstan-type texml_secrets_params = array{name: string, value: string}
 */
final class TexmlSecretsParams implements BaseModel
{
    /** @use SdkModel<texml_secrets_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Name used as a reference for the secret, if the name already exists within the account its value will be replaced.
     */
    #[Api]
    public string $name;

    /**
     * Secret value which will be used when rendering the TeXML template.
     */
    #[Api]
    public string $value;

    /**
     * `new TexmlSecretsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TexmlSecretsParams::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TexmlSecretsParams)->withName(...)->withValue(...)
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
    public static function with(string $name, string $value): self
    {
        $obj = new self;

        $obj->name = $name;
        $obj->value = $value;

        return $obj;
    }

    /**
     * Name used as a reference for the secret, if the name already exists within the account its value will be replaced.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Secret value which will be used when rendering the TeXML template.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}

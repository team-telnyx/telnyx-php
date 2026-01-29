<?php

declare(strict_types=1);

namespace Telnyx\Texml;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a TeXML secret which can be later used as a Dynamic Parameter for TeXML when using Mustache Templates in your TeXML. In your TeXML you will be able to use your secret name, and this name will be replaced by the actual secret value when processing the TeXML on Telnyx side.  The secrets are not visible in any logs.
 *
 * @see Telnyx\Services\TexmlService::secrets()
 *
 * @phpstan-type TexmlSecretsParamsShape = array{name: string, value: string}
 */
final class TexmlSecretsParams implements BaseModel
{
    /** @use SdkModel<TexmlSecretsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Name used as a reference for the secret, if the name already exists within the account its value will be replaced.
     */
    #[Required]
    public string $name;

    /**
     * Secret value which will be used when rendering the TeXML template.
     */
    #[Required]
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
        $self = new self;

        $self['name'] = $name;
        $self['value'] = $value;

        return $self;
    }

    /**
     * Name used as a reference for the secret, if the name already exists within the account its value will be replaced.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Secret value which will be used when rendering the TeXML template.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}

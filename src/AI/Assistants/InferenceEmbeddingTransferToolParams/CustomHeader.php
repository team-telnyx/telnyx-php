<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingTransferToolParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type custom_header = array{name?: string|null, value?: string|null}
 */
final class CustomHeader implements BaseModel
{
    /** @use SdkModel<custom_header> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `{{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret.
     */
    #[Api(optional: true)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null, ?string $value = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `{{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}

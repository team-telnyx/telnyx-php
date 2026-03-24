<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StoreFieldsAsVariableShape = array{
 *   name: string, valuePath: string
 * }
 */
final class StoreFieldsAsVariable implements BaseModel
{
    /** @use SdkModel<StoreFieldsAsVariableShape> */
    use SdkModel;

    /**
     * The name of the dynamic variable to store the extracted value in.
     */
    #[Required]
    public string $name;

    /**
     * A dot-notation path to the value in the webhook response body (e.g. 'customer.name' or 'id').
     */
    #[Required('value_path')]
    public string $valuePath;

    /**
     * `new StoreFieldsAsVariable()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StoreFieldsAsVariable::with(name: ..., valuePath: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StoreFieldsAsVariable)->withName(...)->withValuePath(...)
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
    public static function with(string $name, string $valuePath): self
    {
        $self = new self;

        $self['name'] = $name;
        $self['valuePath'] = $valuePath;

        return $self;
    }

    /**
     * The name of the dynamic variable to store the extracted value in.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A dot-notation path to the value in the webhook response body (e.g. 'customer.name' or 'id').
     */
    public function withValuePath(string $valuePath): self
    {
        $self = clone $this;
        $self['valuePath'] = $valuePath;

        return $self;
    }
}

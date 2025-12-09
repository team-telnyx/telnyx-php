<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantImportParams\Provider;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Import assistants from external providers. Any assistant that has already been imported will be overwritten with its latest version from the importing provider.
 *
 * @see Telnyx\Services\AI\AssistantsService::import()
 *
 * @phpstan-type AssistantImportParamsShape = array{
 *   apiKeyRef: string, provider: Provider|value-of<Provider>
 * }
 */
final class AssistantImportParams implements BaseModel
{
    /** @use SdkModel<AssistantImportParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     */
    #[Required('api_key_ref')]
    public string $apiKeyRef;

    /**
     * The external provider to import assistants from.
     *
     * @var value-of<Provider> $provider
     */
    #[Required(enum: Provider::class)]
    public string $provider;

    /**
     * `new AssistantImportParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantImportParams::with(apiKeyRef: ..., provider: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantImportParams)->withAPIKeyRef(...)->withProvider(...)
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
     * @param Provider|value-of<Provider> $provider
     */
    public static function with(
        string $apiKeyRef,
        Provider|string $provider
    ): self {
        $self = new self;

        $self['apiKeyRef'] = $apiKeyRef;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * The external provider to import assistants from.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantImportsParams\Provider;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Import assistants from external providers. Any assistant that has already been imported will be overwritten with its latest version from the importing provider.
 *
 * @see Telnyx\Services\AI\AssistantsService::imports()
 *
 * @phpstan-type AssistantImportsParamsShape = array{
 *   api_key_ref: string, provider: Provider|value-of<Provider>
 * }
 */
final class AssistantImportsParams implements BaseModel
{
    /** @use SdkModel<AssistantImportsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     */
    #[Api]
    public string $api_key_ref;

    /**
     * The external provider to import assistants from.
     *
     * @var value-of<Provider> $provider
     */
    #[Api(enum: Provider::class)]
    public string $provider;

    /**
     * `new AssistantImportsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantImportsParams::with(api_key_ref: ..., provider: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantImportsParams)->withAPIKeyRef(...)->withProvider(...)
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
        string $api_key_ref,
        Provider|string $provider
    ): self {
        $obj = new self;

        $obj->api_key_ref = $api_key_ref;
        $obj['provider'] = $provider;

        return $obj;
    }

    /**
     * Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->api_key_ref = $apiKeyRef;

        return $obj;
    }

    /**
     * The external provider to import assistants from.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $obj = clone $this;
        $obj['provider'] = $provider;

        return $obj;
    }
}

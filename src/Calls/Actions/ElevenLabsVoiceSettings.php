<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ElevenLabsVoiceSettingsShape = array{api_key_ref?: string|null}
 */
final class ElevenLabsVoiceSettings implements BaseModel
{
    /** @use SdkModel<ElevenLabsVoiceSettingsShape> */
    use SdkModel;

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your ElevenLabs API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Api(optional: true)]
    public ?string $api_key_ref;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $api_key_ref = null): self
    {
        $obj = new self;

        null !== $api_key_ref && $obj->api_key_ref = $api_key_ref;

        return $obj;
    }

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your ElevenLabs API key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->api_key_ref = $apiKeyRef;

        return $obj;
    }
}

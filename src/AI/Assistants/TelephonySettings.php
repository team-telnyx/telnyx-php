<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type telephony_settings = array{
 *   defaultTexmlAppID?: string, supportsUnauthenticatedWebCalls?: bool
 * }
 */
final class TelephonySettings implements BaseModel
{
    /** @use SdkModel<telephony_settings> */
    use SdkModel;

    /**
     * Default Texml App used for voice calls with your assistant. This will be created automatically on assistant creation.
     */
    #[Api('default_texml_app_id', optional: true)]
    public ?string $defaultTexmlAppID;

    /**
     * When enabled, allows users to interact with your AI assistant directly from your website without requiring authentication. This is required for FE widgets that work with assistants that have telephony enabled.
     */
    #[Api('supports_unauthenticated_web_calls', optional: true)]
    public ?bool $supportsUnauthenticatedWebCalls;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $defaultTexmlAppID = null,
        ?bool $supportsUnauthenticatedWebCalls = null,
    ): self {
        $obj = new self;

        null !== $defaultTexmlAppID && $obj->defaultTexmlAppID = $defaultTexmlAppID;
        null !== $supportsUnauthenticatedWebCalls && $obj->supportsUnauthenticatedWebCalls = $supportsUnauthenticatedWebCalls;

        return $obj;
    }

    /**
     * Default Texml App used for voice calls with your assistant. This will be created automatically on assistant creation.
     */
    public function withDefaultTexmlAppID(string $defaultTexmlAppID): self
    {
        $obj = clone $this;
        $obj->defaultTexmlAppID = $defaultTexmlAppID;

        return $obj;
    }

    /**
     * When enabled, allows users to interact with your AI assistant directly from your website without requiring authentication. This is required for FE widgets that work with assistants that have telephony enabled.
     */
    public function withSupportsUnauthenticatedWebCalls(
        bool $supportsUnauthenticatedWebCalls
    ): self {
        $obj = clone $this;
        $obj->supportsUnauthenticatedWebCalls = $supportsUnauthenticatedWebCalls;

        return $obj;
    }
}

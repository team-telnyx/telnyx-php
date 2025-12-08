<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelephonySettingsShape = array{
 *   default_texml_app_id?: string|null,
 *   supports_unauthenticated_web_calls?: bool|null,
 * }
 */
final class TelephonySettings implements BaseModel
{
    /** @use SdkModel<TelephonySettingsShape> */
    use SdkModel;

    /**
     * Default Texml App used for voice calls with your assistant. This will be created automatically on assistant creation.
     */
    #[Optional]
    public ?string $default_texml_app_id;

    /**
     * When enabled, allows users to interact with your AI assistant directly from your website without requiring authentication. This is required for FE widgets that work with assistants that have telephony enabled.
     */
    #[Optional]
    public ?bool $supports_unauthenticated_web_calls;

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
        ?string $default_texml_app_id = null,
        ?bool $supports_unauthenticated_web_calls = null,
    ): self {
        $obj = new self;

        null !== $default_texml_app_id && $obj['default_texml_app_id'] = $default_texml_app_id;
        null !== $supports_unauthenticated_web_calls && $obj['supports_unauthenticated_web_calls'] = $supports_unauthenticated_web_calls;

        return $obj;
    }

    /**
     * Default Texml App used for voice calls with your assistant. This will be created automatically on assistant creation.
     */
    public function withDefaultTexmlAppID(string $defaultTexmlAppID): self
    {
        $obj = clone $this;
        $obj['default_texml_app_id'] = $defaultTexmlAppID;

        return $obj;
    }

    /**
     * When enabled, allows users to interact with your AI assistant directly from your website without requiring authentication. This is required for FE widgets that work with assistants that have telephony enabled.
     */
    public function withSupportsUnauthenticatedWebCalls(
        bool $supportsUnauthenticatedWebCalls
    ): self {
        $obj = clone $this;
        $obj['supports_unauthenticated_web_calls'] = $supportsUnauthenticatedWebCalls;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BasicAuthenticationAlsoTheValidationDefault;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BearerAuthentication;
use Telnyx\PayConnectors\GenericPayConnectorConfig\NoProcessorAuthentication;
use Telnyx\PayConnectors\PayConnectorCreateParams\Mode;
use Telnyx\PayConnectors\PayConnectorCreateParams\Type;

/**
 * Create a generic payment connector in the authenticated organization. The name must be unique in that organization. Authentication supplies ownership; do not send user_id or organization_id. Config is encrypted at rest; passwords and tokens are omitted from responses. This operation stores configuration and does not initiate a payment. See the [processor contract](/docs/voice/programmable-voice/pay#request-sent-to-the-payment-processor).
 *
 * @see Telnyx\Services\PayConnectorsService::create()
 *
 * @phpstan-import-type GenericPayConnectorConfigVariants from \Telnyx\PayConnectors\GenericPayConnectorConfig
 * @phpstan-import-type GenericPayConnectorConfigShape from \Telnyx\PayConnectors\GenericPayConnectorConfig
 *
 * @phpstan-type PayConnectorCreateParamsShape = array{
 *   config: GenericPayConnectorConfigShape,
 *   name: string,
 *   mode?: null|Mode|value-of<Mode>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class PayConnectorCreateParams implements BaseModel
{
    /** @use SdkModel<PayConnectorCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Configuration for a generic connector. A config update replaces the complete object, not individual keys. Unknown config keys are discarded. Authentication credentials must be nonblank strings when required by the selected auth_type.
     *
     * @var GenericPayConnectorConfigVariants $config
     */
    #[Required]
    public BasicAuthenticationAlsoTheValidationDefault|BearerAuthentication|NoProcessorAuthentication $config;

    /**
     * Unique within the authenticated organization. Used in resource paths and as connector_name in the Call Control Pay request. Cannot be renamed by update.
     */
    #[Required]
    public string $name;

    /**
     * Defaults to test on creation. Test restricts collected card numbers but still contacts the configured processor; use a processor sandbox URL and sandbox credentials. Live removes the test-card restriction. Neither mode locks API updates.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * Connector type covered by this reference.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new PayConnectorCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayConnectorCreateParams::with(config: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayConnectorCreateParams)->withConfig(...)->withName(...)
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
     * @param GenericPayConnectorConfigShape $config
     * @param Mode|value-of<Mode>|null $mode
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        BasicAuthenticationAlsoTheValidationDefault|array|BearerAuthentication|NoProcessorAuthentication $config,
        string $name,
        Mode|string|null $mode = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['config'] = $config;
        $self['name'] = $name;

        null !== $mode && $self['mode'] = $mode;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Configuration for a generic connector. A config update replaces the complete object, not individual keys. Unknown config keys are discarded. Authentication credentials must be nonblank strings when required by the selected auth_type.
     *
     * @param GenericPayConnectorConfigShape $config
     */
    public function withConfig(
        BasicAuthenticationAlsoTheValidationDefault|array|BearerAuthentication|NoProcessorAuthentication $config,
    ): self {
        $self = clone $this;
        $self['config'] = $config;

        return $self;
    }

    /**
     * Unique within the authenticated organization. Used in resource paths and as connector_name in the Call Control Pay request. Cannot be renamed by update.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Defaults to test on creation. Test restricts collected card numbers but still contacts the configured processor; use a processor sandbox URL and sandbox credentials. Live removes the test-card restriction. Neither mode locks API updates.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * Connector type covered by this reference.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}

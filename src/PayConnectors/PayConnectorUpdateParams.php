<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BasicAuthenticationAlsoTheValidationDefault;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BearerAuthentication;
use Telnyx\PayConnectors\GenericPayConnectorConfig\NoProcessorAuthentication;
use Telnyx\PayConnectors\PayConnectorUpdateParams\Mode;
use Telnyx\PayConnectors\PayConnectorUpdateParams\Type;

/**
 * Update a generic connector by name in the authenticated organization. Both test and live connectors can be updated through the API. Omitted fields remain unchanged. Supplying config replaces the entire config; it does not merge keys. Include endpoint_url and the credentials required for the selected auth_type on every config replacement. Omitting config preserves existing credentials, allowing a mode-only update. The path name cannot be renamed. Public updates use PATCH.
 *
 * @see Telnyx\Services\PayConnectorsService::update()
 *
 * @phpstan-import-type GenericPayConnectorConfigVariants from \Telnyx\PayConnectors\GenericPayConnectorConfig
 * @phpstan-import-type GenericPayConnectorConfigShape from \Telnyx\PayConnectors\GenericPayConnectorConfig
 *
 * @phpstan-type PayConnectorUpdateParamsShape = array{
 *   config?: GenericPayConnectorConfigShape|null,
 *   mode?: null|Mode|value-of<Mode>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class PayConnectorUpdateParams implements BaseModel
{
    /** @use SdkModel<PayConnectorUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Configuration for a generic connector. A config update replaces the complete object, not individual keys. Unknown config keys are discarded. Authentication credentials must be nonblank strings when required by the selected auth_type.
     *
     * @var GenericPayConnectorConfigVariants|null $config
     */
    #[Optional]
    public BasicAuthenticationAlsoTheValidationDefault|BearerAuthentication|NoProcessorAuthentication|null $config;

    /**
     * Omit to preserve the existing mode. Use an explicit test or live value.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * Generic connector type. Omit to preserve the existing value.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GenericPayConnectorConfigShape|null $config
     * @param Mode|value-of<Mode>|null $mode
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        BasicAuthenticationAlsoTheValidationDefault|array|BearerAuthentication|NoProcessorAuthentication|null $config = null,
        Mode|string|null $mode = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $config && $self['config'] = $config;
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
     * Omit to preserve the existing mode. Use an explicit test or live value.
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
     * Generic connector type. Omit to preserve the existing value.
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

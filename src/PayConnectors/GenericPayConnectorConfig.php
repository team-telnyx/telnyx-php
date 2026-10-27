<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BasicAuthenticationAlsoTheValidationDefault;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BearerAuthentication;
use Telnyx\PayConnectors\GenericPayConnectorConfig\NoProcessorAuthentication;

/**
 * Configuration for a generic connector. A config update replaces the complete object, not individual keys. Unknown config keys are discarded. Authentication credentials must be nonblank strings when required by the selected auth_type.
 *
 * @phpstan-import-type BasicAuthenticationAlsoTheValidationDefaultShape from \Telnyx\PayConnectors\GenericPayConnectorConfig\BasicAuthenticationAlsoTheValidationDefault
 * @phpstan-import-type BearerAuthenticationShape from \Telnyx\PayConnectors\GenericPayConnectorConfig\BearerAuthentication
 * @phpstan-import-type NoProcessorAuthenticationShape from \Telnyx\PayConnectors\GenericPayConnectorConfig\NoProcessorAuthentication
 *
 * @phpstan-type GenericPayConnectorConfigVariants = BasicAuthenticationAlsoTheValidationDefault|BearerAuthentication|NoProcessorAuthentication
 * @phpstan-type GenericPayConnectorConfigShape = GenericPayConnectorConfigVariants|BasicAuthenticationAlsoTheValidationDefaultShape|BearerAuthenticationShape|NoProcessorAuthenticationShape
 */
final class GenericPayConnectorConfig implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            BasicAuthenticationAlsoTheValidationDefault::class,
            BearerAuthentication::class,
            NoProcessorAuthentication::class,
        ];
    }
}

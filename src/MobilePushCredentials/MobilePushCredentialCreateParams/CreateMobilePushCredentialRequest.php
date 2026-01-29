<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateAndroidPushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateIosPushCredentialRequest;

/**
 * @phpstan-import-type CreateIosPushCredentialRequestShape from \Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateIosPushCredentialRequest
 * @phpstan-import-type CreateAndroidPushCredentialRequestShape from \Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateAndroidPushCredentialRequest
 *
 * @phpstan-type CreateMobilePushCredentialRequestVariants = CreateIosPushCredentialRequest|CreateAndroidPushCredentialRequest
 * @phpstan-type CreateMobilePushCredentialRequestShape = CreateMobilePushCredentialRequestVariants|CreateIosPushCredentialRequestShape|CreateAndroidPushCredentialRequestShape
 */
final class CreateMobilePushCredentialRequest implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'ios' => CreateIosPushCredentialRequest::class,
            'android' => CreateAndroidPushCredentialRequest::class,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\Android;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\Ios;

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
        return ['ios' => Ios::class, 'android' => Android::class];
    }
}

<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams;

use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\MapOf;

/**
 * The settings associated with the voice selected.
 */
final class VoiceSettings implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ElevenLabsVoiceSettings::class,
            TelnyxVoiceSettings::class,
            new MapOf('mixed'),
        ];
    }
}

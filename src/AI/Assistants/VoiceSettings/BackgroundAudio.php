<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings;

use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaName;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaURL;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\PredefinedMedia;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Optional background audio to play on the call. Use a predefined media bed, or supply a looped MP3 URL. If a media URL is chosen in the portal, customers can preview it before saving.
 *
 * @phpstan-import-type PredefinedMediaShape from \Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\PredefinedMedia
 * @phpstan-import-type MediaURLShape from \Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaURL
 * @phpstan-import-type MediaNameShape from \Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaName
 *
 * @phpstan-type BackgroundAudioShape = PredefinedMediaShape|MediaURLShape|MediaNameShape
 */
final class BackgroundAudio implements ConverterSource
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
            'predefined_media' => PredefinedMedia::class,
            'media_url' => MediaURL::class,
            'media_name' => MediaName::class,
        ];
    }
}

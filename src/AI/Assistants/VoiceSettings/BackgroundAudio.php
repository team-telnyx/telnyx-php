<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings;

use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember0;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember1;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember2;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Optional background audio to play on the call. Use a predefined media bed, or supply a looped MP3 URL. If a media URL is chosen in the portal, customers can preview it before saving.
 */
final class BackgroundAudio implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class, UnionMember2::class];
    }
}

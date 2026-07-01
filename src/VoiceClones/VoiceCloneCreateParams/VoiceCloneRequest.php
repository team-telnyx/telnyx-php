<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\MinimaxDesignClone;
use Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\TelnyxDesignClone;

/**
 * Request body for creating a voice clone from an existing voice design.
 *
 * @phpstan-import-type TelnyxDesignCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\TelnyxDesignClone
 * @phpstan-import-type MinimaxDesignCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\MinimaxDesignClone
 *
 * @phpstan-type VoiceCloneRequestVariants = TelnyxDesignClone|MinimaxDesignClone
 * @phpstan-type VoiceCloneRequestShape = VoiceCloneRequestVariants|TelnyxDesignCloneShape|MinimaxDesignCloneShape
 */
final class VoiceCloneRequest implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [TelnyxDesignClone::class, MinimaxDesignClone::class];
    }
}
